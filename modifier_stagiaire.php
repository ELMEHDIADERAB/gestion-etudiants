<?php 
include('connexion.php');
session_start();
if(!isset($_SESSION['sessionEmail'])){
    header('Location: login.php');
}
$id=$_GET["idetu"];
$sql = "select * from stagiaire where id_et='$id'";
$result = mysqli_query($mysqli, $sql);

    $fil = mysqli_fetch_assoc($result);

    if(isset($_POST['modifier'])){
      @$idetudiant=$_POST['idetudiant'];
      @$nom=$_POST['nom'];
      @$prenom=$_POST['prenom'];
      @$genre=$_POST['genre'];
      @$cne=$_POST['cne'];
      @$tel=$_POST['tel'];
      @$ville=$_POST['ville'];
      @$cin=$_POST['cin'];
      $idFiliere=$_POST['idFiliere'];
      $idGroupe=$_POST['idGroupe'];

     $query=("UPDATE stagiaire set nom='$nom',prenom='$prenom',genre='$genre',telephone='$tel',ville='$ville',cin='$cin',cne='$cne',id_groupe='$idGroupe' where id_et=$idetudiant ");
//$mysqli->exec($query);
$result=$mysqli->query($query);
if($result){
header('location:liste_stagiaires.php');}
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
    <title>Modifier étudiant</title>
</head>
<body>
    <?php include'navbar.php' ;
   
    ?>

    <main id="main" class="main">

<div class="pagetitle">
  <h1>Étudiant</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
      <li class="breadcrumb-item active">Étudiant </li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Modifier étudiant   <?php echo $fil['nom']?></h5>

          <!-- General Form Elements -->
          <form method="POST" action="">
            <div class="row mb-3">
              <label for="nom" class="col-sm-2 col-form-label">Nom</label>
              <div class="col-sm-10">
                <input type="hidden" name="idetudiant" value="<?php echo $fil['id_et'] ?>" >
                <input type="text" class="form-control" value="<?php echo $fil['nom'] ?>" id="nom" name="nom">
              </div>
            </div>
            <div class="row mb-3">
              <label for="nom" class="col-sm-2 col-form-label">Prénom</label>
              <div class="col-sm-10">
                
                <input type="text" class="form-control" value="<?php echo $fil['prenom'] ?>" id="prenom" name="prenom">
              </div>
            </div>
            <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Genre</label>
                  <div class="col-sm-10">
                    <select class="form-select"  name="genre" id="genre" >
                      <option selected ><?php echo $fil['genre'] ?></option>
                      <option value="homme">Homme</option>
                      <option value="femme">Femme</option>

                    </select>
                  </div>
                </div>
            <div class="row mb-3">
              <label for="nom" class="col-sm-2 col-form-label">cne</label>
              <div class="col-sm-10">
               
                <input type="text" class="form-control" value="<?php echo $fil['cne'] ?>" id="cne" name="cne">
              </div>
            </div>
            <div class="row mb-3">
              <label for="nom" class="col-sm-2 col-form-label">Téléphone</label>
              <div class="col-sm-10">
              
                <input type="text" class="form-control" value="<?php echo $fil['telephone'] ?>" id="tel" name="tel">
              </div>
            </div>
            <div class="row mb-3">
              <label for="nom" class="col-sm-2 col-form-label">Ville</label>
              <div class="col-sm-10">
               
                <input type="text" class="form-control" value="<?php echo $fil['ville'] ?>" id="ville" name="ville">
              </div>
            </div>
            <div class="row mb-3">
              <label for="nom" class="col-sm-2 col-form-label">Cin</label>
              <div class="col-sm-10">
                
                <input type="text" class="form-control" value="<?php echo $fil['cin'] ?>" id="cin" name="cin">
              </div>
            </div>

            <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="idFiliere">filiere</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="idFiliere" name="idFiliere" aria-label="Default select example">
                      <option selected>choisir la filiére</option>

                      <?php


                      $requete = "select * from  filiere";
                      global $resultat;
                      $resultat = $mysqli->query($requete) or die('Erreur ' . $requete . ' ' . $mysqli->error);



                      // tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent
                      while ($row2 = $resultat->fetch_assoc()) {

                      ?>
                        <option name="idFieliere" value="<?= $row2['id'] ?>"><?php echo $row2['nomFiliere']; ?></option>


                      <?php
                      };

                      ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="idGroupe">Groupe</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="idGroupe" name="idGroupe" aria-label="Default select example">
                      <option selected>choisir un groupe</option>


                      <?php

                      $requete2 = "select * from  groupe";
                      global $resultat2;
                      $resultat2 = $mysqli->query($requete2) or die('Erreur ' . $requete2 . ' ' . $mysqli->error);

                    

                      // tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent
                      while ($row3 = $resultat2->fetch_assoc()) {


                      ?>
                        <option name="idGroupe" value="<?=  $row3['id'] ?>"><?php echo $row3['nom_groupe'] ?></option>
                      <?php }  ?>
                    </select>
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