<?php


	$menu = array(
		0 =>	'HOME',
		1 =>	'USUARIOS',
		2 =>	'NOTICIAS',
		3 =>	'CREAR USUARIO',
		4 =>	'CREAR NOTICIAS'
	);	
	?>

<header>


	<?php
		for($i = 0; $i < count($menu); $i++) { 
		?>

			<button onclick = "location.assign('index.php?op= <?php echo $i ?>');"  class='menu'>
		
			<?php echo "$menu[$i]"; ?>
		
			</button>
			
		<?php } ?>
		
		
</header>