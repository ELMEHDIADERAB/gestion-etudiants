<?php

       
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "Gestion__Stagiaire";  
      
    $mysqli = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        //die("Failed to connect with MySQL: ". mysqli_connect_error()); 
        echo "<script>alert('erreur de connexion');</script>'";
    }  

?>