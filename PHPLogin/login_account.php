<?php
$correoUsername = $_POST['emailL'];
$contra = $_POST['contraL'];
if(($correoUsername=="")||($contra==""))
{
    echo "<script>alert('rellene todos los campos');window.history.go(-1);</script>";
}
else
{
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "tienda";
    $con = mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse a la base de datos");
    $sql = "SELECT id, correo, username, clave FROM user WHERE correo='$correoUsername' OR username='$correoUsername'";
    $resultado = mysqli_query($con,$sql);
    if(mysqli_num_rows($resultado)>0)
    {
        $fila = mysqli_fetch_assoc($resultado);
        $claveDB = $fila['clave'];
        if(password_verify($contra,$claveDB))
        {
            header('Location: index.php');
        }
        else
        {
            echo "<script>alert('La contraseña ingresada es incorrecta. Inténtalo de nuevo.');window.history.go(-1);</script>";
        }
    }
    else
    {
        echo "<script>alert('El correo o usuario no existe en la base de datos');window.history.go(-1);</script>";
    }
}