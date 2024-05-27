<? $header ?>
<?php if (!empty($hasil)) { ?>
    <div class="row gx-lg-0 gy-4 mt-5 mb-5">
        <div class="col-lg-7">
            <div style="height: 38.2rem; width:55rem;" id="map" class="img-fluid"> </div>
        </div>
        <div class="col-lg-5 card">
            <div class="card-body">

                <h1 class="fw-bold">Detail Pesanan</h1>
                <?php foreach ($hasil as $data): ?>
                    <div class="mt-4 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="readonly" class="form-control" id="exampleFormControlInput1"
                            value="<?php echo $data->Nama; ?>">
                    </div>
                    <div class="mt-4 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Handphone</label>
                        <input type="readonly" class="form-control" id="exampleFormControlInput1"
                            value="<?php echo $data->NoHandphone; ?>">
                    </div>
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
                                    <button class="accordion-button collapsed border" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-1">
                                        Foto Kerusakan
                                    </button>
                                </h3>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        <img class="img-fluid "
                                            src="<?php echo base_url('assets/img/uploads/' . $data->FotoKerusakan); ?>" alt=""
                                            style="width:20rem; height:20rem;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="text" class="form-control" value="<?php echo $data->Harga; ?>" readonly>
                    </div>
                <?php endforeach; ?>
            <?php }
?>
        </div>
    </div>
</div>
<script>
    var map = L.map('map');

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var routingControl = L.Routing.control({
        waypoints: [
            L.latLng(<?php echo $data->Latitude; ?>, <?php echo $data->Longitude; ?>),
            L.latLng(-8.766602845586416, 115.17795252238366)
        ]


    }).addTo(map);

</script>

<? $footer ?>