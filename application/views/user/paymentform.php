<?= $header ?>

<body>
    <section id="daftarpesanan" class="contact">
        <div class="container mt-5  mb-5" data-aos="fade-up">
            <div class="d-flex justify-content-center align-items-center">
                <div class="" style="width: 40rem;">
                    <form action="<?php echo base_url("Corder/updateOrder") ?>" method="post"
                        enctype="multipart/form-data" class="order-form">
                        <?php if (!empty($hasil)) { ?>
                            <h1 class="fw-bold">Form Pembayaran</h1>
                            <?php foreach ($hasil as $data):
                                if ($data->StatusPesanan == 'Pesanan Ditolak') { ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <p>Mohon Maaf Pembayaran Kamu Ditolak, Silahkan Lakukan Pembayaran Ulang</p>
                                    </div>
                                <?php } ?>
                                <p>Silahkan lakukan pembayaran</p>
                                <input type="hidden" name="IdPesanan" value="<?php echo $data->IdPesanan ?>">
                                <input type="hidden" name="AkunPengguna" value="<?php echo $data->AkunPengguna ?>">
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
                                    <div class="accordion accordion-flush" id="faqlist">
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
                                    <input type="text" class="form-control" id="Harga" name="Harga"
                                        value="<?php echo "Rp " . $data->Harga; ?>" readonly>
                                </div>
                            <?php endforeach; ?>
                            <div class="mb-3 mt-4">
                                <label for="exampleFormControlInput1" class="form-label">Metode Pembayaran</label>
                                <select class="form-select mt-2" name="MetodePembayaran" id="metodePembayaran" required>
                                    <option selected>Pilih</option>
                                    <option value="Tunai">Tunai</option>
                                    <option value="BCA">BCA</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="Qris">Qris</option>
                                </select>
                            </div>
                            <div class="mt-4 mb-5">
                                <div id="infoRekening"></div>
                            </div>
                            <div class="mb-5">
                                <div id="buktiPembayaran"></div>
                            </div>
                            <div class="d-grid mt-4 mb-2">
                                <button class="btn" type="submit">Lakukan Pembayaran</button>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="button" onclick="cancelorder('<?php echo $data->IdPesanan ?>');"
                                    class="btn btn-danger p-2 rounded rounded-5"
                                    style="backgound-color :brown">Cancel</button>
                            </div>
                        <?php } else {
                            echo "<p>No orders found.</p>";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

<script>
    function cancelorder(IdPesanan) {
        if (confirm("Apakah yakin Membatalkan pesanan?")) {
            window.open("<?php echo base_url(); ?>corder/cancelorder/" + IdPesanan, "_self");
        }
    }
</script>
<script>
    // Get the select element
    var metodePembayaranSelect = document.getElementById('metodePembayaran');

    // Get the div where the information will be displayed
    var infoRekeningDiv = document.getElementById('infoRekening');

    // Get the div where the information will be displayed
    var buktiPembayaranDiv = document.getElementById('buktiPembayaran');

    // Add event listener to the select element
    metodePembayaranSelect.addEventListener('change', function () {
        // Get the selected option
        var selectedOption = metodePembayaranSelect.options[metodePembayaranSelect.selectedIndex].value;

        // Display information based on the selected option
        switch (selectedOption) {
            case 'BCA':
                // Modified case for BCA
                infoRekeningDiv.innerHTML =
                    ' <label for="exampleFormControlInput1" class="form-label">Nomor Rekening</label>' +
                    '<div class="d-flex   align-items-center">' +
                    '<img class="me-3" src="<?= base_url('assets/img/BCA.png') ?>" alt="" style="width: 80px; height:80px">' +
                    '<h4>009077896789692</h4>' +
                    '</div>' +
                    '<h5 class="">Atas Nama : I Made Agus Budiarta </h5>';
                buktiPembayaranDiv.innerHTML =
                    '<label for="exampleFormControlInput1" class="form-label">Bukti Pembayaran</label>' +
                    '<input type="file" class="form-control" name="BuktiPembayaran" required>';
                break;
            case 'Mandiri':
                // Modified case for Mandiri
                infoRekeningDiv.innerHTML =
                    '<div class="d-flex align-items-center">' +
                    '<img class="me-3" src="<?= base_url('assets/img/Mandiri.png') ?>" alt="" style="width: 100px; height:60px">' +
                    '<h4>009077896789692</h4>' +
                    '</div>' +
                    '<h5 class="">Atas Nama : I Made Agus Budiarta </h5>';
                buktiPembayaranDiv.innerHTML =
                    '<label for="exampleFormControlInput1" class="form-label">Bukti Pembayaran</label>' +
                    '<input type="file" class="form-control" name="BuktiPembayaran" required>';
                break;
            case 'Qris':
                // Modified case for Qris
                infoRekeningDiv.innerHTML =
                    '<div class="d-flex align-items-center justify-content-center" style=height"20rem">' +
                    '<img class="me-3" src="<?= base_url('assets/img/Qris.jpg') ?>" alt="" style="width: 300px; height:300px">' + '</div>' +
                    '<h5 class="text-center">I Made Agus Budiarta </h5>';
                buktiPembayaranDiv.innerHTML =
                    '<label for="exampleFormControlInput1" class="form-label">Bukti Pembayaran</label>' +
                    '<input type="file" class="form-control" name="BuktiPembayaran" required>';
                break;
            case 'Tunai':
                infoRekeningDiv.innerHTML = '<h2 class="ms-3 mt-4  fw-bold text-center"> Silahkan Lakukan Pembayaran Kepada Mekanik </h2>';
                buktiPembayaranDiv.innerHTML = '';
                break;
            default:
                // Clear the information if "Pilih" or "Tunai" is selected
                infoRekeningDiv.innerHTML = '';
        }
    });
</script>
<?= $footer ?>