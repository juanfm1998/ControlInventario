<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=inventario.xls');

include('init.php');

$query="SELECT * FROM utiles2";
$queryDias="SELECT DISTINCT Fecha_de_carga FROM utiles2";
$result=mysqli_query($mysqli,$query);
$resultDias=mysqli_query($mysqli,$queryDias);


?>
<html>
    <header>
 <meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</header>
<body>
<table style="border: 1px solid #000;">
    
    <tr>
        
       <th>#</th> 
        <th style="border: 1px solid #000;">Código Producto</th> 
        <th style="border: 1px solid #000;">Solicitante</th> 
        <th style="border: 1px solid #000;">Fecha de Retiro</th> 
        <th style="border: 1px solid #000;">Descripción</th> 
        <!--<th style="border: 1px solid #000;">Tipo de Producto</th> -->
      <!--   <th style="border: 1px solid #000;">Variante de Producto</th> -->
        <th style="border: 1px solid #000;">Salida</th> 
        <th style="border: 1px solid #000;">Entrada</th> 
        <th style="border: 1px solid #000;">Total</th> 
        
    </tr>
    
    <?php  while($row = mysqli_fetch_assoc($result)) { ?>
    <tr >
        
        <td style="border: 1px solid #000;"><?php echo $row['id_tabla']; ?></td> 
        <td style="border: 1px solid #000;"><?php echo $row['id_Producto']; ?></td> 
        <td style="border: 1px solid #000;"><?php echo $row['Solicitante']; ?></td> 
        <td style="border: 1px solid #000;"><?php echo $row['Fecha_de_carga']; ?></td> 
        <td style="border: 1px solid #000;"><?php  
        
        
        if($row['Variante_Producto']=='-'){
        echo $row['Tipo_Producto'];
        }
        
        else{
        
         echo $row['Variante_Producto'].$row['Tipo_Producto'];
        
        }; ?></td> 
       <!-- <td style="border: 1px solid #000;"><?php echo $row['Tipo_Producto']; ?></td>--> 
      <!--  <td style="border: 1px solid #000;"><?php echo $row['Variante_Producto']; ?></td> -->
        <td style="border: 1px solid #000;"><?php echo $row['salida']; ?></td> 
        <td style="border: 1px solid #000;"><?php echo $row['entrada']; ?></td> 
        <td style="border: 1px solid #000;"><?php echo $row['total']; ?></td>   
        
        
    </tr>
    <?php } ?>
</table>
</body>
</html>