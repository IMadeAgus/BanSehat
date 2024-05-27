<h1 class="text-center mt-4 mb-4">Halaman CRUD Akun Mekanik</h1>
<?php
$pesan = $this->session->flashdata('pesan');
if ($pesan == "") {
    echo "";
} else {
    ?>
    <div class="alert alert-success alert-dismissible">
        <?php echo $pesan; ?>
    </div>
    <?php
}
?>
<div class="card">
    <div class="ms-3 mb-3 me-3">
        <form name="formmekanik" method="post" action="<?php echo base_url('cadmin/addMekanik'); ?>"
            enctype="multipart/form-data">
            <input type="hidden" name="AkunMekanik" id="AkunMekanik">
            <div class="mb-3 mt-3">
                Nama Mekanik
                <input type="text" class="form-control" name="NamaMekanik" id="NamaMekanik">
            </div>
            <div class="mb-3">
                No Handphone
                <input type="text" class="form-control" name="NoHandphone" id="NoHandphone">
            </div>
            <div class="mb-3">
                Email
                <input type="email" class="form-control" name="Email" id="Email">
            </div>
            <div class="mb-3">
                Password
                <input type="text" class="form-control" name="Password" id="Password">
            </div>
            <br />
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary " style="width :  5rem">Simpan</button>
                <button type="reset" class="btn btn-danger mx-3" style="width : 5rem">Batal</button>
            </div>
        </form>
    </div>
</div>