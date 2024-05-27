<?= $headerindex ?>
<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-3 rounded rounded-5" style=" width: 40rem; ">
            <div class="card-body  ">
                <h1 class="fw-bold ">LOGIN</h1>
                <!-- <p class="" style="margin-top: -15px; font-size: 14px;">Log in to continue your account</p> -->
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
                <form name="formlogin" method="post" action="<?php echo base_url('dologin'); ?>">
                    <div class="mb-3 mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" name="Password">
                    </div>
                    <div class="d-grid mb-2 mt-5">
                        <button class="btn text-white" style="background-color:#F85900" type="submit">Login</button>
                    </div>
                    <!-- <a href="#">Forget password? </a> -->
                    <p class="card-text">Belum memiliki akun? <a href="<?php echo base_url('register'); ?>">register
                        </a> </p>

                    <!-- <button class="btn btn-success" type="button" onclick="daftar()">Daftar</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
<?= $footer ?>