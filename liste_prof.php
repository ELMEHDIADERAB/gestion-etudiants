<?php
include 'connexion.php';
$empSQL = "SELECT * from prof";
$stagiaire = mysqli_query($mysqli, $empSQL);
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
  <?php include 'navbar.php'; ?>
  <main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste des Professeurs</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                   
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Fiélier</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Naissance</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($stg = mysqli_fetch_assoc($stagiaire)) {
                  ?>
                    <tr>                  
                      <td><?= $stg['nom_prof'] ?></td>
                      <td><?= $stg['prenom_prof'] ?></td>
                      <td><?= $stg['tel'] ?></td>
                      <td><?= $stg['genre'] ?></td>
                      <td><?= $stg['email'] ?></td>
                      <td><?= $stg['date_naissance'] ?></td>
                      <td><a href="modifier_prof.php?iddp=<?= $stg['id']; ?>" class="tm-product-delete-link">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                      &nbsp; &nbsp;
                        <a href="supprimer_prof?iddp=<?php echo $stg['id']; ?>" class="tm-product-delete-link" onclick="return confirm('voulez vous vraiment supprimer ce stagiaire')">
                          <i class="bi bi-trash"></i>
                        </a>

                      </td>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

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