<?php
$server = "localhost";
$pass = "";
$user = "root";
$db = "tienda";
//conexion
$con = mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse a la base de datos");
$imagen = 'C:/xampp/htdocs/puntodeVenta/archivo_prueba/IMGmain/b11-2.png';
$tipoArchivo = mime_content_type($imagen);
$permitido = array("image/jpg", "image/jpeg", "image/png");

if((in_array($tipoArchivo, $permitido) == false))
{
    die("Error: El archivo no es una imagen o le falto rellenar un campo");
}
$contenido = file_get_contents($imagen);
$contenido_binario = mysqli_real_escape_string($con, $contenido);
$sql = "UPDATE productos SET Img2 = '$contenido_binario', tipoimg2 = '$tipoArchivo' WHERE id = 27";
mysqli_query($con, $sql);
