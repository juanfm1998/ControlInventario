<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=inventario.xls');

include('init.php');




$queryFin="SELECT id_salida,id_emp,cod_prod,fecha_salida,salida,stock_final from salidas 

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
        
        <th style="border: 1px solid #000;">id_salida</th> 
        <th style="border: 1px solid #000;">id_emp</th> 
        <th style="border: 1px solid #000;">fecha_salida</th> 
        <th style="border: 1px solid #000;">salida</th>
        <th style="border: 1px solid #000;">stock_final</th> 
        
      
        
        
        
    </tr>
    
    <?php while($row = mysqli_fetch_array($fin0)) { ?>
    <tr>
       
        <td style="border: 1px solid #000;"><?php echo $row['id_salida']; ?></td> 
        <td style="border: 1px solid #000;"><?php echo utf8_encode($row['id_emp']); ?></td> 
         <td style="border: 1px solid #000;"><?php echo $row['fecha_salida']; ?></td> 
        <td style="border: 1px solid #000;"><?php echo $row['salida']?></td>   
         <td style="border: 1px solid #000;"><?php if($row['stock_final']<=0){ echo 0;}else{echo $row['stock_final'];};?></td>
       
        
    </tr>
    <?php } ?>
</table>
</body>
</html>