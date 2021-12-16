<?php

$fecha=$_POST['fecha_filtro']

$busqueda = "SELECT p.id_prod,p.cod_prod,p.descripcion,e.nom_emp,s.fecha_salida,s.id_salida,s.cantidad_inicial,s.salida as 'Salida',s.stock_final as 'Stock Total' from productos p INNER JOIN salidas s on(s.cod_prod=p.cod_prod) INNER JOIN empleados e on(s.id_emp=e.id_emp) WHERE s.cod_prod=p.cod_prod AND MONTH(s.fecha_salida) = $fecha ORDER BY s.fecha_salida,s.id_salida asc 
LIMIT $inicio,$postPorPagina"

lo malo que esta parte se usacuando es date() tendria que cambiarlo a date 
asu ahora estoy saliendo a las 5:30 pm es 
voy a ir guardando dale 
entonces le cambio a date pero recuerda que con el cmpo de fecha que le pusimospone mal la fecha puede ser buscando que cuente 3 caracteres a la derecha y tome los dos numero algo haci creo 
uhm voy a verlo cuando llegue a casa Ahora voy a guardar dale  hguadalo en tu drive no te olvides xD ya bro hablamos mas tarde dale hablamos

?>