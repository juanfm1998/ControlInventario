
<?php


$mysqli = new mysqli("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($mysqli,"base_utiles" );


if($mysqli->connect_error) {

	echo "<b>Fallo al conectar a la BD: </b>" . $mysqli->connect_error . "---" . $mysqli->connect_error;

}



 
 
 
// $pdo =new PDO("mysql:host=localhost;dbname=u637548092_ezy", "u637548092_frank139" , "mariobros139"  );

 ?>