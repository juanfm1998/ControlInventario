<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<link rel="stylesheet" href="css/css-principal.css">


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Crea tu Cuenta</h1>
			
			<br>
			<input  type="text" placeholder="Nombre" />
			<input type="text" placeholder="Apellidos" />
			<input type="text" placeholder="Celular" />
			<input type="email" placeholder="Correo" />
			<input type="password" placeholder="Contraseña" />
			<p><input type="checkbox" /><label style="font-size:10px"> Acepto los </label><a style="font-size:10px;color:blue" href="#">Terminos</a> <label style="font-size:10px">y </label><a style="font-size:10px;color:blue" href="#">Condiciones</a>.</p>
			<button id="prueba">Registrar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="controladores/validacion.php" method="POST">
			<h1>Inicia Sesión</h1>
			
			<br>
			<input id="txtemail" name="txtemail" type="email" placeholder="Correo" required />
			<input type="password" placeholder="Contraseña" id="txtpass" name="txtpass" required />
			<a href="#">No recuerdas tu contraseña?</a>
			
			<button type="submit" id="enviar" name="enviar">Iniciar</button>
			<br>
			
<?php			
			if(isset($_GET["error"])) { ?>
           
				 <div id="alert" role='alert' style="color:red"> 
				 Usuario o Contraseña Incorrectos!!</div>
<?php
			}

 

		 ?>
			
			
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenid@</h1>
				<p>Para mantenerse en contacto con nosotros, inicie sesión con su información personal.</p>
				<button class="ghost" id="signIn">Iniciar Session</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hola!</h1>
				<p>Bienvenido al panel de administración de [Empresa]</p>
				<!--<button class="ghost" id="signUp">Registrate</button>-->
			</div>
		</div>
	</div>
</div>

<footer>
	
</footer>

<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>