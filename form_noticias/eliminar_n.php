<div class="form">
        <h2 class = "title">Eliminar noticia</h2>
        <form action="#" method="POST" name="form_usuario">
            <h5>Título</h5><input type="text" name="titulo" value="" class="input_form" required><br><br>
            <h5>Autor</h5><input type="text" name="autor" value="" class="input_form" required><br><br>
            <input type="submit" name="submit" value="Enviar" class="input_form">
            <input type="reset" name="reset" value="Cancelar" class="input_form">


            <?php
            
              if(isset($_POST['submit'])){

                include "BBDD/consultas/funciones_bd.php";
                
                eliminarNoticias('titulo', 'autor');
                
              }
              ?>

        </form>
    </div>



