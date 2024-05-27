<div class="row">
    <!-- Earnings (Year) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Year)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $yearrevenue ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $monthrevenue ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Today) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Today)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $todayrevenue ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        List Pesanan Layanan
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Pesanan</th>
                    <th>Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Pesanan</th>
                    <th>Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                if (!empty($hasil)) {
                    $no = 1;
                    foreach ($hasil as $data):
                        ?>
                        <tr>
                            <td>
                                <?= $no; ?>
                            </td>
                            <td>
                                <?= $data->Nama; ?>
                            </td>
                            <td>
                                <?= $data->IdPesanan; ?>
                            </td>
                            <td>
                                <?= $data->Harga; ?>
                            </td>
                            <td>
                                <?= $data->MetodePembayaran; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                    onclick="tampilkanFoto('<?= base_url('assets/img/buktipembayaran/' . $data->BuktiPembayaran); ?>');"
                                    style="width: 100%;">
                                    Tampilkan Foto
                                </button>
                            </td>
                            <td class="text-center">
                                <?= $data->StatusPesanan; ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <?php
                                    $status = $data->StatusPesanan;
                                    if ($status == "Menunggu Verifikasi") { ?>
                                        <button type="button" class="btn btn-sm btn-primary mx-3" style="width:70px;"
                                            onclick="updateAkunMekanik('<?= $data->IdPesanan ?>');">Acc</button>
                                        <button type="button" onclick="tolakPesanan('<?= $data->IdPesanan ?>');"
                                            class="btn btn-sm btn-danger" style="width:70px;">Del</button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-sm btn-primary mx-3" style="width:70px;"
                                            onclick="updateAkunMekanik('<?= $data->IdPesanan ?>');" disabled>Acc</button>
                                        <button type="button" onclick="tolakPesanan('<?= $data->IdPesanan ?>');"
                                            class="btn btn-sm btn-danger" style="width:70px;" disabled>Del</button>
                                    <?php }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal untuk menampilkan gambar -->
                        <div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran
                                            <?= $data->IdPesanan; ?>
                                        </h5>
                                        <button type="button" class="close" onclick="tutupModal();" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <!-- Gambar yang akan ditampilkan di dalam popup -->
                                        <img class="img-fluid mx-auto my-auto" id="popupImage" src="" alt=""
                                            style="width: 100%; height: 45rem;">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick="tutupModal();">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $no++;
                    endforeach;
                } ?>
            </tbody>
        </table>
    </div>



    <script language="javascript">
        function tolakPesanan(IdPesanan) {
            if (confirm("Apakah yakin menolak pesanan ini?")) {
                window.open("<?php echo base_url(); ?>cadmin/cancelorder/" + IdPesanan, "_self");
            }
        }

        function updateAkunMekanik(IdPesanan) {
            if (confirm("Apakah yakin menyetujui pembayaran?")) {
                window.open("<?php echo base_url(); ?>cadmin/updateAkunMekanik/" + IdPesanan, "_self");
            }
        }

        function tampilkanFoto(urlFoto) {
            // Mengatur sumber gambar di dalam modal
            document.getElementById('popupImage').src = urlFoto;

            // Menampilkan modal
            $('#fotoModal').modal('show');
        }
        function tutupModal() {
            // Menutup modal dengan id 'fotoModal'
            $('#fotoModal').modal('hide');
        }
    </script>

    <!-- <script>
        setInterval(function () {
            location.reload();
        }, 5000);
    </script> -->