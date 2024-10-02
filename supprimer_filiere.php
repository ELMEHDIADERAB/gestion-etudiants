<?php 
session_start();
include 'connexion.php';

$did=$_GET['did'];
$query=("delete from filiere where id=$did ");
//$mysqli->exec($query);
$result=$mysqli->query($query);
if($result){
header('location:liste_filiere.php');}
else{
    echo '<div class="alert alert-warning"  role="alert"> Error</div>';
}


?>