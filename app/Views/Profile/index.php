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
                        <li class="nav-item"><a class="nav-link" href="/Wisata/beranda">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Wisata">Daftar Tiket Destinasi</a></li>
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
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="/history">History</a></li>
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
                        <table class="table">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Ponsel</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach($users as $row):
        
       
    ?>
  <tr>
      <td><?= $row->nama_users;?></td>
      <td><?= $row->email;?></td>
      <td><?= $row->ponsel; ?></td>
      <td><a href="<?= base_url('profile/edit/'.$row->id);?>" class="btn btn-outline-info">Edit</a></td>
        <td><?php?></td>
    </tr>
    <?php
    $no++;
    endforeach;
    ?>
  </tbody>
</table>
                        </div>
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
