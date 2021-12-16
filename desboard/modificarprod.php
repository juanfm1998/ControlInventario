<?php
    include ("../controladores/init.php");
    require_once("../config/parameters.php"); 

    $registros= mysqli_query($mysqli,"select id_prod,descripcion,cant_inicial from productos where id_prod='$_GET[id_producto]'");
    $fila= mysqli_fetch_array($registros);
    require_once("../config/parameters.php"); 

?>

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
                                       Salida de Productos
                                    </a>
                                </li>
                                 <li>
                                    <a href="<?=base_url?>desboard/entrada.php">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                       Entrada de Productos
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url?>desboard/listaproductos.php">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                       Listado de Productos
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
                                        <div class="page-title-subheading">Listado de productos
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    
                                    
                                </div>    </div>
                        </div>
                        
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Editar producto</h5>
                                               <div class="col-lg-12">
                                
                                
                                <div id="respuesta3" name="respuesta3">
                                
                               
                                
                                </div>
                                                   
                           <div class="card-body">
                                <h5 class="card-title">Editar Producto</h5>
                                <form class="needs-validation" method="POST" action="../controladores/modificarp.php">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="id_prod">Id Producto</label>
                                            <input type="text" class="form-control" id="id_prod" name="id_prod" value="<?php echo $fila['id_prod']; ?>" readonly="true">
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="nombre">Nombre del Producto</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo utf8_encode($fila['descripcion']); ?>">
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $fila['cant_inicial']; ?>">
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    <button class="btn btn-primary" type="submit">Editar producto</button>
                                </form>
            
                                <script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();
                                </script>
                            </div>
                        </div>