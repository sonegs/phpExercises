

<div class="form">
    <h2 class = "title">Editar usuario</h2>
        <form action="#" method="POST" name="form_editar">
            <h5>Nombre</h5><input type="text" name="nombre" maxlength="10" value="" class="input_form" required ><br><br>
            <h5>Contraseña</h5><input type="password" name="contrasena" value="" class="input_form" required><br><br>
            <h5>Email</h5><input type="email" name="email" value="" class="input_form" required><br><br>
            <h5>Edad</h5><input type="number" name="edad" value="" class="input_form" max="120"><br><br>
            <h5>Fecha de nacimiento</h5><input type="date" name="fecha_nac" value="" class="input_form"><br><br>
            <h5>Dirección</h5><input type="text" name="direccion" value="" class="input_form"><br><br>
            <h5>Código postal</h5><input type="number" name="cp" value="" class="input_form"><br><br>
            <h5>Provincia</h5><input type="text" name="provincia" value="" class="input_form"><br><br>
            <h5>Género</h5><input type="text" name="genero" value="" class="input_form"><br><br>
            <input type="submit" name="submit" value="Editar" class="input_form">
            <input type="reset" name="reset" value="Cancelar" class="input_form">


            <?php
                if(isset($_POST['submit'])){
                    include "BBDD/consultas/funciones_bd.php";
                    editarUsuarios('nombre', 'contrasena', 'email', 'edad', 'fecha_nac', 'direccion', 'cp', 'provincia', 'genero');
                } 
                
    
	?>

            </form>
    </div>
       

