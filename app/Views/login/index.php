<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="<?php echo base_url('admin')?>/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <?php $validation=\Config\Services::validation();?>
                                    <div class="card-body">
                                    <?php
                                        $session = \Config\Services::session();
                                        if($session->getFlashdata('warning')){
                                            ?>
                                            <div class="alert alert-warning">
                                                <ul>
                                                    <?php
                                                    foreach ($session->getFlashdata('warning')
                                                    as $val){
                                                        ?>
                                                        <li><?php echo $val ?></li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if(session()->getFlashdata('regist')){
                                            ?>
                                            <div class="alert alert-success"><?php echo $session->getFlashdata('regist')?></div>
                                        <?php
                                        }
                                        ?>
                                        
                                        <form method="POST" action="<?php echo site_url('Loginuser/cek')?>" >
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputemail" type="text" placeholder="email" name="email"  value="<?php if ($session->getFlashdata('email')) echo $session->getFlashdata('email') ?>"/>
                                                <label >Email</label>
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" />
                                                <label >Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="remember_me" id="inputRememberPassword" type="checkbox" value="1" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                           
                                            <div class="d-grid d-md-block">
                                                <input type="submit" class="btn btn-primary" name="submit" value="Login"/>
                                                <a href="<?= base_url('Loginuser/register')?>" class="btn btn-outline-info">Registrasi</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Tina Setiani 2022</div>
                            <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('admin')?>/js/scripts.js"></script>
    </body>
</html>
