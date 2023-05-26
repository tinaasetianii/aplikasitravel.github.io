<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Akun Baru</h3></div>
                                    <?php $validation=\Config\Services::validation();?>
                                    <div class="card-body">
                                        <form method="POST" action="<?= base_url('Loginuser/simpan');?>">
                                            <?= csrf_field();?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama');?>" />
                                                <label>Nama lengkap</label>
                                                <small class="text-danger"><?= $validation->getError('nama');?></small>
                                            </div>
                                            <div class="form-floating mb-3">
                                               <select name="kelamin" class="form-select" >
                                                <option value="">--pilih jenis kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                               </select>
                                               <small class="text-danger"><?= $validation->getError('kelamin');?></small>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  type="text" placeholder="No Ponsel" name="phone" value="<?= set_value('phone');?>"/>
                                                <label >No Ponsel</label>
                                                <small class="text-danger"><?= $validation->getError('phone');?></small>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  type="text" placeholder="Email" name="email" value="<?= set_value('email');?>"/>
                                                <label >Email</label>
                                                <small class="text-danger"><?= $validation->getError('email');?></small>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" value="<?= set_value('password');?>"/>
                                                <label >Password</label>
                                                <small class="text-danger"><?= $validation->getError('password');?></small>
                                            </div>
                                            <div class="d-grid d-md-block">
                                                <button type="submit" class="btn btn-primary" name="submit">Daftar</button>
                                                
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
