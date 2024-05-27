<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>



<body>
    <?php if (!empty($hasil)) { ?>
        <?php foreach ($hasil as $data): ?>
            <section id="daftarpesanan" class="contact">
                <div class="container mt-5  mb-5" data-aos="fade-up">
                    <div class="row gx-lg-0 gy-4">
                        <div class="col-lg-7">
                            <div style="height: 38.2rem; width:55rem;" id="map" class="img-fluid"> </div>
                        </div>
                        <div class="col-lg-5">
                            <form action="<?php echo base_url("payment") ?>" method="post" enctype="multipart/form-data"
                                class="order-form">
                                <h1 class="fw-bold">Detail Pesanan</h1>
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
                                <input type="hidden" name="IdPesanan" value="<?php echo $data->IdPesanan ?>">
                                <div class="mt-4 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tipe Ban</label>
                                    <input type="readonly" class="form-control" id="exampleFormControlInput1"
                                        value="<?php echo $data->TipeBan; ?>">
                                </div>
                                <div class="mt-4 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Detail Lokasi</label>
                                    <input type="readonly" class="form-control" id="exampleFormControlInput1"
                                        value="<?php echo $data->Lokasi; ?>">
                                </div>
                                <div class="mt-4 mb-3">
                                    <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
                                        <div class="accordion-item">
                                            <h3 class="accordion-header">
                                                <button class="accordion-button collapsed border" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                                    Foto Kerusakan
                                                </button>
                                            </h3>
                                            <div id="faq-content-1" class="accordion-collapse collapse"
                                                data-bs-parent="#faqlist">
                                                <div class="accordion-body">
                                                    <img class="img-fluid "
                                                        src="<?php echo base_url('assets/img/uploads/' . $data->FotoKerusakan); ?>"
                                                        alt="" style="width:20rem; height:20rem;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                    <input type="text" class="form-control" id="Harga" name="Harga" readonly>
                                </div>
                                <div class="d-grid mt-4 mb-2">
                                    <button class="btn text-white" type="submit">Pesan Layanan</button>
                                </div>
                                <div class="d-grid mb-3">
                                    <button type="button" onclick="cancelorder('<?php echo $data->IdPesanan ?>');"
                                        class="btn btn-danger p-2 rounded rounded-5"
                                        style="backgound-color :brown">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        endforeach;
    } ?>
    <script>
        // Fungsi untuk membuat marker dengan ikon tertentu
        function createCustomMarker(waypoint, customIcon) {
            var customMarker = L.marker(waypoint.latLng, {
                icon: customIcon,
                draggable: true
            });



            return customMarker;
        }

        var defaultIcon = L.icon({
            iconUrl: '<?php echo base_url("assets/img/MarkerPengguna.png"); ?>',
            iconSize: [42, 42],
            iconAnchor: [21, 42],
            popupAnchor: [0, -42]
        });

        var customIcon = L.icon({
            iconUrl: '<?php echo base_url("assets/img/MarkerBengkel.png"); ?>',
            iconSize: [42, 42],
            iconAnchor: [21, 42],
            popupAnchor: [0, -42]
        });

        var map = L.map('map').setView([<?php echo $data->Latitude; ?>, <?php echo $data->Longitude; ?>], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var routingControl = L.Routing.control({
            waypoints: [
                L.latLng(<?php echo $data->Latitude; ?>, <?php echo $data->Longitude; ?>),
                L.latLng(-8.766602845586416, 115.17795252238366)
            ],
            routeWhileDragging: false,  // Menonaktifkan pembaruan rute selama marker digeser
            show: false,
            createMarker: function (i, waypoint, n) {
                // Gunakan ikon default untuk waypoint pertama dan ikon kustom untuk waypoint kedua
                if (i === 0) {
                    return createCustomMarker(waypoint, defaultIcon);
                } else {
                    return createCustomMarker(waypoint, customIcon);
                }
            }
        }).addTo(map);

        routingControl.on('routesfound', function (event) {
            var firstRoute = event.routes[0]; // Mengambil rute pertama
            if (firstRoute) {
                var totalDistance = firstRoute.summary.totalDistance;

                // Menghitung Harga
                var tipeBan = "<?php echo $data->TipeBan; ?>";
                var Harga = (tipeBan === "Tubles") ? totalDistance * 10 + 20000 : totalDistance * 10 + 30000;
                Harga = Math.round(Harga / 1000) * 1000;

                // Set Harga in the input field
                document.getElementById('Harga').value = Harga;
            }
        });
    </script>
</body>
<!-- Map -->