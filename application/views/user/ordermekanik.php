<?= $header ?>

<body>
    <section id="daftarpesanan" class="contact">
        <?php if (!empty($hasil)) { ?>
            <div class="container mt-5 pt-5 mb-5" data-aos="fade-up">
                <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                    <div class="card p-3 rounded rounded-5" style=" width: 40rem; ">
                        <div class="card-body ">
                            <h1 class="fw-bold mb-3 text-center">Mekanik sedang menuju ke lokasi kamu</h1>
                            <hr>
                            <?php foreach ($hasil as $data): ?>
                                <div class="d-flex align-items-center mt-5 mb-4">
                                    <img src="<?= base_url('assets/img/LogoBanSehat.png') ?>" alt="Foto Profil Mekanik"
                                        style="width:7rem; height:7rem;">
                                    <div class="ms-4" style="width: 100%">
                                        <h3 class="fw-bold">
                                            <?php echo $data->NamaMekanik; ?>
                                        </h3>
                                        <div class="d-flex justify-content-between">
                                            <h4>
                                                <?php echo $data->NoHandphone; ?>
                                            </h4>
                                            <h2 class="me-3"><a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></i></a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div class="d-grid mt-5 mb-3">
                                <button type="button" onclick="cancelorder('<?php echo $data->IdPesanan ?>');"
                                    class="btn btn-danger p-2 rounded rounded-5"
                                    style="backgound-color :brown">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="d-flex justify-content-center align-items-center " style="height: 30rem;" data-aos="fade-up">
                <h1 class="fw-bold">Mencari Mekanik Buat Kamu</h1>
            </div>
        <?php } ?>

    </section><!-- End Contact Section -->
    <!-- Content -->
</body>

<script>
    function cancelorder(IdPesanan) {
        if (confirm("Apakah yakin Membatalkan pesanan?")) {
            window.open("<?php echo base_url(); ?>corder/cancelorder/" + IdPesanan, "_self");
        }
    }
</script>
<?= $footer ?>