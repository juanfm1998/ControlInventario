<?php
session_start();

    include ("../controladores/init.php");	
    $id_producto=$_POST['id_prod'];
    $nombre= utf8_decode($_POST['nombre']);
    $cantidad=$_POST['cantidad'];
    
    
    mysqli_query($mysqli, "update productos set descripcion='$nombre',cant_inicial='$cantidad' "
            . "where id_prod='$id_producto'");
    header("location:../desboard/listaproductos.php?alert&nombre=".$nombre);

