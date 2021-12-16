<?php
 include("init.php");
    $id_product=$_POST['id_prod'];
    $id_salida=$_POST['id_salida'];
    $Salida=$_POST['Salida'];
    $StockFinal=$_POST['Stock'];
    
    
      $stock_nuevo = "SELECT cant_inicial FROM productos where cod_prod='$id_product'";
$resultado = $mysqli -> query($stock_nuevo);

$fila = $resultado->fetch_assoc();

$cantidad_inicial = $fila['cant_inicial'];   
    
    
    $cant_inicialn=$cantidad_inicial+$Salida;


    $registros0= mysqli_query($mysqli,"select id_salida from salidas order by id_salida limit 80");
$total_registros= mysqli_num_rows($registros0);

$pagina= isset($_GET['pagina']) ? (int)$_GET['pagina']:1;
$postPorPagina=6;
$inicio=($pagina>1) ? ($pagina*$postPorPagina)-$postPorPagina : 0;
$totalpaginas= ceil($total_registros/$postPorPagina);

$UPDATE = $mysqli -> prepare("UPDATE productos SET cant_inicial = $cant_inicialn WHERE cod_prod = '$id_product'");
$UPDATE-> execute();

   $UPDATE2 = $mysqli -> prepare("UPDATE salidas SET cantidad_inicial=cantidad_inicial+$Salida, stock_final=stock_final+$Salida  WHERE cod_prod = '$id_product' and id_salida>$id_salida " );
     $UPDATE2-> execute();
    
   
    mysqli_query($mysqli, "delete from salidas where id_salida='$id_salida' and cod_prod='$id_product'");
    
    $productos_salidas = "SELECT p.id_prod,p.cod_prod,p.descripcion,e.nom_emp,s.fecha_salida,s.id_salida,s.cantidad_inicial,s.salida as 'Salida',s.stock_final as 'Stock Total' from productos p INNER JOIN salidas s on(s.cod_prod=p.cod_prod) INNER JOIN empleados e on(s.id_emp=e.id_emp) WHERE s.cod_prod=p.cod_prod ORDER BY s.id_salida desc,s.fecha_salida desc
 
    LIMIT $inicio,$postPorPagina";
           
 $mostrar3 = mysqli_query($mysqli,$productos_salidas);
    
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
 
  <?php while($row = mysqli_fetch_array($mostrar3)) { ?>
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