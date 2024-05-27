<h2>Daftar Akun Mekanik</h2>
<div class="card mb-3">
    <div class="m-3">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama </th>
                    <th>No Handphone</th>
                    <!-- <th>Email</th> -->
                    <!-- <th>Password</th> -->
                    <th class="text-center">Foto Profil</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($hasil)) {
                    echo "Data kosong";
                } else {
                    $no = 1;
                    foreach ($hasil as $data):
                        ?>

                        <tr class="align-middle">
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $data->NamaMekanik; ?>
                            </td>
                            <td>
                                <?php echo $data->NoHandphone; ?>
                            </td>
                            <!-- <td>
                                <?php echo $data->Email; ?>
                            </td> -->
                            <!-- <td>
                                <?php echo $data->Password; ?>
                            </td> -->
                            <td class="text-center">
                                <img class="img-fluid"
                                    src="<?php echo base_url('assets/img/fotomekanik/' . $data->FotoProfil); ?>" alt=""
                                    style="width:5rem; height:5rem;">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-sm btn-primary mx-3" style="width:70px;"
                                        onclick="editData('<?php echo $data->AkunMekanik ?>');">Edit</button>
                                    <button type="button" onclick="hapusdata('<?php echo $data->AkunMekanik ?>');"
                                        class="btn btn-sm btn-danger" style="width:70px;">Hapus</button>
                                </div>

                            </td>
                        </tr>

                        <?php
                        $no++;
                    endforeach;
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
<div class="d-flex justify-content-end mb-5">
    <button type="button" onclick="cetakMekanik();" class="btn btn-lg btn-success me-3" style="width:90px;">Cetak
    </button>
</div>
<script language="javascript">
    function hapusdata(AkunMekanik) {
        if (confirm("Apakah yakin menghapus data ini?")) {
            //alert (AkunMekanik);	
            window.open("<?php echo base_url(); ?>cadmin/deleteData/" + AkunMekanik, "_self");
        }
    }
</script>
<script>
    function editData(AkunMekanik) {
        load("cadmin/editData/" + AkunMekanik, "#script");
    }
</script>
<script language="javascript">
    function cetakMekanik() {
        //alert (AkunMekanik);	
        window.open("<?php echo base_url(); ?>cadmin/cetakMekanik", "_self");
    }
</script>