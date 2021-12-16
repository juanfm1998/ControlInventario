
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

   