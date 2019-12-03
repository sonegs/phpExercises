
    <div class="form">
    <h1 class = "title">Insertar noticia</h1>
        <form action="#" method="POST" name="form_news">
            <h5>Título</h5><input type="text" name="titulo" value="" class="input_form"><br><br>
            <h5>Contenido</h5><input type="text" name="contenido" placeholder="Escriba el contenido aqui..." size="300" class="input_form"><br><br>
            <h5>Autor</h5><input type="text" name="autor" value="" class="input_form"><br><br>
            <h5>Hora actual</h5><input type="time" name="hora" value="" class="input_form"><br><br>
            <h5>Likes</h5><input type="number" name="likes" value="" class="input_form"><br><br>
            <input type="submit" name="submit" value="Enviar" class="input_form">
            <input type="reset" name="reset" value="Cancelar" class="input_form">


            <?php

                if(isset($_POST['submit'])){

                    include "BBDD/consultas/funciones_bd.php";
                    insertarDatosNoticias();
                            
                }

                ?>

        </form>
    </div>


    