
<?php
include 'connexion.php';
session_start();
if(isset($_SESSION['sessionEmail'])){
    
    header('location:index.php');
    
}
if(isset($_POST["login"]))
    {
    if($_POST['email']=="" or $_POST["mot_de_passe"]==""){
       $msg='<div class="alert alert-warning"  role="alert"> remplir les champs</div>';

    }else{
$Ad_email=mysqli_real_escape_string($mysqli,$_POST['email']);
$Ad_motPasse=mysqli_real_escape_string($mysqli,md5($_POST['mot_de_passe']));

$sql1="select * from admin where email='{$Ad_email}' and mot_de_passe='{$Ad_motPasse}'";
$result1=mysqli_query($mysqli,$sql1);
$ro = $result1->fetch_assoc();
$count=mysqli_num_rows($result1);
if($count===1){
$_SESSION["sessionId"]=$ro['id'];
$_SESSION["sessionEmail"]=$ro['email'];
$_SESSION["sessionprenom"]=$ro['Prenom'];
$_SESSION["sessionNom"]=$ro['nom'];

// $_SESSION["sessionPassword"]=$CmotPasse;
header("Location: bienvenue.php");
}else{
    // echo"<script>alert('adresse email ou mot de passe incorrect')</script>";
    $msgerror='<div class="alert alert-danger" role="alert"> Email ou mot de passe est incorrect.</div>';
}
}}
	
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestion école</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="login.php" class="logo d-flex align-items-center w-auto">
                  <!--<img src="assets/img/logo.png" alt="">-->
                  <span class="d-none d-lg-block">Gestion école</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-5">Connectez-vous à votre compte</h5>
                    <p class="text-center small">Entrez votre adresse e-mail et votre mot de passe pour vous connecter</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">E-mail</label>
                      <div class="input-group has-validation">
                       
                        <input type="text" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                   <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>-->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Connexion</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Vous n'avez pas de compte ? <a href="inscription.php">Créer un compte</a></p>
                    </div>
                  </form>

                </div>
              </div>
              <?php  echo @$msgerror?>

            

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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