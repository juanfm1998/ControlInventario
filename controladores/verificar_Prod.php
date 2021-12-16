 
 <?php 
//require_once 'init.php';

$producto = $_POST['producto'];



if($producto=="01"){


    
echo " 


<div class='row'>

 
 <div class='col-md-6 mb-6'>
   <label for='validationTooltip01'>Tipo</label>
 <Select class='form-control' id='SelectProdCate' name='SelectProdCate'>
 <option value='CL001'>Clips</option>
 <option value='CL002'>Mariposa 65mm</option>
 <option value='CL003'>Mariposa 45mm</option>
 <option value='CL004'>Binder 1 pulg</option>
 <option value='CL005'>Binder 1 1/4 pulg</option>
 <option value='CL006'>Binder 1 5/8 pulg</option>
 <option value='CL007'>Binder 2 pulg</option>
 
 </Select>
 </div>
 
 <div class='col-md-6 mb-6 position-relative form-group' >
   <label for='validationTooltip01'>Cantidad (Unidades)</label>
 <input type='number' class='form-control' id='cantidad' require >

 </div>
  </div>
  
  <select style='display:none' id='verif' name='verif'><option value='1'>1</option></select>  

 "
 
 
 ;
     	
}
else if($producto=="02"){
    
    
  echo " 


<div class='row'>

 
 <div class='col-md-6 mb-6'>
   <label for='validationTooltip01'>Tipo</label>
 <Select class='form-control' id='SelectProdCate' name='SelectProdCate' onchange='selectCate();'>
 <option value='a00' disabled='disabled' selected='selected'>Seleccione..</option>
 <option value='AR001'>Archivador</option>
 <option value='BO002'>Borrador</option>
 <option value='CA001'>Cartulina duplex</option>
 <option value='CAL001'>Calculadora</option>
 <option value='CN001'>Cinta de embalaje</option>
 <option value='CN002'>Cinta Scotch Pegafan</option>
 <option value='CO001'>Corrector</option>
 <option value='CU401'>Cuaderno</option>
 <option value='EN001'>Engrapador</option>
 <option value='a025'>Folder</option>
 <option value='GO001'>Goma Liquida</option>
 <option value='H001'>Huellero</option>
 <option value='LA001'>Lapiz</option>
 <option value='LP001'>Lapicero Azul</option>
 <option value='LP003'>Lapicero Rojo</option>
 <option value='LP002'>Lapicero Negro</option>
 <option value='LI001'>Limpiatipos Artesco</option>
 <option value='MA001'>Masking Pegafan</option>
 <option value='MC001'>Mica A4</option>
 <option value='PA002'>Papel Bond A4</option>
 <option value='a012'>Plumón</option>
 <option value='PP001'>Plumón de pizarra</option>
 <option value='PO002'>Porta CD</option>
 <option value='PO001'>Porta clip Artesco</option>
 <option value='BA001'>Post it</option>
 <option value='PE001'>Perforador</option>
 <option value='RE001'>Resaltador</option>
 <option value='RE002'>Regla</option>
 <option value='SA001'>Sacagrapa</option>
 <option value='a024'>Sobres</option>
 <option value='TAB01'>Tablero Plastico Oficio</option>
 <option value='TA001'>Tajador</option>
 <option value='TI001'>Tijera</option>
 
 
 
 </Select>
 </div>
 
  
  
  
 <div class='col-md-6 mb-6 position-relative form-group' >
   <label for='validationTooltip01'>Cantidad (Unidades)</label>
 <input type='number' class='form-control' id='cantidad' require >

 </div>
 
 
 </div>

  
 "  
   ; 
    
    
    
}

else if($producto=="03"){
    echo "
    

<div class='row'>

 
 <div class='col-md-6 mb-6'>
   <label for='validationTooltip01'>Tipo</label>
 <Select class='form-control' id='SelectProdCate' name='SelectProdCate' require>
 <option value='FA001'>Faster</option>

 
 
 </Select>
 </div>
 
 <div class='col-md-6 mb-6 position-relative form-group' >
   <label for='validationTooltip01'>Cantidad (Unidades)</label>
 <input type='number' class='form-control' name='cantidad' id='cantidad' require >

 </div>
  </div>    
    
    
 <select style='display:none' id='verif' name='verif'><option value='1'>1</option></select>   
    
    ";
    
}


