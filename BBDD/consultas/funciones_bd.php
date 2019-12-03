<?php

/*

***************************************************************************
************************ FUNCIONES DE LOS USUARIOS ************************
***************************************************************************

*/



// MOSTRAR USUARIOS

function mostrarUsuarios() {

    include "BBDD/conexion.php";
    
    $ejercicio6 = "SELECT Nombre, Contrasena, Email, Edad, Fecha_nac, Direccion, CP, Provincia, Genero FROM Usuarios";
    
    $resultEjercicio6 = mysqli_query($con, $ejercicio6);
    while ($fila = mysqli_fetch_row($resultEjercicio6)) {
			
        ?>
                    <tr>
                        <td><?php echo $fila[0] ?></td>
                        <td><?php echo $fila[1] ?></td>
                        <td><?php echo $fila[2] ?></td>
                        <td><?php echo $fila[3] ?></td>
                        <td><?php echo $fila[4] ?></td>
                        <td><?php echo $fila[5] ?></td>
                        <td><?php echo $fila[6] ?></td>
                        <td><?php echo $fila[7] ?></td>
                        <td><?php echo $fila[8] ?></td>
                        <td><button onclick = "window.location.assign('index.php?us=%202')" id="edit">Editar</button></td>
                        <td><button onclick = "window.location.assign('index.php?us=%203')" id="rmeove">Eliminar</button></td>
                    </tr>
        
                    <?php
                }
                
    
    if (mysqli_query($con, $ejercicio6)) {

    } else{

        echo "<h1>Se ha producido un error en la consulta</h1>";

    }

}

// INSERTAR USUARIOS

function insertarDatosUsuarios() { // le pasamos los valores necesarios para insertar un registro

    include "BBDD/conexion.php";
    
    // Recogemos los valores del formulario de registro

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $edad = isset($_POST['edad']) ? $_POST['edad'] : false;
    $fecha_nac = isset($_POST['fecha_nac']) ? $_POST['fecha_nac'] : false;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
    $cp = isset($_POST['cp']) ? $_POST['cp'] : false;
    $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
    $genero = isset($_POST['genero']) ? $_POST['genero'] : false;
    
    // Validamos la información antes de insertarla

    $errores = array();

    if ($nombre && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El campo nombre es inválido";
    }
    if (!empty($contrasena)) {
        $contrasena_validado = true;
    } else {
        $contrasena_validado = false;
        $errores['contrasena'] = "El campo contraseña está vacía";
    }
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['Email'] = "El campo email es inválido";
    }

    $guardar_usuario = false;
    if(count($errores) == 0) {
        $guardar_usuario = true;
        $contrasena_segura = password_hash($contrasena, PASSWORD_BCRYPT, ['opciones' => 4]);
    } else {
        echo "<h5>Hay algun error en los datos rellenados. Por favor, compruebe que se han introducido correctamente</h5>";
    }

    $query = "INSERT INTO Usuarios (Nombre, Contrasena, Email, Edad, Fecha_nac, Direccion, CP, Provincia, Genero) VALUES ('$nombre','$contrasena_segura','$email','$edad','$fecha_nac','$direccion','$cp','$provincia','$genero');";    


    if (mysqli_query($con, $query)) {

        echo "<h1>Se ha introducido correctamente</h1>";

    } else{

        echo "<h1>Se ha producido un error en la consulta</h1>";

    }
    $con -> close();

}

// MOSTRAR ERRORES

function mostrarErrores($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta-error'>.$errores[$campo].</div>";
    }
}

// ELIMINAR USUARIOS

function eliminarUsuarios($nombre, $contrasena) { // hay que pasarle variables de verificación para identificar el usuario que vamos a eliminar

    include "BBDD/conexion.php";
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    
    $query= "DELETE FROM usuarios WHERE Nombre = '$nombre' AND Contrasena = '$contrasena'";
    
    if (mysqli_query($con, $query)) {

        echo "<h1>Se ha eliminado correctamente</h1>";

    } else{

            echo "<h1>Se ha producido un error, ¿ha introducido los datos correctamente?</h1>";


    }
    $con -> close();

}


// EDITAR USUARIOS

function editarUsuarios($nombre, $contrasena, $email, $edad, $fecha_nac, $direccion, $cp, $provincia, $genero) { // hay que pasarle las variables nombre y contraseña para identificar al usuario que vamos a eliminar

    include "BBDD/conexion.php";
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $fecha_nac = $_POST['fecha_nac'];
    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $provincia = $_POST['provincia'];
    $genero = $_POST['genero'];


    $query= "UPDATE usuarios SET email = '$email', edad = '$edad', fecha_nac = '$fecha_nac', direccion = '$direccion', cp = '$cp', provincia = '$provincia', genero = '$genero' WHERE Nombre = '$nombre' AND Contrasena = '$contrasena'";
    
        if (mysqli_query($con, $query)) {
            
                echo "<h1>Se ha introducido correctamente</h1>";
            
    
        } else{
            
            echo "<h1>Se ha producido un error en la consulta, ¿ha introducido los datos correctamente?</h1>";
    
        }
        $con -> close();

}

