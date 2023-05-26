<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TravelingAsik.com</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/home/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('home')?>/css/styles.css" rel="stylesheet" />
    </head>

    <?php
    helper(['form', 'url']);
    ?>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"></a>
                <button class="navbar-toggler" type="button" wisata-bs-toggle="collapse" wisata-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/Wisata">Daftar Tiket Destinasi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        

        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="destinasi">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Profile User</h2>
                </div>
                <div class="row">
                    <div class="col-md-10 mx-auto">
                       <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('Profile/update'); ?>" method="POST" >
                                <?= csrf_field();?>
                            <input type="hidden" name="id" value="<?= $users->id; ?>">
                                <div class="mb-3">
                                    <label> Nama </label>
                                    <input type="text" class="form-control" name="nama_users" value="<?= $users->nama_users; ?>"> 
                                
                                </div>
                                <div class="mb-3">
                                    <label> Email</label>
                                    <input type="text" class="form-control" name="email"  value="<?= $users->email;?>">
                                
                                <div class="mb-3">
                                    <label> Ponsel</label>
                                    <input type="text" class="form-control" name="ponsel"  value="<?= $users->ponsel; ?>">
                                
                                <div class="mb-3">
                                    <label> Password</label>
                                    <input type="password" class="form-control" name="password" >
                                
                                </div>
                                <div class="d-grid">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                <a href="<?= base_url('Profile/index')?>" class="btn btn-info btn-sm mt-2">Kembali</a>
                                
                                </div>
                                
                            </form>
                            </div>
                       </div>
                       
                    </div>
                </div>
            </div>
        </section>
    