else if($producto=="04"){
    echo "
    

<div class='row'>

 
 <div class='col-md-6 mb-6'>
   <label for='validationTooltip01'>Tipo</label>
 <Select class='form-control' id='SelectProdCate' name='SelectProdCate' require>
 
 <option value='BO001'>Bolsa Blanca 21x24</option>
 <option value='BO002'>Bolsa Politileno 21x41x5</option>
 <option value='BO003'>Bolsa Transparente</option>
 
 
 </Select>
 </div>
 
 <div class='col-md-6 mb-6 position-relative form-group' >
   <label for='validationTooltip01'>Cantidad (Unidades)</label>
 <input type='number' class='form-control' id='cantidad' require >

 </div>
  </div>    
    
    
  <select style='display:none' id='verif' name='verif'><option value='1'>1</option></select>  
    
    ";
    
}




else if($producto=="05"){
    echo "
    

<div class='row'>

 
 <div class='col-md-6 mb-6'>
   <label for='validationTooltip01'>Tipo</label>
 <Select class='form-control' id='SelectProdCate' name='SelectProdCate' require>
 <option value='PL001'>Papel Lustre</option>
 
 
 
 </Select>
 </div>
 
 <div class='col-md-6 mb-6 position-relative form-group' >
   <label for='validationTooltip01'>Cantidad (Unidades)</label>
 <input type='number' class='form-control' id='cantidad' require >

 </div>
  </div>    
    
 <select style='display:none' id='verif' name='verif'><option value='1'>1</option></select>     

    
    ";
    
}



else if($producto=="06"){
    echo "
    

<div class='row'>

 
 <div class='col-md-6 mb-6'>
   <label for='validationTooltip01'>Tipo</label>
 <Select class='form-control' id='SelectProdCate' name='SelectProdCate' require>
 <option value='GR002'>Grapas 26/6 A4</option>
 <option value='GR001'>Grapas 23/10 oficio</option>

 
 
 </Select>
 </div>
 
 <div class='col-md-6 mb-6 position-relative form-group' >
   <label for='validationTooltip01'>Cantidad (Cartuchos)</label>
 <input type='number' class='form-control' id='cantidad' require >

 </div>
  </div>    
    
 <select style='display:none' id='verif' name='verif'><option value='1'>1</option></select>     
 
    
    ";
    
}



else if($producto=="07"){
    echo "
    

<div class='row'>

 
 <div class='col-md-6 mb-6'>
   <label for='validationTooltip01'>Tipo</label>
 <Select class='form-control' id='SelectProdCate' name='SelectProdCate' require>
 <option value='CU002'>Cuchilla 18mm</option>
 
 
 
 </Select>
 </div>
 
 <div class='col-md-6 mb-6 position-relative form-group' >
   <label for='validationTooltip01'>Cantidad (Unidades)</label>
 <input type='number' class='form-control' id='cantidad' require >

 </div>
 
 
  </div>    
    
    
 <select style='display:none' id='verif' name='verif'><option value='1'>1</option></select> 
    
    ";
    
}


else if($producto=="08"){
  echo "
  <div class='row'>

 
  <div class='col-md-6 mb-6'>
    <label for='validationTooltip01'>Tipo</label>
  <Select class='form-control' id='SelectProdCate' name='SelectProdCate' require>
  <option value='PF001'>Papel Film</option>
 
  
  
  </Select>
  </div>
  
  <div class='col-md-6 mb-6 position-relative form-group' >
    <label for='validationTooltip01'>Cantidad (Unidades)</label>
  <input type='number' class='form-control' name='cantidad' id='cantidad' require >
 
  </div>
   </div>    
     
     
  <select style='display:none' id='verif' name='verif'><option value='1'>1</option></select>   
     
     ";
}

;




?>