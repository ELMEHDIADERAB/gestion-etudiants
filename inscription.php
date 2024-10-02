<?php 
include 'connexion.php';
session_start();
if(isset($_SESSION['sessionEmail'])){
    
    header('location:index.php');
    
}
if(isset($_POST["registre"])){
		
    $nom=strtoupper($_POST["nom"]);
    $prenom=strtoupper($_POST["prenom"]);
    $motPasse=md5($_POST["motDePasse"]);
    $email=$_POST["email"];
    

    $admin=mysqli_num_rows(mysqli_query($mysqli,"select * from admin where email='{$email}'"));
    if($_POST['email']=="" || $_POST["motDePasse"]==""){
        $msg1='<div class="alert alert-warning"  role="alert"> remplir les champs</div>';

    }else{
    if($admin>0){
        // echo "<script>alert('Ce compte : {$email} est déja créer.')</script>";
       $ms= "<div class='alert alert-warning' role='alert'> Ce compte est déja créer <b>{$email}</b></div>";
    }
    else{
        $sql3="INSERT INTO admin (nom,prenom,mot_de_passe,email) values('{$nom}','{$prenom}','{$motPasse}','{$email}')";
        $result3=mysqli_query($mysqli,$sql3);
        if($result3){
            // header("Location: index.php");
         echo "<script>alert('votre compte est bien créer !')</script>";
             $_SESSION["sessionId"]=$ro['id'];
            $_SESSION["sessionNom"]=$nom;
            $_SESSION["sessionprenom"]=$prenom;
            $_SESSION["sessionEmail"]=$email;
// $_SESSION["sessionPassword"]=$CmotPasse;
header("Location: bienvenue.php");
        }
        else{
            echo "<script>Error: ".$sql3.mysqli_error($mysqli)."</script>";
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Inscription</title>
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
                                <a href="inscription.php" class="logo d-flex align-items-center w-auto">
                                  <!--  <img src="assets/img/logo.png" alt="">!-->
                                    <span class="d-none d-lg-block">Gestion d'École</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Créer un compte</h5>
                                        <p class="text-center small">Entrez vos informations personnelles</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate method="POST" action="">
                                        <div class="col-12">
                                            <label for="nom" class="form-label">Nom</label>
                                            <input type="text" name="nom" class="form-control" id="nom" required>
                                            <div class="invalid-feedback">svp entrez votre nom !</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="prenom" class="form-label">Prénom</label>
                                            <div class="input-group has-validation">
                                                
                                                <input type="text" name="prenom" class="form-control" id="prenom" required>
                                                <div class="invalid-feedback">svp entrez votre prénom</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">Votre Email</label>
                                            <input type="email" name="email" class="form-control" id="email" required>
                                            <div class="invalid-feedback">Entrez votre adresse mail !</div>
                                        </div>



                                        <div class="col-12">
                                            <label for="motDePasse" class="form-label">Mot de Passe</label>
                                            <input type="password" name="motDePasse" class="form-control" id="motDePasse" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                       
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" name="registre">Créer un compte</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Vous avez déjà un compte ? <a href="login.php">Connexion</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>


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