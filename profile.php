
<?php
include 'connexion.php';
session_start();
if(!isset($_SESSION['sessionEmail'])){
    header('Location: login.php');
}
@$sql = "select * from admin where email= '{$_SESSION["sessionEmail"]}'";
$result = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($result) > 0) {
    $admin = mysqli_fetch_assoc($result);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
  <title>Document</title>
</head>
<body>
    <?php 
    include'navbar.php';
    ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1><?php  echo $_SESSION['sessionNom'];
                 echo ' '. $_SESSION["sessionprenom"];?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Donnée personnelle</h5>
<?php 

if (isset($_POST['modifier'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    
 
    @$email = $_POST['email'];
   
    $motdepasse = $_POST['motdepasse'];

        $sql = "UPDATE admin SET Nom='$nom' , Prenom='$prenom' , email='$email' ,  mot_de_passe=md5('$motdepasse') where email= '{$_SESSION["sessionEmail"]}'";
        $result = $mysqli->query($sql);

       if($result>0){
        echo("<meta http-equiv='refresh' content='1'>");
        $msg1='<div class="alert alert-success"  role="alert"> Bien Modifier</div>';

       }

}
?>
              <!-- General Form Elements -->
              <form method="POST" action="">
                <div class="row mb-3">
                  <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $admin['nom']  ?>" id="nom" name="nom">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" for="prenom">Prénom</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $admin['prenom']  ?>" id="prenom" name="prenom">
                  </div>
                </div>
               
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label" for="cne">E-mail</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $admin['email']  ?>" id="cne" name="email">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label" for="motdepasse">Mot de passe</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" value="<?php echo $admin['mot_de_passe']  ?>" id="motdepasse" name="motdepasse">
                  </div>
                </div>
                
                


               



                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label>-->
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

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