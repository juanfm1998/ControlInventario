<?php
include("init.php");
session_start();





foreach ($_SESSION['ProdEntrantes'] as $product_e => $productos_e){ 
     
 $provedor = $productos_e["NOMBREPROV"];
 $id_producto = $productos_e["IDP"];
 
 $nombre_producto = $productos_e["NOMBREPROD"];
 $tipo_producto =  $productos_e["TIPOPROD"];
 $variante_producto = $productos_e["VARIANT"];
 $cantidad_entrante = $productos_e["CANT"];
 

$consulta = "SELECT cant_inicial FROM productos WHERE cod_prod = '$id_producto'";
$resultado = $mysqli -> query($consulta);

$fila = $resultado->fetch_assoc();

$cantidad_inicial = $fila['cant_inicial'];


$SUMA = $cantidad_inicial+$cantidad_entrante; 
 
 
 

// AGREGAR A LA TABLA entrada
 $salidas = $mysqli -> prepare("INSERT INTO entrada(id_entrada, id_producto, Nom_prov, fecha_entrada, entrada, cantidad_inicial, stock_final) VALUES (NULL,'$id_producto','$provedor',now(),$cantidad_entrante,$cantidad_inicial,$SUMA)");
           
 $salidas ->execute();  
     


 $UPDATE = $mysqli -> prepare("UPDATE productos SET cant_inicial = $SUMA WHERE cod_prod = '$id_producto'");
      
     
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


unset($_SESSION["ProdEntrantes"]);   // reiniciar la session!!!



     ?>