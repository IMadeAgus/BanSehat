<?= $header ?>

<body>
    <?php if (!empty($hasil)) { ?>
        <?php foreach ($hasil as $data): ?>
            <section id="daftarpesanan" class="contact">
                <div class="container mt-5  mb-5" data-aos="fade-up">
                    <div class="row gx-lg-3 gy-4">
                        <div class="col-lg-5">
                            <img class="img-fluid " src="<?php echo base_url('assets/img/fotomekanik/' . $data->FotoProfil); ?>"
                                alt="Foto Profil Kosong" style="width:100%; height:100%;">
                        </div>
                        <div class="col-lg-7">
                            <form action="<?php echo base_url('cmekanik/editProfil') ?>" method="post"
                                enctype="multipart/form-data" class="order-form">
                                <h1 class="fw-bold">Edit profil</h1>
                                <input type="hidden" name="AkunMekanik" value="<?php echo $data->AkunMekanik ?>">
                                <div class="mt-4 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Mekanik</label>
                                    <input type="text" class="form-control" id="NamaMekanik" name="NamaMekanik"
                                        value="<?php echo $data->NamaMekanik; ?>">
                                </div>
                                <div class="mt-4 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">No Handphone</label>
                                    <input type="text" class="form-control" id="NoHandphone" name="NoHandphone"
                                        value="<?php echo $data->NoHandphone; ?>">
                                </div>
                                <div class="mt-4 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Foto Profil</label>
                                    <input type="file" class="form-control" id="FotoProfil" name="FotoProfil">
                                </div>
                                <div class="d-grid mt-4 mb-2">
                                    <button class="btn text-white" type="submit">simpan</button>
                                </div>
                                <div class="d-grid mb-3">
                                    <button type="button" onclick="" class="btn btn-danger p-2 rounded rounded-5"
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
</body>
<?= $footer ?>