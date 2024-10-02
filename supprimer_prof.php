<?php 
session_start();
include 'connexion.php';

$did=$_GET['iddp'];
$query=("delete from prof where id=$did ");
//$mysqli->exec($query);
$result=$mysqli->query($query);
if($result){
header('location:liste_prof.php');}
else{
    echo '<div class="alert alert-warning"  role="alert"> Error</div>';
}


?>