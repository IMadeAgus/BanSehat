<?= $header ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />


<body>
    <div id="detailpesanan">
        <?php if (!empty($hasil)) { ?>
            <?php foreach ($hasil as $data): ?>
                <?php if ($data->StatusPesanan == '') { ?>
                    <?= $order ?>
                <?php } else if ($data->StatusPesanan == "Menunggu Verifikasi") { ?>
                        <div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
                            <div class="card p-3 rounded rounded-5" style=" width: 60rem; ">
                                <div class="card-body  ">
                                    <h1 class="fw-bold text-center">Pesanan Kamu Sedang Diproses</h1>
                                </div>
                            </div>
                        </div>
                <?php } else if ($data->StatusPesanan == "Sedang Dikerjakan" || $data->StatusPesanan == "Verifikasi Pesanan Selesai") { ?>
                    <?= $InfoMekanik ?>
                <?php } else if ($data->StatusPesanan == "Pesanan Selesai") { ?>
                    <?= $rating ?>
                <?php } else if ($data->StatusPesanan == "Pesanan Ditolak") { ?>
                                    <script>
                                        window.open("<?php echo base_url('paymentform/') . $data->IdPesanan; ?>", "_self");
                                    </script>
                <?php } else { ?>
                                    <!-- ======= Order Section ======= -->
                                    <section class="contact">
                                        <div class="container" data-aos="fade-up">
                                            <div class="section-header mt-5">
                                                <h2>Daftar Pesanan Kosong</h2>
                                                <p>Silahkan isi form pemesanan di bawah</p>
                                            </div>

                                            <div class="row gx-lg-0 gy-4">
                                                <div class="col-lg-7">
                                                    <div style="height: 100%;" id="mymap" class="img-fluid"> </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <form action="<?php echo base_url("order") ?>" method="post" enctype="multipart/form-data"
                                                        class="order-form">
                                                        <input type="hidden" name="AkunPengguna"
                                                            value="<?php echo $this->session->userdata('AkunPengguna'); ?>" />
                                                        <input type="hidden" class="form-control" id="Latitude" name="Latitude">
                                                        <input type="hidden" class="form-control" id="Longitude" name="Longitude">
                                                        <!-- Alert -->
                                            <?php
                                            $pesan = $this->session->flashdata('pesan');
                                            if ($pesan == "") {
                                                echo "";
                                            } else {
                                                ?>
                                                            <div class="alert alert-danger alert-dismissible">
                                                <?php echo $pesan; ?>
                                                            </div>
                                            <?php
                                            }
                                            ?>
                                                        <div class="mb-3 mt-4">
                                                            <label for="exampleFormControlInput1" class="form-label  ">Tipe Ban</label>
                                                            <select class="form-select mt-2" name="TipeBan">
                                                                <option selected>Pilih </option>
                                                                <option value="Tubles">Tubles</option>
                                                                <option value="Ban Dalam">Ban Dalam</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label for="exampleFormControlInput1" class="form-label">Detail Lokasi</label>
                                                            <input class="form-control" id="Lokasi" name="Lokasi" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="exampleFormControlInput1" class="form-label">Foto Kerusakan</label>
                                                            <input type="file" class="form-control" name="FotoKerusakan" required>
                                                        </div>
                                                        <div class="text-center"><button type="submit">Pesan Layanan</button></div>
                                                    </form>
                                                </div><!-- End Contact Form -->
                                            </div>
                                        </div>
                                    </section><!--End Contact Section-->
                <?php }
            endforeach;
        } ?>
    </div>
</body>
<?php if ($data->StatusPesanan == "Menunggu Verifikasi") { ?>
    <script>
        setInterval(function () {
            location.reload();
        }, 5000);
    </script>
<?php } ?>
<script>
    function cancelorder(IdPesanan) {
        if (confirm("Apakah yakin Membatalkan pesanan?")) {
            window.open("<?php echo base_url(); ?>corder/cancelorder/" + IdPesanan, "_self");
        }
    }
</script>
<!-- Map -->
<script>
    const mymap = L.map('mymap').setView([-8.799093906518884, 115.16162822753351], 18);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(mymap);

    var latInput = document.querySelector("[name=Latitude]");
    var lngInput = document.querySelector("[name=Longitude]");
    // var lokasiInput = document.querySelector("[name=Lokasi]");

    var curLocation = [-8.799093906518884, 115.16162822753351];

    mymap.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: true
    });

    marker.on('dragend', function (event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: true
        }).bindPopup(position).update();
        latInput.value = position.lat;
        lngInput.value = position.lng;
        lokasiInput.value = position.lat + "," + position.lng;
    });

    mymap.addLayer(marker);

    mymap.on("click", function (e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (!marker) {
            marker = L.marker(e.latlng).addTo(mymap);
        } else {
            marker.setLatLng(e.latlng);
        }

        latInput.value = lat;
        lngInput.value = lng;

    });

</script>
<?= $footer ?>