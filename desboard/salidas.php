<?php 

session_start();


//include ('../init.php');
//include ('../init2.php');

include ("../controladores/init.php");	
require_once("../config/parameters.php"); 
$usuarios= mysqli_query($mysqli,"select * from empleados order by id_emp asc");


//MOSTRAR DATOS BD ENTRADA_PRODUCTOS
   
$productos_entradas = "SSELECT p.cod_prod,p.descripcion,e.nom_emp,s.fecha_salida,s.cantidad_inicial,SUM(s.salida) as 'Salida',s.stock_final as 'Stock Total' from productos p INNER JOIN salidas s on(s.cod_prod=p.cod_prod) INNER JOIN empleados e on(s.id_emp=e.id_emp) WHERE s.cod_prod=p.cod_prod GROUP BY p.cod_prod,e.nom_emp ASC";
           
 $mostrar = mysqli_query($mysqli,$productos_entradas);





$id_usu =$_SESSION['cod'];



if(isset($_SESSION['logueado']) != "TRUE") {

	header("Location: http://localhost/ControlInventario/");

	}

 else {

 ?>


<!doctype html>
<html lang="en">





<script type="text/javascript">
    function eliminar_producto(id){
                if(confirm("¿Confirma su eliminacion?")){
                       $.ajax({
                           type: "POST",
                           url:"eliminar_producto.php",
                           data:'id_producto='+id
                           
                       });
                     $("#"+id).hide("fast");   
                   }
                  
            } 
function selectProd(){
  //  $('.fa-spin').removeClass('hide2');
    var producto = document.getElementById('SelectProd').value;
     
   
   
    $.ajax({
        type:'post',
        url:'../controladores/verificar_Prod.php',
        
       data: {
						 producto:producto,
						 
						
					},
						
				
        success:function(resp){
            //$('.fa-spin').addClass('hide2');
            $("#respuesta1").html(resp);
            $("#respuesta2").html("");
           
            
        }
    });
    return false;
   
} 
;

function selectCate(){
  //  $('.fa-spin').removeClass('hide2');
    
     var prodcate = document.getElementById('SelectProdCate').value;
   
   
    $.ajax({
        type:'post',
        url:'../controladores/verificar_cate.php',
        
       data: {
						 
						 prodcate: prodcate,
						
					},
						
				
        success:function(resp){
            //$('.fa-spin').addClass('hide2');
            $("#respuesta2").html(resp);
        }
    });
    return false;
   
}    ;


function AgregarProducto(){
    var opcion = confirm("Estas seguro de guardar los datos?");
    
   var idemp = document.getElementById('soli').value; 
   var idemp2 = document.getElementById('soli'); 
 
 var verif1 = document.getElementById('verif').value;
 if(verif1 == '1'){
     var idprod = document.getElementById('SelectProdCate').value;
     var variante = "-";
     var verif=1;
 }
 //cuando es sub categoria correlo
if(verif1 == '2'){
     var idprod = document.getElementById('SelectProdCate2').value;
      var tipoprod2 = document.getElementById('SelectProdCate2');
     var variante = tipoprod2.options[tipoprod2.selectedIndex].text;
     var verif=2;
 };
 //  $('.fa-spin').removeClass('hide2');
    var producto = document.getElementById('SelectProd');
    var tipoprod = document.getElementById('SelectProdCate');
     //var idprod = document.getElementById('SelectProd');
    // --------------------------------------------------------------
    
    var nomprod = producto.options[producto.selectedIndex].text;
    
    var solicitante = idemp2.options[idemp2.selectedIndex].text; //arreglar 

    //var tipoopera = $('input[name="inlineDefaultRadiosExample"]:checked').val();
    var tipoproducto = tipoprod.options[tipoprod.selectedIndex].text;
  
   // var variante1 = $('input[name="variante1"]:checked').val();
    var cantidad = document.getElementById('cantidad').value;
  
  if (opcion == true) {
 
    $.ajax({
        type:'post',
        url:'../controladores/salida_productos.php',
        
       data: {
                        idprod:idprod,
						 nomprod:nomprod,
						  solicitante:solicitante,
						   verif:verif,
						   tipoproducto:tipoproducto,
						    variante:variante,
						     cantidad:cantidad,
                                                     idemp:idemp,
						     
						     
						 
						
					},
						
				
        success:function(resp){
            //$('.fa-spin').addClass('hide2');
            $("#respuesta3").html(resp);
             $("#respuesta5").html("");
           
            
        }
    });
    return false;
    }
    else{};
} 
;


function guardarDatos(){
  //  $('.fa-spin').removeClass('hide2');
   // var producto = document.getElementById('SelectProd').value;
     
  var opcion = confirm("Estas seguro de guardar los datos?");
    
    if (opcion == true) {
        
        
      $.ajax({
        type:'post',
        url:'../controladores/guardar_datos.php',
        
       data: {	},
						
				
        success:function(resp){
            //$('.fa-spin').addClass('hide2');
            $("#respuesta5").html(resp);
            $("#respuesta3").html("");
           
            
        }
    });
    return false;
      
        
        
        
        
        
	} else {
	   
	}  
   
   
} 
;



function eliminar_producto(){
  //  $('.fa-spin').removeClass('hide2');
   // var producto = document.getElementById('SelectProd').value;
     
  var position = document.getElementById('SelectProdCate2').value;
    
    
        
      $.ajax({
        type:'post',
        url:'../controladores/eliminar_producto.php',
        
       data: { position:position},
						
				
        success:function(resp){
            //$('.fa-spin').addClass('hide2');
            $("#respuesta5").html(resp);
            $("#respuesta3").html("");
           
            
        }
    });
    return false;
      
  
   
   
}

</script>


<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Panel de control</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.">
    <meta name="msapplication-tap-highlight" content="no">
    

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
 <link href="./main.css" rel="stylesheet">
 
 
 
 
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>



 
 </head>   
    
  

    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        
                        <button class="close"></button>
                    </div>
                        </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                           
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                       Frank Meza
                                    </div>
                                    <div class="widget-subheading">
                                        Administrador
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>       
                    
                    </div>
            </div>
        </div>       
        
  
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Panel</li>
                                <li>
                                    <a href="<?=base_url?>desboard/index.php">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                       Salidas de Productos
                                    </a>
                                </li>
                                 <li>
                                    <a href="<?=base_url?>desboard/entrada_prod.php">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                       Entradas de Productos
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Panel de Usuarios</li>
                                
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Usuarios
                                    </a>
                                </li>
                              
                            

                                <li>
                                    <a href="AgregarUsuario.php">
                                        <i class="metismenu-icon pe-7s-eyedropper"></i>
                                        Agregar Usuarios
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="tables-regular.html">
                                        <i class="metismenu-icon pe-7s-mouse"></i>
                                        Eliminar Usuarios
                                    </a>
                                </li>
                                
                                
                               
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>    
                
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Control de Inventario
                                        <div class="page-title-subheading">Solicitud de productos
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    
                                    <div class="d-inline-block dropdown">
                                        
                                        <a href="../controladores/exportar.php" class="btn-shadow btn btn-success">
                                           <i class="fa fa-file-excel-o" style="font-size:16px;color:white"></i> 
                                       
                                            Descargar
                                        </a>
                                        
                                        <a href="../controladores/exportar2.php" class="btn-shadow btn btn-success">
                                           <i class="fa fa-file-excel-o" style="font-size:16px;color:white"></i> 
                                       
                                            Descargar2
                                        </a>
                                        
                                    </div>
                                </div>    </div>
                        </div>
                        
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Producto</h5>
                                                <form method="post" onsubmit="">

                                                    <div class="position-relative form-group"><label>Solicitante</label><select id='soli' class="form-control" require>
                                                        <option disabled="disabled" selected="selected" value="0">Seleccionar..</option>
                                                    <?php
                                                                while ($row = mysqli_fetch_assoc($usuarios)):
                                                            ?>
                                                                <option value="<?php echo $row['id_emp']?>"> <?php echo $row['nom_emp'];?> <?php echo $row['ape_emp'];?></option>
                                                                <?php
                                                            endwhile;
                                                        ?>
                                                    
                                                    </select></div>
                                                    
                                                    
                                                    <div class="position-relative form-group"><label for="SelectProd" class="">Nombre Producto</label><select name="SelectProd" id="SelectProd" onchange="selectProd();" class="form-control" require>
                                                        <option disabled="disabled" selected="selected" value="00">Seleccionar..</option>
                                                        <option value="01">Clips</option>
                                                        <option value="02">Utiles de escritorio</option>
                                                        <option value="03">Faster</option>
                                                        <option value="04">Bolsas</option>
                                                        <option value="05">Papel lustre (Pliego)</option>
                                                        <option value="06">Grapas</option>
                                                        <option value="07">Cuchilla 18 mm</option>
                                                        
                                                    </select></div>
                                                    
                    
                                
                                                </form>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Tipo / Cantidad</h5>
                                                
                                                
                                                
                                              <div id="respuesta1" name="respuesta1">
                                                
                                                  <!--aqui va la priemra respuesta-->
                                                   <li class="list-group-item-danger text-center list-group-item">Primero seleccione un producto!</li>
                                              <br>
                                              
                                              </div>  
                                              
                                             <div id="respuesta2" name="respuesta2">
                                                 
                                                  <select style='display:none' id='verif' name='verif'><option value='1'>1</option></select> 
                                                  </div>   

                                       <hr>
                                           <center> <button class="btn btn-primary" id="btnAgregar" onclick="AgregarProducto()">Agregar</button></center>  
                                                
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    
     
                                    <div class="col-md-8">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Productos Agregados</h5>
                                               <div class="col-lg-12">
                                
                                
                                <div id="respuesta3" name="respuesta3">
                                
                               
                                
                                </div>
                                
                                
                                                   <div id="respuesta5">
                                           <div class="main-card mb-3 card">
                                    <div class="card-body">            
                                         <table class="mb-0 table table-striped">
    
    <tr>
        
        <th>Código de Producto</th> 
        <th>Descripcion</th> 
        <th>Nombre</th> 
        <th>Fecha de salida</th> 
        <th>Cantidad Inicial</th> 
        <th>Salida</th>
        <th>Stock Final</th> 
        
      
        
        
        
    </tr>
 
  <?php while($row = mysqli_fetch_array($mostrar)) { ?>
    <tr>
       
        <td><?php echo $row['cod_prod']; ?></td> 
        <td><?php echo utf8_encode($row['descripcion']); ?></td> 
        <td><?php echo utf8_encode($row['nom_emp']); ?></td> 
         <td><?php echo $row['fecha_salida']; ?></td> 
        <td><?php echo $row['cantidad_inicial']; ?></td> 
         <td><?php echo $row['Salida']; ?></td>   
         <td><?php echo $row['Stock Total']; ?></td>
       
        
    </tr>
    <?php } ?>   
    </table>              
     </div>
                                
       </div>                                                  
                                                       
                                                   </div>
                                <hr>
                               
                                
                                
                            </div>
                                                <hr>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    
                    
                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                          
                          
                          
                          
                            
                        </div>
                    </div>    </div>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>

</body>

</html>

<?php } ?>