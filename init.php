<?php

session_start();



try{
    $pdo =new PDO("mysql:host=localhost;dbname=u637548092_ezy", "u637548092_frank139" , "mariobros139");
    
    
}
catch(PDOException $error){
    exit("error en la conexion");
}



?>