<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
           <!-- Table with hoverable rows -->
           <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col"> </th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">CNE</th>
                    <th scope="col">Fiélier</th>
                    <th scope="col">Groupe</th>
                    <th scope="col">Date Naissance</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
  $idGroupe = $_POST['idGroupe'];

                  $empSQL = "SELECT stagiaire.* ,filiere.* , groupe.*
              FROM stagiaire
              INNER JOIN filiere
              ON stagiaire.id_Filiere =filiere.id  
              inner join groupe 
              on stagiaire.id_groupe=groupe.$idGroupe";
                  $empResult = mysqli_query($mysqli, $empSQL);
                  
                  while ($row5 = mysqli_fetch_assoc($empResult)) {
                    if($row5>0){
                  ?>
                    <tr>

                      <th scope="row"><?= $row5['id'] ?></th>
                      <td><?= $row5['nom'] ?></td>
                      <td><?= $row5['prenom'] ?></td>
                      <td><?= $row5['cne'] ?></td>
                      <td><?= $row5['nomFiliere'] ?></td>
                      <td><?= $row5['nom_groupe'] ?></td>
                      <td><?= $row5['date_naissance'] ?></td>
                      <td><a href="modifier_stagiaire.php?id=<?php echo $row5['id']; ?>" class="tm-product-delete-link">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        &nbsp; &nbsp;
                        <a href="supprimer_stagiaire.php?did=<?php echo $row5['id']; ?>" class="tm-product-delete-link" onclick="return confirm('voulez vous vraiment supprimer cet produit')">
                          <i class="bi bi-trash"></i>
                        </a>

                      </td>

                    </tr>
                  <?php 
                  } }
                   ?>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->
</body>
</html>