/*

***************************************************************************
************************ FUNCIONES DE LAS NOTICIAS **************************
***************************************************************************

*/

// MOSTRAR NOTICIAS

function cookies(){
    
    include "BBDD/conexion.php";
    $prueba = "No he conseguido acabar la parte de los likes";
    
    echo $prueba;
    /*
    setcookie("cookies", 0);
    $cookie = $_COOKIE["cookies"];
    $printcookie = $cookie + 1;
    echo $printcookie;
    
    $query= "UPDATE noticias SET likes = '$printcookie' WHERE id = '$id'";

    if (mysqli_query($con, $query)) {

        echo "<h1>Se ha introducido correctamente</h1>";

    } else{
        
        echo "<h1>Se ha producido un error en la consulta, ¿ha introducido los datos correctamente?</h1>";

    }
    $con -> close();
*/

}

function mostrarNoticias() {

    include "BBDD/conexion.php";
    
    $ejercicio7 = "SELECT id, titulo, contenido, autor, hora_creacion, likes FROM Noticias";
    $contador = 0;
    $consultaLikes = "SELECT likes FROM Noticias";
    $resultEjercicio7 = mysqli_query($con, $ejercicio7);
    while ($fila = mysqli_fetch_row($resultEjercicio7)) {
			
        ?>
                    <tr>
                        <td><?php echo $fila[1] ?></td>
                        <td><?php echo $fila[2] ?></td>
                        <td><?php echo $fila[3] ?></td>
                        <td><?php echo $fila[4] ?></td>
                        <td id="likes"><?php echo $fila[5] ?></td>
                        <td><button onclick = "window.location.assign('index.php?no=%202')" id="edit">Editar</button></td>
                        <td><button onclick = "window.location.assign('index.php?no=%203')" id="remove">Eliminar</button></td>
                        <td><button onclick = "contador()" id="likes">Me gusta</button></td>
                    
                </tr>
                    <?php
                }
                ?>

                    </table>
                    <script>
                        function contador(){
                            
                        }
                     </script>
                        
                    <?php
                
                /* CONTROL DE COOKIES

                if (isset($_COOKIE["likes"])){
                    
                    setcookie("likes", $_COOKIE["likes"] + 1);

                    echo $_COOKIE["likes"]."<br>"; // Imprime las valores de la cookie
                    

                } else {

                    setcookie("likes", 0); // Recoge las cookies, lo que almacena y el tiempo que va a estar almacenado 
                    
                }
                */
                

                // CONTROL DE ERRORES

                if (mysqli_query($con, $ejercicio7)) {

                } else{

                    echo "<h1>Se ha producido un error en la consulta</h1>";

                }

}



// INSERTAR NOTICIAS

function insertarDatosNoticias() { // le pasamos los valores necesarios para insertar las noticias

    include "BBDD/conexion.php";

    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $autor = $_POST['autor'];
    $hora = $_POST['hora'];
    $likes = $_POST['likes'];


    $query = "INSERT INTO Noticias (Titulo, Contenido, Autor, Hora_creacion, Likes) VALUES ('$titulo','$contenido','$autor', '$hora', '$likes');";    

    if (mysqli_query($con, $query)) {

        echo "<h1>Se ha introducido correctamente</h1>";

    } else{

        echo "<h1>Se ha producido un error en la consulta</h1>";

    }
    $con -> close();

}


// ELIMINAR NOTICIAS

function eliminarNoticias($titulo, $autor) { // hay que pasarle la variables titulo y autor para identificar la noticia a eliminar

    include "BBDD/conexion.php";
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    
    $query= "DELETE FROM noticias WHERE titulo = '$titulo' AND Autor = '$autor'";
    
    if (mysqli_query($con, $query)) {

        echo "<h1>Se ha eliminado correctamente</h1>";

    } else{

            echo "<h1>Se ha producido un error, ¿ha introducido los datos correctamente?</h1>";


    }
    $con -> close();

}


// EDITAR NOTICIAS

function editarNoticias($titulo, $contenido, $autor, $hora, $likes) { // hay que pasarle las variables titulo y autor para identificar la noticia que vamos a editar

    include "BBDD/conexion.php";

    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $autor = $_POST['autor'];
    $hora = $_POST['hora'];
    $likes = $_POST['likes'];

    $query= "UPDATE noticias SET contenido = '$contenido', hora_creacion = '$hora', likes = '$likes' WHERE titulo = '$titulo' AND autor = '$autor'";

        if (mysqli_query($con, $query)) {

            echo "<h1>Se ha introducido correctamente</h1>";
    
        } else{
            
            echo "<h1>Se ha producido un error en la consulta, ¿ha introducido los datos correctamente?</h1>";
    
        }
        $con -> close();

}
?>

