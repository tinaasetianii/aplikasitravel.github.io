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
    
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#destinasi">Destinasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#keunggulan">Keunggulan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Wisata">Pesan Tiket Destinasi</a></li>
                        <?php
                        if(session()->get('logged_in') !=true ){
                        ?>
                        <li class="nav-item"><a class="nav-link" href="/Loginuser">Login</a></li>
                        <?php
                        }else{
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    Hi, <?= session()->get('nama');?></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Profile">Profile</a></li>
                                    <li><a class="dropdown-item" href="/History">History</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/Loginuser/exit">Log out</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                            ?>
                    </ul>
                </div>
            </div>
        </nav>      
        Masthead
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Traveling Asik</div>
                <div class="masthead-heading text-uppercase">Lets Explore the Best Destination Of Bandung</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#destinasi">Daftar Destinasi</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Nikmati Layanan Kami</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <a href=""><i class="fa-solid fa-truck-plane fa-stack-1x fa-inverse"></i></a>
                            <!-- <a href=""><i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i></a> -->
                        </span>
                        <h4 class="my-3">Paket Wisata</h4>
                        <p class="text-muted">Kami Menyediakan berbagai pilihan paket Destinasi Bandung</p>
                    </div>
                    <div class="col-md-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa-solid fa-panorama fa-stack-1x fa-inverse"></i>
                            <!-- <i class="fas fa-laptop fa-stack-1x fa-inverse"></i> -->
                        </span>
                        <h4 class="my-3">Tiket Wisata</h4>
                        <p class="text-muted">Kami Menyediakan Pembelian Tiket Masuk Destinasi  .</p>
                        </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="destinasi">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Destinasi Wisata</h2>
                </div>
                <div class="container-fluid px-0 py-0 mb-5">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <?php foreach($wisata as $data): ?>
                        <div class="carousel-item active">
                        <img src="<?=base_url('foto/'.$data->foto); ?>" class="d-block w-100" style="height:500px;" alt=<?=$data->nama_wisata;?>>
                         <div class="carousel-caption d-none d-md-block">
                            <h1  style="background-color:white; color:black;"><?=$data->nama_wisata?></h1>
                            </div>
                        </div>
                        <?php
                        endforeach;?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                </div>
                
                <div class="row">
                    <?php foreach($wisata as $data): ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1" >
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><h2>""</h2></div>
                                </div>
                                <input type="hidden" name="id" value="<?=$data->id_wisata;?>">
                                <img class="img-fluid" src="<?=base_url('foto/'.$data->foto); ?>" alt="..." value= "<?= $data->id_wisata;?>"/>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?= $data->nama_wisata; ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?=$data->deskripsi; ?></div>
                            </div>
                        </div>
                    </div>
                     <?php
                        endforeach;?>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="keunggulan">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Keunggulan Aplikasi</h2>
                    <h3 class="section-subheading text-muted">Nikmati berbagai fitur yang kami sediakan.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="/home/assets/img/pelayanan.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Memberikan Pelayanan service terbaik</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">kami memberikan pelayan yang sangat prima bagi konsumen </p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="/home/assets/img/praktis.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Sistem Pemesanan yang praktis</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Kami memiliki sistem pemesanan tiket yang praktis untuk diakses kapan saja dan dimana saja </p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="/home/assets/img/harga.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Harga Terjangkau</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Dapatkan penawaran Harga Diskon Untuk tiket Anak Sebesar 50%</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="/home/assets/img/destinasi.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Menyediakan banyak Destinasi</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Kami menyediakan banyak Destinasi yang sangat menakjubkan dan wajib untuk kamu kunjungi</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Mari
                                <br />
                                Berjelajah 
                                <br />
                                Bersama!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
       
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Tina Setiani 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/xoxodumby" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>

        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url('home')?>js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
  
</html>
