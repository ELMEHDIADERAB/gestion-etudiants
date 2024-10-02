<?php 
session_start();
include 'connexion.php';

$did=$_GET['did'];
$query=("delete from groupe where id=$did ");
//$mysqli->exec($query);
$result=$mysqli->query($query);
if($result){
header('location:liste_groupe.php');}
else{
    echo '<div class="alert alert-warning"  role="alert"> Error</div>';
}


?>