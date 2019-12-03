<div class="cuerpo">
	<h1 class = "title">Noticias</h1>
		<table border=1>
			<tr>
				<th>Titulo</th>
				<th>Contenido</th>
				<th>Autor</th>
				<th>Hora de creación</th>
				<th>Likes</th>
				
			</tr>

			<?php
	
			include "BBDD/conexion.php"; // conexión a la BBDD

			// Obtener el resultado en memoria

			$resultEjercicio3 = mysqli_query($con, $ejercicio3);

			while ($fila = mysqli_fetch_row($resultEjercicio3)) {
			
?>
			<tr>
				<td><?php echo $fila[0] ?></td>
				<td><?php echo $fila[1] ?></td>
				<td><?php echo $fila[2] ?></td>
				<td><?php echo $fila[3] ?></td>
				<td><?php echo $fila[4] ?></td>
			</tr>

			<?php
		}
		?>
			</table>
			<?php 

		
		

		