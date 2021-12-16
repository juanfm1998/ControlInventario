<?php
session_start();

    include ("../controladores/init.php");	
    $cod_prod=$_POST['Codigo'];
    $producto= utf8_decode($_POST['Producto']);
    $cantidad=$_POST['Cantidad'];
    
    
    mysqli_query($mysqli, "insert into productos (cod_prod,descripcion,cant_inicial) values('$cod_prod','$producto','$cantidad')");
    header("location:../desboard/listaproductos.php");

