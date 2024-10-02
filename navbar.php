<?php
include 'connexion.php';
@session_start();

@$sql = "select * from admin where email= '{$_SESSION["sessionEmail"]}'";
$result = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}




// if(isset($_SESSION["sessionEmail"])){
//     header("Location: account.php");
// }else{
//     echo "<script>alert('Bonjour : $_SESSION[sessionEmail]')</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'école</title>
</head>
<body>
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
   <!-- <img src="assets/img/logo.png" alt="">-->
    <span class="d-none d-lg-block">Gestion d'école</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<!--<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->


  

    <li class="nav-item dropdown pe-4">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
       <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">-->
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['nom'].' '.$row['prenom'] ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $row['nom']. ' '.$row['prenom'] ?></h6>
          <span>Admin</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="profile.php">
            <i class="bi bi-person"></i>
            <span>Mon Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        
        

        
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="deconnexion.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Déconnexion</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="ajouter_etudiant.php">
          <i class="bi bi-circle"></i><span>Ajouter des étudiants</span>
        </a>
      </li>
      <li>
        <a href="liste_stagiaires.php">
          <i class="bi bi-circle"></i><span>Liste des étudiants</span>
        </a>
      </li>
     
       
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-person"></i><span>Professeurs</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="ajouter_prof.php">
          <i class="bi bi-circle"></i><span>Ajouter des Professeurs</span>
        </a>
      </li>
      <li>
        <a href="liste_prof.php">
          <i class="bi bi-circle"></i><span>Liste des Professeurs</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Filiére</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="ajouter_filiere.php">
          <i class="bi bi-circle"></i><span>Ajouter Filiére</span>
        </a>
      </li>
      <li>
        <a href="liste_filiere.php">
          <i class="bi bi-circle"></i><span>Liste des Filiére</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-file-earmark-text-fill"></i><span>Groupe</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="ajouter_groupe.php">
          <i class="bi bi-circle"></i><span>Ajouter groupe</span>
        </a>
      </li>
      <li>
        <a href="liste_groupe.php">
          <i class="bi bi-circle"></i><span>Liste des groupes</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Icons Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li>

  

  

</ul>

</aside>
</body>
</html>