<?php 
include('connexion.php');
session_start();
if(!isset($_SESSION['sessionEmail'])){
    header('Location: login.php');
}
$id=$_GET["id"];
$sql = "select * from filiere where id='$id'";
$result = mysqli_query($mysqli, $sql);

    $fil = mysqli_fetch_assoc($result);

    if(isset($_POST['modifier'])){
        @ $idf=$_POST['idfiliere'];
     @$nomfiliere=$_POST['nomFiliere'];

     $query=("UPDATE filiere set nomFiliere='$nomfiliere' where id=$idf ");
//$mysqli->exec($query);
$result=$mysqli->query($query);
if($result){
header('location:liste_filiere.php');}
else{
    echo '<div class="alert alert-warning"  role="alert"> Error</div>';
}
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestion stagiaire</title>
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
    <title>Modifier filiéire</title>
</head>
<body>
    <?php include'navbar.php' ;
   
    ?>

    <main id="main" class="main">

<div class="pagetitle">
  <h1>Filière</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
      <li class="breadcrumb-item active">filière</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Modifier filière</h5>

          <!-- General Form Elements -->
          <form method="POST" action="">
            <div class="row mb-3">
              <label for="nom" class="col-sm-2 col-form-label">Nom</label>
              <div class="col-sm-10">
                <input type="hidden" name="idfiliere" value="<?php echo $fil['id'] ?>">
                <input type="text" class="form-control" value="<?php echo $fil['nomFiliere'] ?>" id="nomFiliere" name="nomFiliere">
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