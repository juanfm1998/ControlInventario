
<?php
include("init.php");
error_reporting(0);


              
  ////////////////////////////////////////      
   $provedor = $_POST['nomprov'];
 $id_producto = $_POST['idprod'];
 
 $nombre_producto = $_POST['nomprod'];
 $tipo_producto =  $_POST['tipoproducto'];
 $variante_producto = $_POST['variante'];
 $cantidad_entrante = $_POST['cantidad'];
 $fecha= $_POST['fecha'];



$consulta = "SELECT cant_inicial FROM productos WHERE cod_prod = '$id_producto'";
$resultado = $mysqli -> query($consulta);

$fila = $resultado->fetch_assoc();

$cantidad_inicial = $fila['cant_inicial'];


$SUMA = $cantidad_inicial+$cantidad_entrante; 
 
 
 

// AGREGAR A LA TABLA entrada
 $salidas = $mysqli -> prepare("INSERT INTO entrada(id_entrada, id_producto, Nom_prov, fecha_entrada, entrada, cantidad_inicial, stock_final) VALUES (NULL,'$id_producto','$provedor','$fecha',$cantidad_entrante,$cantidad_inicial,$SUMA)");
           
 $salidas ->execute();  
     


 $UPDATE = $mysqli -> prepare("UPDATE productos SET cant_inicial = $SUMA WHERE cod_prod = '$id_producto'");
      
     
$UPDATE ->execute();      


$registros0= mysqli_query($mysqli,"select id_entrada from entrada order by id_entrada asc");
$total_registros= mysqli_num_rows($registros0);

$pagina= isset($_GET['pagina']) ? (int)$_GET['pagina']:1;
$postPorPagina=6;
$inicio=($pagina>1) ? ($pagina*$postPorPagina)-$postPorPagina : 0;
$totalpaginas= ceil($total_registros/$postPorPagina);
     
//MOSTRAR DATOS BD ENTRADA_PRODUCTOS
   
$productos_entradas = "select p.cod_prod,p.id_prod,p.descripcion, e.Nom_prov ,e.fecha_entrada,e.cantidad_inicial,e.id_entrada,e.entrada as 'Entrada', e.stock_final as 'Stock Final' from entrada e INNER JOIN productos p ON(p.cod_prod=e.id_producto) order by e.id_entrada desc,e.fecha_entrada desc
LIMIT $inicio,$postPorPagina

";
           
 $mostrar = mysqli_query($mysqli,$productos_entradas);

?>
 <div class="main-card mb-3 card">
                                    <div class="card-body">            
                                         <table class="mb-0 table table-striped">
    
    <tr class="active" id="<?php echo $row['id_entrada'];?>">
        
<!--        <th>Código de Producto</th> -->
        <th>Descripcion</th> 
        <th>Proveedor</th> 
        <th>Fecha de entrada</th> 
        <th>Cantidad Inicial</th> 
        <th>Entrada</th>
        <th>Stock Final</th> 
        <th>Opciones</th> 

      
        
        
        
    </tr>
 
  <?php while($row = mysqli_fetch_array($mostrar)) { ?>
    <tr class="active" id="<?php echo $row['id_entrada'];?>">
       

        <td><?php echo utf8_encode($row['descripcion']); ?></td> 
        <td><?php echo utf8_encode($row['Nom_prov']); ?></td> 
         <td><?php echo $row['fecha_entrada']; ?></td> 
        <td><?php echo $row['cantidad_inicial']; ?></td> 
         <td><?php echo $row['Entrada']; ?></td>   
         <td><?php echo $row['Stock Final']; ?></td>
         <td>
            
            <a onclick="eliminar('<?php echo $row['cod_prod'];?>','<?php echo $row['id_entrada'];?>','<?php echo $row['Entrada'];?>','<?php echo $row['Stock Final'];?>')"><button type="button" class="btn btn-danger" name="eliminar">Eliminar</button></a>
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
                                                            echo '<li><a href="entrada.php?pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">«</span> 

                                                                            </a>

                                                                       </li>';
                                                        for ($i=1;$i<=$totalpaginas;$i++) {
                                                            if ($pagina == $i)

                                                                echo '<li><a href="#"><div style="color:#C30;">'.$pagina.'</div></a></li>';
                                                            else

                                                                echo ' <li><a href="entrada.php?pagina='.$i.'">'.$i.'</a></li> ';
                                                        }
                                                        if ($pagina != $totalpaginas)
                                                            echo '<li><a href="entrada.php?pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">»</span> 

                                                                             </a>

                                                                      </li>';
                                                    }
                                                    echo '</p>';

                                                ?>
                                            </ul>
                                        </nav>
                                    </div>    

       </div>  
