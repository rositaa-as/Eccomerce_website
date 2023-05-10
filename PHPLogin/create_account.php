<?php

$contra = $_POST["contra"];
$confirmPass = $_POST["confirmPass"];
$nombre = $_POST["nombre"];
$username = $_POST["username"];
$email = $_POST["email"];
if(($nombre =="")||($email=="")||($contra=="")||($confirmPass=="")||($username==""))
{
    echo "<script> alert('Debe rellenar todos los campos');window.history.go(-1);</script>";
}
else
{
    if($contra != $confirmPass)
    {
        echo "<script> alert('Las contraseñas no coinciden');window.history.go(-1);</script>";
    }
    else
    {
        $server = "localhost";
        $user = "root";
        $pass="";
        $db="tienda";
        $con = mysqli_connect($server,$user,$pass,$db) or die("Error al conectarse a la base de datos");

        $sql = "SELECT correo, clave FROM user WHERE correo = '$email' OR clave = '$contra'";
        $resultado = mysqli_query($con,$sql);
        if(mysqli_num_rows($resultado)>0)
        {
            echo "<script>alert('Ya existe un correo o ID');window.history.go(-1);</script>";

        }
        else
        {
            $sql = "INSERT INTO user(nombre,correo,clave,username) VALUES('$nombre','$email','$contra','$username')";
            mysqli_query($con,$sql);
            echo "<script>alert('Usuario registrado correctamente');window.history.go(-2);</script>";

        }
        mysqli_close($con);
    }
}


