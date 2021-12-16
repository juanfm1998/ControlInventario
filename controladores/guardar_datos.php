<?php
include("init.php");
session_start();





foreach ($_SESSION['ProdAgregados'] as $product => $productos){ 
     
 $solicitante_producto = $productos["SOLI"];
 $id_producto = $productos["IDP"];
 $id_emp = $productos["IDE"];
 $nombre_producto = $productos["NOMBREPROD"];
 $tipo_producto =  $productos["TIPOPROD"];
 $variante_producto = $productos["VARIANT"];
 $cantidad_saliente = $productos["CANT"];
 

$consulta = "SELECT cant_inicial FROM productos WHERE cod_prod = '$id_producto'";
$resultado = $mysqli -> query($consulta);

$fila = $resultado->fetch_assoc();

$cantidad_inicial = $fila['cant_inicial'];


$RESTA = $cantidad_inicial-$cantidad_saliente; 
 
 
 

// AGREGAR A LA TABLA SALIDAS
 $salidas = $mysqli -> prepare("INSERT INTO salidas (id_salida, id_emp, cod_prod, fecha_salida, cantidad_inicial, salida, stock_final) values (NULL,'$id_emp', '$id_producto',CURDATE(),$cantidad_inicial, $cantidad_saliente,$RESTA)");
           
 $salidas ->execute();  
     


 $UPDATE = $mysqli -> prepare("UPDATE productos SET cant_inicial = $RESTA WHERE cod_prod = '$id_producto'");
      
     
$UPDATE ->execute();     
    

  
 };
 
 

 
  //$queryDias="SELECT DISTINCT Fecha_de_carga FROM utiles"; // La cantidad de fechas que hay
//$resultDias=mysqli_query($mysqli,$queryDias);
//$row0 = $resultDias->fetch_array();       
//   $cantfin = "25/23/32";

//$is=1;
//for($i=0;$i<3;$i++) {
 
 


///$fecha1 = $valor["Fecha_de_carga"];
//$fecha="sadasd".$cantfin; 

//$queryAdd = $mysqli -> prepare("alter table productos add $fecha VARCHAR(250) default 'sdsds'");
//$queryAdd->execute(); 




//};


echo '<li class="list-group-item-success text-center list-group-item">Datos guardados con éxito!</li>';	


unset($_SESSION["ProdAgregados"]);   // reiniciar la session!!!



     ?>