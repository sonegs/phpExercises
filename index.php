<?php
require "BBDD/conexion.php";

// inicio de sesion


?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>PAC DESARROLLO</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	</head>
	<body>	


			<?php
				

				session_start();
				if(isset($_SESSION['usuario'])): 

						include "cabecera.php";

						if (isset($_GET['op'])){
							
						switch ( $_GET['op'] ) {

							case '0':
								include "cuerpo.php";
								break;
							case '1':
								include "form_usuarios/index_u.php";
								break;
							case '2':
								include "form_noticias/index_n.php";
								break;
							case '3':
								include "form_usuarios/insertar_u.php";
								break;
							case '4':
								include "form_noticias/insertar_n.php";
								break;
							default:
								include "cuerpo.php";
								break;
								
						}

						}


						elseif (isset($_GET['us'])){
							
							include "form_usuarios/cab_usuarios.php";

							switch ( $_GET['us'] ) {

								case '0':
								include "form_usuarios/list_usuarios.php";
									break;
								case '1':
								include "form_usuarios/insertar_u.php";
									break;
								case '2':
								include "form_usuarios/editar_u.php";
									break;
								case '3':
								include "form_usuarios/eliminar_u.php";
									break;
								default:
								include "form_usuarios/list_usuarios.php";
									break;
									
							}

						}

						elseif (isset($_GET['no'])){
							
							include "form_noticias/cab_noticias.php";

							switch ( $_GET['no'] ) {

								case '0':
								include "form_noticias/list_noticias.php";
									break;
								case '1':
								include "form_noticias/insertar_n.php";
									break;
								case '2':
								include "form_noticias/editar_n.php";
									break;
								case '3':
								include "form_noticias/eliminar_n.php";
									break;
								
									
							}

						}
						else {
							include "cuerpo.php";
						} 


					
					endif; 
					include "BBDD/consultas/funciones_db.php";
					
						if(!isset($_SESSION['usuario'])): ?>


						<div class="form">
								<h2>Login</h2>
								<form action="login.php" method="POST" name="form_usuario">
									<label for="email">Email</label>
									<input type="email" name="email" value="" required><br><br>
									<label for="contrasena">Contraseña</label>
									<input type="password" name="contrasena" value ="" required><br><br>
									<input type="submit" name="submit" value="Conectar" class="input_form">
									<input type="reset" name="reset" value="Cancelar" class="input_form">
								</form>
						</div>

						<?php

					endif; 
					?>

			<footer>
				<p class="autor">Práctica realizada por Miguel Cobo Martínez</p>
			</footer>
			
			
			
	</body>
</html>

				