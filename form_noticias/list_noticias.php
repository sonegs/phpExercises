<div id="cuerpo">
	<h1 class = "title">Noticias</h1>
		<table border=1>
			<tr>
				<th>Titulo</th>
				<th>Contenido</th>
				<th>Autor</th>
				<th>Hora de creación</th>
				<th>Likes</th>
				<th>Editar</th>
				<th>Eliminar</th>
				<th>I like it!</th>
				
			</tr>


			<?php
    
                include "BBDD/consultas/funciones_bd.php";
                        
                mostrarNoticias();
			?>

</div>