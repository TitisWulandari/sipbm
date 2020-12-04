<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="alert alert-dark">
                    <img src="<?= base_url('assets/img/museum-logo.png') ?>" width="80" alt="" class="mr-3">
                    Sistem Informasi Perawatan Benda-Benda Museum
                </div>
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <!-- <div class="text-center">
                                    <h2><img src="<?= base_url('assets/img/Logo.png') ?>" height="70" alt=""></h2>
                                    <br>
                                </div> -->

                                <form class="user" method="post" action="<?= base_url('Auth/loginForm') ?>">

                                    <div class="form-group">
                                        <input class="form-control form-control-user" name="email" type="email" id="inputEmail" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">

                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" name="password" type="password" id="inputPassword" placeholder="Password">

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>

                            </div>
                        </div>
                    </div>
                    <div class="alert alert-dark mb-0">
                        <div class="row">
                            <div class="col-sm">
                                <?= date('H:i:s'); ?>
                            </div>
                            <div class="col-sm text-right">
                                <?= date('d-M-Y') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $errors = $this->session->flashdata('errors');
            if (!empty($errors)) {
            ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger text-center">
                            <?php foreach ($errors as $key => $error) { ?>
                                <?php echo "$error<br>"; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            if ($msg = $this->session->flashdata('error_login')) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger text-center">
                            <?= $msg ?>
                        </div>
                    </div>
                </div>
            <?php } else if ($msg = $this->session->flashdata('success_login')) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success text-center">
                            <?= $msg ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="<?= base_url('auth/registerForm') ?>" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">Registration</h1>

                    <input name="name" type="text" class="form-control" placeholder="nama lengkap" required autofocus>
                    <div style="margin-top:10px"></div>
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="alamatemail@gmail.com" required autofocus>
                    <div style="margin-top:10px"></div>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <div style="margin-top:10px"></div> <input name="confrim_password" type="password" id="inputPassword" class="form-control" placeholder="Confrim Password" required>

                    <br>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>