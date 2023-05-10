<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "homepage";
    $con = mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse a la base de datos");

    $sql = "INSERT INTO usuarios (nombre, correo, telefono, asunto, mensaje) 
    VALUES('".$_POST["fullname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["affair"]."','".$_POST["message"]."')";

    $resultado = mysqli_query($con, $sql) or die("Error al insertar los datos");

    echo "Datos insertados correctamente";
    mysqli_close($con);
    header("Location: index.html");

?>
