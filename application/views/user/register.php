<?= $headerindex ?>

<div class="background">
    <div class="container" data-aos="fade-up">

        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card p-3 rounded-5" style="width: 40rem;">
                <div class="card-body ">
                    <h2 class="fw-bold ">DAFTAR </h2>
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
                    <!-- <p class="" style="margin-top: -15px; font-size: 14px;">register your account</p> -->
                    <form name="formdartar" method="post" action="<?php echo base_url('cregister/register'); ?>">
                        <div class="mb-3 mt-4">
                            <label for="exampleFormControlInput1" class="form-label  ">Nama</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Nama">
                        </div>


                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label  ">No Handphone</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="NoHandphone">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label  ">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="Email">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label ">Password</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Password">
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn text-white " style="background-color:#F85900"
                                type="submit">Register</button>
                        </div>
                        <p class=" ">Sudah memiliki akun? <a style="color:#077b6;"
                                href="<?php echo base_url('clogin/index'); ?>">Log
                                in </a> </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $footer ?>