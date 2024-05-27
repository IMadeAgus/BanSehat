<section id="daftarpesanan" class="contact">
    <div class="container mt-5  mb-5" data-aos="fade-up">
        <div class="row gx-lg-0 gy-4">
            <div class="col-lg-7 ">
                <div style=" width: 100%; height: 100%;" id="map"> </div>
            </div>
            <div class="col-lg-5">
                <form action="<?php echo base_url("orderupdate") ?>" method="post" enctype="multipart/form-data"
                    class="order-form">

                    <h1 class="fw-bold">Detail Pesanan</h1>

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
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
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
                            class="btn btn-danger p-2 rounded rounded-5" style="backgound-color :brown">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>