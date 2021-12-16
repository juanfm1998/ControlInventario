
<?php

error_reporting(0);

$solicitante = $_POST['solicitante'];
$idproducto = $_POST['idprod'];
$id_emp = $_POST['idemp'];
$nombreproducto = $_POST['nomprod'];

$tipoproducto = $_POST['tipoproducto'];
//$variante1 = $_POST['variante1'];
//$variante2 = $_POST['variante2'];
$cantidad = $_POST['cantidad'];
$verif = $_POST['verif'];
$variante = $_POST['variante'];

//$product="";


session_start();
    $numprod = count($_SESSION['ProdAgregados']);    
       
           
            $product = array(
                'NUM' => $numprod,
                'SOLI' => $solicitante,
                'IDP' => $idproducto,
                'IDE' => $id_emp, 
                 'NOMBREPROD' => $nombreproducto,
                  
                   'TIPOPROD' => $tipoproducto,
                    'VARIANT' => $variante,
                    
                     'CANT' => $cantidad
                     
                );
                
               $_SESSION['ProdAgregados'][$numprod] = $product;
              
        
        
     

          
      /*
        case 'Eliminar':
            if(is_string($_POST['id'])){
                $ID=$_POST['id'];
                foreach($_SESSION['carritos'] as $indice => $product){
                    if($product['ID'] == $ID){
                       unset($_SESSION['carritos'][$indice]); 
                       $_SESSION['carritos']= array_values($_SESSION['carritos']);
                       
                       $mensajec="Producto Eliminado!";
                       $colorcarro="success";
                       
                    }
                 }
             
            }
            
            else{
                $mensaje="Ups Id incorrecto".$ID."<br/>";
            }
            break;
    } 
}*/
;


    
echo '

<div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Solicitante</th>
                                                <th>Producto</th>
                                                <th>Variante</th>
                                                <th>Cantidad</th>
                                                <th>Opciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            '
         ?>                                   
                   <?php foreach ($_SESSION['ProdAgregados'] as $product => $productos) {
                   
                   echo '
                   
                   <tr>
                                                <th scope="row">'.$productos["SOLI"].'</th>
                                                <td>'.$productos["NOMBREPROD"].'</td>
                                                <td>'.$productos["TIPOPROD"].'</td>
                                                <td>'.$productos["CANT"].'</td>
                                                <td> <input value="'.$productos["NUM"].'" ><button id="'.$productos["NUM"].'" onclick="eliminar_producto()" style="width:40px;height:35px;margin-left:6px; background-color: transparent !important;" class="btn btn-danger" name="btnAccion" value="'.$productos["NUM"].'"><i class="fa fa-close" style="color:red"></i></button></td>
                                            </tr>
                   
                   
                   ' ?>
                   <?php } ?> <?php echo '
                                           
                                            </tbody>
                                        </table>
                                        
                                        
                                        
                                    </div>
                                </div>




'


 ;
     	





?>