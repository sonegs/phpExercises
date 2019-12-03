<?php

// Parametros de conexión

$host = "localhost"; // Este es el servidor local o localhost instalado en MAMP
$bd = "M07"; // nombre de la base de datos
$user = "root"; // usuario que tiene acceso
$pass = ""; // la constraseña de mi BBDD, ubicada en MAMP/bin/phpmyadmin/config.inc.php

// Conexión a nuestro Sistema Gestor de Base de Datos (MySQL)

$con = new mysqli($host, $user, $pass);


if (mysqli_connect_errno()) { // este if controla los errores en el mysqli_connect

    echo "Connection failed: ".$con->connect_error;
    echo "La conexión ha fallado";
    exit();

}
// Conexión a nuestra base de datos
mysqli_select_db($con, $bd) or die("<h1>Error en la conexión a la base de datos</h1>"); 


// Esto hace que la conexión devuelva los datos con caracteres en español (acentos, tildes, etc)
mysqli_set_charset($con, "UTF8");

// Hacemos las consultas a la BBDD

// Ejercicio 3
// Consulta SELECT para que aparezcan los datos de la tabla noticias

$ejercicio3 = "SELECT titulo, contenido, autor, hora_creacion, likes FROM Noticias ORDER BY Hora_creacion LIMIT 5";



?>