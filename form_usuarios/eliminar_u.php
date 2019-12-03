
    <div class="form">
        <h2 class = "title">Eliminar usuario</h2>
        <form action="#" method="POST" name="form_usuario">
            <h5>Nombre</h5><input type="text" name="nombre" value="" class="input_form" required><br><br>
            <h5>Contraseña</h5><input type="password" name="contrasena" value="" class="input_form" required><br><br>
            <input type="submit" name="submit" value="Eliminar" class="input_form">
            <input type="reset" name="reset" value="Cancelar" class="input_form">


            <?php
              if(isset($_POST['submit'])){

                include "BBDD/consultas/funciones_bd.php";
                
                eliminarUsuarios('nombre', 'contrasena');
                
              } 
              ?>

        </form>
    </div>



