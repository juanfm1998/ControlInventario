<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=inventario.xls');

include('init.php');




$queryFin="SELECT p.id_prod,p.cod_prod,p.descripcion,e.nom_emp,s.fecha_salida,s.id_salida,s.cantidad_inicial,s.salida as 'Salida',s.stock_final as 'Stock Total' from productos p INNER JOIN salidas s on(s.cod_prod=p.cod_prod) INNER JOIN empleados e on(s.id_emp=e.id_emp) WHERE s.cod_prod=p.cod_prod ORDER BY s.id_salida,s.fecha_salida asc
";
//ESTE YA LO BORRAMOS
$fin0 = mysqli_query($mysqli,$queryFin);
//$fin = $fin0->fetch_array();


////////////////////////////////////////////////////////////



?>
<html>
    <header>
 <meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</header>
<body>
    

<table style="border: 1px solid #000;">
    
    <tr>
        
        <th style="border: 1px solid #000;">Código de Producto</th> 
        <th style="border: 1px solid #000;">Descripcion</th> 
        <th style="border: 1px solid #000;">Nombre</th> 
        <th style="border: 1px solid #000;">Fecha de salida</th> 
        <th style="border: 1px solid #000;">Cantidad Inicial</th> 
        <th style="border: 1px solid #000;">Salida</th>
        <th style="border: 1px solid #000;">Stock Final</th> 
        
      
        
        
        
    </tr>
    
    <?php while($row = mysqli_fetch_array($fin0)) { ?>
    <tr>
       
        <td style="border: 1px solid #000;"><?php echo $row['cod_prod']; ?></td> 
        <td style="border: 1px solid #000;"><?php echo utf8_encode($row['descripcion']); ?></td> 
        <td style="border: 1px solid #000;"><?php echo utf8_encode($row['nom_emp']); ?></td> 
         <td style="border: 1px solid #000;"><?php echo $row['fecha_salida']; ?></td> 
        <td style="border: 1px solid #000;"><?php echo $row['cantidad_inicial']; ?></td> 
        <td style="border: 1px solid #000;"><?php if(strpos($row['descripcion'],"Grapas")!=FALSE){ echo $row['Salida'] .' Barras';} else{echo $row['Salida'];};?></td>   
         <td style="border: 1px solid #000;"><?php if($row['Stock Total']<=0){ echo 0;}else{echo $row['Stock Total'];};?></td>
       
        
    </tr>
    <?php } ?>
</table>
</body>
</html>