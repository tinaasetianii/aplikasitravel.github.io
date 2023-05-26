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
    function buatRp($angka){
        $hasil="Rp. ". number_format($angka);
        return $hasil;
    }
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
                    <h2 class="section-heading text-uppercase"> Pesan Tiket <?= $wisata->nama_wisata; ?></h2>
                    <h3 class="section-subheading text-muted">Pesan sekarang juga</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4 mx-auto">
                        <!-- Portfolio item 1-->
                       
                        <div class="portfolio-item">
                            <a class="portfolio-link" wisata-bs-toggle="modal" href="#portfolioModal1">
                                
                                <img class="img-fluid" src="<?=base_url('foto/'.$wisata->foto); ?>" alt="..." value= "<?= $wisata->id_wisata;?>"/>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"> <?= $wisata->nama_wisata; ?></div>
                                <div class="portfolio-caption-subheading text-muted">Harga Tiket: <?= buatRp($wisata->harga); ?>/Orang</div>
                            </div>
                            <?php $validation=\Config\Services::validation();?>
                            <form action="<?= base_url('Wisata/cek');?>" method="POST">
                                <input type="hidden" name="harga" value="<?=$wisata->harga;?>">
                                <input type="hidden" name="id" value="<?=$wisata->id_wisata;?>">
                                <?= csrf_field(); ?>
                                <div class="mb-3">
                                    <label >Jumlah Tiket Anak</label>
                                    <input type="text" name="anak" class="form-control" value="<?= set_value('anak');?>">
                                    <small class="text-danger"><?= $validation->getError('anak');?></small>
                                </div>
                                <div class="mb-3">
                                    <label >Jumlah Tiket Dewasa</label>
                                    <input type="text" name="dewasa" class="form-control" value="<?= set_value('dewasa');?>">
                                    <small class="text-danger"><?= $validation->getError('dewasa');?></small>
                                </div>
                                <div class="mb-3">
                                    <label >Tanggal Keberangkatan</label>
                                    <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal');?>">
                                    <small class="text-danger"><?= $validation->getError('tanggal');?></small>
                                </div>
                                <button type="submit" class="btn btn-outline-success">Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
       
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
