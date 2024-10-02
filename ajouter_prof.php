<?php
include 'connexion.php';
session_start();
if (isset($_POST['ajouter'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $genre = $_POST['genre'];
  $email = $_POST['email'];

  $date_naissance = $_POST['datenaissance'];
  
  $telephone=$_POST['tel'];



  $sql3 = "INSERT INTO prof (nom_prof,prenom_prof,date_naissance,genre,tel,email) 
  values('{$nom}','{$prenom}','{$date_naissance}','{$genre}','{$telephone}','{$email}')";
  //$result3=mysqli_query($mysqli,$sql3);
  $result3 = $mysqli->query($sql3) or die('Erreur ' . $sql3 . ' ' . $mysqli->error);;
  if ($result3) {
    echo "<script>alert('Bien ajouté')</script>";

    header('location:liste_prof.php');
  } else {
    echo "<script>alert('Message d'erreur')</script>";
    header('location:cart.php');
  }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestion d'école</title>
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
    
</head>
<body>
<?php include'navbar.php';?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Professeur</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>        
          <li class="breadcrumb-item active">Prof</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ajouter Professeur</h5>

              <!-- General Form Elements -->
              <form method="POST" action="">
                <div class="row mb-3">
                  <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom" name="nom">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" for="prenom">Prénom</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="prenom" name="prenom">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Genre</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="genre" id="genre" >
                      <option selected>choisir le genre</option>
                      <option value="homme">Homme</option>
                      <option value="femme">Femme</option>

                    </select>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label" for="tel">Téléphone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tel" name="tel">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" for="email">email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email">
                  </div>
                </div>
                
               
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date de Naissance</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="datenaissance">
                  </div>
                </div>
             
                

                <div class="row mb-3">
                 <!-- <label class="col-sm-2 col-form-label">Submit Button</label>-->
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section></main>
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