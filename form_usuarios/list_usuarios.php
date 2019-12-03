<div id="cuerpo">
	<h1 class = "title">Usuarios</h1>
		<table border=1>
			<tr>
				<th>Nombre</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th>Edad</th>
				<th>Fecha de nacimiento</th>
				<th>Dirección</th>
				<th>CP</th>
				<th>Provincia</th>
				<th>Género</th>
				<th>Editar</th>
				<th>Eliminar</th>
				
			</tr>

			<?php
    
                include "BBDD/consultas/funciones_bd.php";
                        
                mostrarUsuarios();
			?>
</table>
</div>