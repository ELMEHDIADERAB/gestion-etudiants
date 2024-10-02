<?php 
session_start();
include 'connexion.php';

$sid=$_GET['idds'];
$query=("delete from stagiaire where id_et=$sid");
//$mysqli->exec($query);
$result=$mysqli->query($query);
if($result){
header('location:liste_stagiaires.php');}
else{
    echo '<div class="alert alert-warning"  role="alert"> Error</div>';
}



?>