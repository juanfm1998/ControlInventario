
	<?php


	if(isset($_POST["enviar"])) {

 	include_once("init.php");

 

		$usuario=$_POST['txtemail'];
        $pass=$_POST['txtpass'];

 

			$consulta = "SELECT * FROM usuarios WHERE correo_usu='$usuario' AND contrasena_usu='$pass'";

 

			if($resultado = $mysqli->query($consulta)) {

				while($row = $resultado->fetch_array()) {

 
					$userok = $row["correo_usu"];

					$passok = $row["contrasena_usu"];
					
		$cod=$row['id_usu'];
		$nom=$row['nombre_usu'];
		$ape=$row['apellido_usu'];
		$corr=$row['correo_usu'];
		$cel=$row['celular_usu'];
		$tip_p=$row['tipo_plan_usu'];
	

				}

				

			}

		
			if(isset($usuario) && isset($pass)) {

 

				if($usuario == $userok && $pass == $passok) {

 

					session_start();

					
					
		
		
	$_SESSION['logueado'] = TRUE;	
	$_SESSION['cod']=$cod;
	$_SESSION['nom']=$nom;
	$_SESSION['ape']=$ape;
	$_SESSION['cor']=$corr;
	$_SESSION['cel']=$cel;
	$_SESSION['tp']=$tip_p;
	
	$_SESSION['contr']=$passok;
		
	
	$resultado->close();
	$mysqli->close();	
		

				header('Location: http://localhost/ControlInventario/desboard/index.php');

 

				}

				else {

					header("Location: http://localhost/ControlInventario/index.php?error=login?us=$userok");

				}

 

			}

 

		} else {

			header("Location: /");

		}

 

 ?>
	
	
	
	