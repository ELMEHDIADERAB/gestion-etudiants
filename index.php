<?php
include 'connexion.php';
session_start();
if(!isset($_SESSION['sessionEmail'])){
    header('location:login.php');
}

/*
$query = "SELECT id_et  from stagiaire";
$sql = mysqli_query($mysqli, $query);
$row = mysqli_fetch_assoc($sql)*/
$queryS="select * from stagiaire";
$result=mysqli_query($mysqli,$queryS);
$nbr=mysqli_num_rows($result);


$prof="select * from prof";
$resp=mysqli_query($mysqli,$prof);
$nbrp=mysqli_num_rows($resp);


$filiere="select * from filiere";
$rsf=mysqli_query($mysqli,$filiere);
$nbrF=mysqli_num_rows($rsf);


$groupeIIR="select * from groupe where id_Filiere=(select id from filiere where nomFiliere like 'INGÉNIERIE INFORMATIQUE ET RÉSEAUX')";
$iir=mysqli_query($mysqli,$groupeIIR);
$nbrFiir=mysqli_num_rows($iir);


$groupeIFA="select * from groupe where id_Filiere=(select id from filiere where nomFiliere like 'INGÉNIERIE FINANCIÈRE ET AUDIT')";
$ifa=mysqli_query($mysqli,$groupeIFA);
$nbrfifa=mysqli_num_rows($ifa);


$groupeIA="select * from groupe where id_Filiere=(select id from filiere where nomFiliere like'%INGÉNIERIE AUTOMATISMES%')";
$ia=mysqli_query($mysqli,$groupeIA);
$nbrfia=mysqli_num_rows($ia);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestion Ecole</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
 <?php 
 include'navbar.php';
 ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

               

                <div class="card-body">
                  <h5 class="card-title">Étudiants </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $nbr ?></h6>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

               

                <div class="card-body">
                  <h5 class="card-title">Professeurs </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-square"></"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $nbrp; ?></h6>
                     
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">Filières<span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $nbrF ?></h6>
                     
                    </div>
                  </div>

                </div>
                
              </div>
            
              </div>
              

            </div>

        

          

          

          </div>
        </div><!-- End Left side columns -->

       

      </div>


      <div class="row">

<!-- Left side columns -->
<div class="col-lg-12">
  <div class="row">

    <!-- Sales Card -->
    <div class="col-xxl-4 col-md-6">
      <div class="card info-card sales-card">

       

        <div class="card-body">
          <h5 class="card-title">Groupe IIR </h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-person-lines-fill"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $nbrFiir ?></h6>
              

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Sales Card -->

    <!-- Revenue Card -->
    <div class="col-xxl-4 col-md-6">
      <div class="card info-card revenue-card">

       

        <div class="card-body">
          <h5 class="card-title">Groupe IFA </h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-person-lines-fill"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $nbrfifa; ?></h6>
             
            </div>
          </div>
        </div>

      </div>
    </div><!-- End Revenue Card -->

    <!-- Customers Card -->
    <div class="col-xxl-4 col-xl-12">

      <div class="card info-card customers-card">

       

        <div class="card-body">
          <h5 class="card-title">Groupe IA<span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-person-lines-fill"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $nbrfia ?></h6>
             
            </div>
          </div>

        </div>
        
      </div>
    
      </div>
      

    </div>



  

  

  </div>
</div><!-- End Left side columns -->



</div>
    </section>

  </main><!-- End #main -->

 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>