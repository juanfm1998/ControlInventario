
<?php
include('init.php');
error_reporting(0);

//$product="";

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$solicitante_producto = $_POST['solicitante'];
 $id_producto = $_POST['idprod'];
 $id_emp = $_POST['idemp'];
 $nombre_producto = $_POST['nomprod'];
 $tipo_producto = $_POST['tipoproducto'];
 $variante_producto = $_POST['variante'];
 $cantidad_saliente = $_POST['cantidad'];
 $fecha=$_POST['fecha'];
 

$consulta = "SELECT cant_inicial FROM productos WHERE cod_prod = '$id_producto'";
$resultado = $mysqli -> query($consulta);

$fila = $resultado->fetch_assoc();

$cantidad_inicial = $fila['cant_inicial'];


$RESTA = $cantidad_inicial-$cantidad_saliente; 
 
$registros0= mysqli_query($mysqli,"select id_salida from salidas order by id_salida asc limit 80");
$total_registros= mysqli_num_rows($registros0);

//$total_registros2= mysqli_num_rows($registros0);
//$postPorPagina2=6;
//$totalpaginas2= ceil($total_registros2/$postPorPagina2);

$pagina= isset($_GET['pagina']) ? (int)$_GET['pagina']:1;
$postPorPagina=6;
$inicio=($pagina>1) ? ($pagina*$postPorPagina)-$postPorPagina : 0;
$totalpaginas= ceil($total_registros/$postPorPagina);

 

// AGREGAR A LA TABLA SALIDAS
 
     

 if($RESTA<0){
      $UPDATE = $mysqli -> prepare("UPDATE productos SET cant_inicial = 0 WHERE cod_prod = '$id_producto'");
      $salidas = $mysqli -> prepare("INSERT INTO salidas (id_salida, id_emp, cod_prod, fecha_salida, cantidad_inicial, salida, stock_final) values (NULL, $id_emp, '$id_producto','$fecha',$cantidad_inicial, $cantidad_saliente,0)");
           
      $salidas ->execute();  

 }else{
     $UPDATE = $mysqli -> prepare("UPDATE productos SET cant_inicial = $RESTA WHERE cod_prod = '$id_producto'");
     $salidas = $mysqli -> prepare("INSERT INTO salidas (id_salida, id_emp, cod_prod, fecha_salida, cantidad_inicial, salida, stock_final) values (NULL, $id_emp, '$id_producto','$fecha',$cantidad_inicial, $cantidad_saliente,$RESTA)");
           
      $salidas ->execute();  
 }
      
     
$UPDATE ->execute();     
    
;




//MOSTRAR DATOS BD ENTRADA_PRODUCTOS
   
$productos_salidas2 = "SELECT p.id_prod,p.cod_prod,p.descripcion,e.nom_emp,s.fecha_salida,s.id_salida,s.cantidad_inicial,s.salida as 'Salida',s.stock_final as 'Stock Total' from productos p INNER JOIN salidas s on(s.cod_prod=p.cod_prod) INNER JOIN empleados e on(s.id_emp=e.id_emp) WHERE s.cod_prod=p.cod_prod ORDER BY s.id_salida desc,s.fecha_salida desc
 
LIMIT $inicio,$postPorPagina

";
           
 $mostrar2 = mysqli_query($mysqli,$productos_salidas2);

?>

 <div class="main-card mb-3 card">
                                    <div class="card-body">            
                                         <table class="mb-0 table table-striped">
    
    <tr>
        
        <th>Descripcion</th> 
        <th>Nombre</th> 
        <th>Fecha de salida</th> 
        <th>Cantidad Inicial</th> 
        <th>Salida</th>
        <th>Stock Final</th> 
        <th>Opciones</th> 

      
        
        
        
    </tr>
 
  <?php while($row = mysqli_fetch_array($mostrar2)) { ?>
    <tr class="active" id="<?php echo $row['id_salida'];?>" style="font-weight: normal;">
       
        <td><?php echo utf8_encode($row['descripcion']); ?></td> 
        <td><?php echo utf8_encode($row['nom_emp']); ?></td> 
         <td><?php echo $row['fecha_salida']; ?></td> 
        <td><?php echo $row['cantidad_inicial']; ?></td> 
        <td><?php if($row['descripcion']=='Grapas 26/6 A4 (barras)'){ echo $row['Salida'] .' barras';}
            else if($row['descripcion']=='Papel lustre (pliegos)'){ echo $row['Salida'] .' pliegos';}
            else{echo $row['Salida'] .' unid';};?></td>   
         <td><?php echo $row['Stock Total']; ?></td>
        <td>
            <a onclick="eliminar('<?php echo $row['cod_prod'];?>','<?php echo $row['id_salida'];?>','<?php echo $row['Salida'];?>','<?php echo $row['Stock Total'];?>')"><button type="button" class="btn btn-danger" name="eliminar">Eliminar</button></a>
        </td>
        
    </tr>
    <?php } ?>  
    </table>              
     </div>

     <div style="text-align:center;margin-top:30px;margin: auto; ">     
                                        <nav>
                                            <ul class="pagination">  
                                                <?php

                                                  if ($totalpaginas > 1) {
                                                        if ($pagina != 1)
                                                            echo '<li><a href="index.php?pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">«</span> 

                                                                            </a>

                                                                       </li>';
                                                        for ($i=1;$i<=$totalpaginas;$i++) {
                                                            if ($pagina == $i)

                                                                echo '<li><a href="#"><div style="color:#C30;">'.$pagina.'</div></a></li>';
                                                            else

                                                                echo ' <li><a href="index.php?pagina='.$i.'">'.$i.'</a></li> ';
                                                        }
                                                        if ($pagina != $totalpaginas)
                                                            echo '<li><a href="index.php?pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">»</span> 

                                                                             </a>

                                                                      </li>';
                                                    }
                                                    echo '</p>';

                                                ?>
                                            </ul>
                                        </nav>
                                    </div>  
                                
       </div>  
    

