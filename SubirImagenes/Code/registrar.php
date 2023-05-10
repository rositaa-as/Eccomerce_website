<?php
    $server = "localhost";
    $pass = "";
    $user = "root";
    $db = "homepage";

    $con = mysqli_connect($server,$user,$pass,$db) or die("Error al conectarse a la base de datos");
    //r3coger los valores de los inputs
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contrasenia = $_POST['contrasenia'];
    $username = $_POST['username'];
    if($nombre == "" || $correo == "" || $telefono == "" || $contrasenia == "" || $username == "")
    {
        echo "Por favor llene todos los campos";
        exit();
    }
    else
    {
        $sql = "INSERT INTO registros (nombre,correo, telefono, contrasenia, username) 
        VALUES('".$nombre."', '".$correo."', '".$telefono."','".$contrasenia."','".$username."')";

        $resultado = mysqli_query($con,$sql) or die("Error al insertar los datos");

        mysqli_close($con);
        header("Location: index.html");
    }

?>
