
<?php
$cate = $_POST['prodcate'];

 


// completar el verif




if($cate=="BO002" | $cate=="GO001" | $cate=="CN001" | $cate=="CN002" | $cate=="CO001" | $cate=="LA001" | $cate=="LP001" | $cate=="LP003" | $cate=="LP002" | $cate=="MC001" | $cate=="PE001" | $cate=="RE001" | $cate=="RE002" | $cate=="TA001" | $cate=="TI001" | $cate=="EN001" | $cate=="CAL001" | $cate=="SA001" | $cate=="H001" | $cate=="PO001" | $cate=="PA002" | $cate=="PO002" | $cate=="PO003" | $cate=="CA001" | $cate=="LI001" |  $cate=="MA001" | $cate=="TAB01"){

 
echo " 

<select style='display:none' id='verif' name='verif'><option value='1'>1</option></select> 
 
 "
 ;
     	
}



//si es archivador
if($cate=="AR001"){


    
echo " 


<div class='row'> 
 <div class='col-md-12 mb-12'>
   <label for='validationTooltip01'>Variante</label>
 <Select class='form-control' id='SelectProdCate2' name='SelectProdCate2'>
 <option value='AR001'>Archivador cartón oficio</option>
 <option value='AR002'>Archivador cartón 1/2 oficio</option>

 
 </Select>
 </div>
 
  <select style='display:none' id='verif' name='verif'><option value='2'>2</option></select> 
 
  </div>
 
 "
 
 
 ;
     	
}


if($cate=="CU401"){


    
echo " 



<div class='row'> 
 <div class='col-md-12 mb-12'>
   <label for='validationTooltip01'>Variante</label>
 <Select class='form-control' id='SelectProdCate2' name='SelectProdCate2'>
 <option value='CU401'>Cuaderno A4</option>
 <option value='CU001'>Cuaderno Chico</option>

 
 </Select>
 </div>
 
  <select style='display:none' id='verif' name='verif'><option value='2'>2</option></select> 
 
  </div> 
  
  
  
 
 "
 
 
 ;
     	
}

else if($cate=="a012"){


    
echo " 


 
 
<div class='row'> 
 <div class='col-md-12 mb-12'>
   <label for='validationTooltip01'>Variante</label>
 <Select class='form-control' id='SelectProdCate2' name='SelectProdCate2'>
 <option value='PD001'>Plumón delgado rojo</option>
 <option value='PG001'>Plumón grueso negro indeleble</option>
 <option value='PG002'>Plumón grueso rojo</option>
 <option value='PG003'>Plumón grueso azul</option>
 

 
 </Select>
 </div>
 
  <select style='display:none' id='verif' name='verif'><option value='2'>2</option></select> 
 
  </div> 
  
 
 
 
 
 "
 
 
 ;
     	
}



else if($cate=="BA001"){


    
echo " 




<div class='row'> 
 <div class='col-md-12 mb-12'>
   <label for='validationTooltip01'>Variante</label>
 <Select class='form-control' id='SelectProdCate2' name='SelectProdCate2'>
 <option value='BA001'>Banderitas (post-it)</option>
 <option value='NO002'>Notas Adhesivas 3x3 </option>
 <option value='NO003'>notas adhesivas 1 3/8 X 1 7/8</option>
 

 
 </Select>
 </div>
 
 
  <select style='display:none' id='verif' name='verif'><option value='2'>1</option></select> 
  </div> 



 
 "
 
 
 ;
     	
}

else if($cate=="a024"){


    
echo " 


 
<div class='row'> 
 <div class='col-md-12 mb-12'>
   <label for='validationTooltip01'>Variante</label>
 <Select class='form-control' id='SelectProdCate2' name='SelectProdCate2'>
 <option value='SO001'>Sobre extra oficio</option>
 <option value='SO002'>Sobre oficio</option>
 <option value='SO003'>Sobre 1/2 oficio</option>
 <option value='SO004'>Sobre A4</option>
 <option value='SO005'>Sobre de pago</option>
 

 
 </Select>
 </div>
 
 
 <select style='display:none' id='verif' name='verif'><option value='2'>1</option></select>  
  </div> 
  
 


 
 "
 
 
 ;
     	
}


else if($cate=="a025"){


    
echo " 

 

 
<div class='row'> 
 <div class='col-md-12 mb-12'>
   <label for='validationTooltip01'>Variante</label>
 <Select class='form-control' id='SelectProdCate2' name='SelectProdCate2'>
 <option value='FO001'>Folder manila oficio</option>
 <option value='FA401'>Folder manila A4</option>
 
 

 
 </Select>
 </div>
 
 
  <select style='display:none' id='verif' name='verif'><option value='2'>1</option></select> 
  </div>  
 
 
 
 
 "
 
 
 ;
     	
}


//else if($cate=="a027"){
//
//
//    
//echo " 
//
//  
//  
//  
//  
//<div class='row'> 
// <div class='col-md-12 mb-12'>
//   <label for='validationTooltip01'>Variante</label>
// <Select class='form-control' id='SelectProdCate2' name='SelectProdCate2'>
// <option value='PA002'>Papel bound A4</option>
// <option value='PA003'>Papel contact</option>
// <option value='PA004'>Papel bound arco iris</option>
// 
// 
//
// 
// </Select>
// </div>
// 
//  <select style='display:none' id='verif' name='verif'><option value='2'>1</option></select> 
// 
//  </div>    
//  
//  
//  
// 
// "
// 
// 
// ;
//     	
//}




?>