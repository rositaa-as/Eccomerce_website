<?php

    $nombreAlbum = $_POST['nombreAlbum'];
    $precio = $_POST['precio'];
    $precioOriginal = $_POST['precioOriginal'];
    $badge = $_POST['badge'];
    $categoria = $_POST['categoria'];
    $rating = $_POST['rating'];
//    $banda = $_POST['banda'];
    if(($nombreAlbum == "") || ($precio == "") || ($precioOriginal == "") || ($badge == "") || ($categoria == "") || ($rating == ""))
    {
        echo "Por favor llene todos los campos";
        exit();
    }
    else
    {
        if(isset($_REQUEST['guardar']))
        {
            if(isset($_FILES['foto']['name']))
            {
                $tipoArchivo = $_FILES['foto']['type'];
                $permitido = array("image/jpg", "image/jpeg", "image/png");

                if((in_array($tipoArchivo, $permitido) == false))
                {
                    die("Error: El archivo no es una imagen o le falto rellenar un campo");
                }

                $nombreArchivo = $_FILES['foto']['name'];
                $tamanoArchivo = $_FILES['foto']['size'];
                $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);
                //variables para la conexion
                $server = "localhost";
                $pass = "";
                $user = "root";
                $db = "tienda";
                //conexion
                $con = mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse a la base de datos");
                $binariosImagen = mysqli_escape_string($con, $binariosImagen);

                $sql = "INSERT INTO productos(nombre, tipo,Img,precio,precioOriginal,badge,categoria,rating) VALUES
                                              ('".$nombreAlbum."','".$tipoArchivo."','".$binariosImagen."','".$precio."','".$precioOriginal."','".$badge."','".$categoria."','".$rating."')";
                $resultado = mysqli_query($con, $sql);

                if($resultado)
                {
                    echo"<section class='albumes'>
                    <div class='heading'>
                        <span>Tu lista de albumes</span>
                    </div>";
                    $query = "SELECT nombre, Img FROM productos";
                    $res = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($res))
                    {
                        echo"     
                            <div class='album-container'>
                                <div class='box'>
                                    <div class='box-img'>
                                        <img src='data:image/jpg;base64,".base64_encode($row['Img'])."' alt=''>
                                        <h2>".$row['nombre']."</h2>
                                       
                                    </div>
                                </div>
                            </div>
                        </section>";
                    }

                    echo "<style>
                           *{
                                padding: 0;
                                margin: 0;
                                box-sizing: border-box;
                                font-family: 'Poppins', sans-serif;
                                scroll-behavior: smooth;
                                list-style: none;
                                text-decoration: none;
                            }
                            :root
                            {
                                --main-color: #ff702a;
                                --text-color: #fff;
                                --bg-color: #1e1c2a;
                                --big-font: 5rem;
                                --h2-font: 2.25rem;
                                --p-font: 0.9rem;
                            }
                            *::selection
                            {
                                background: var(--main-color);
                                color: #fff;
                            }
                            body
                            {
                                color: var(--text-color);
                                background: var(--bg-color);
                            }
                          .heading
                            {
                                text-align: center;
                                margin-bottom: 2rem;
                            }
                            .heading span
                            {
                                color: var(--main-color);
                                font-weight: 600;
                            }
                            .heading h2
                            {
                                font-size: var(--h2-font);
                            }
                            .album-container
                            {
//                                display: grid;
//                                grid-template-columns: repeat(4, minmax(220px, auto));
//                                grid-gap: 1.5rem;
//                                align-items: center;
                                  display: flex;
                                  flex-wrap: wrap;
                                  justify-content: center;
                                  align-items: center;
                            }
                            .box
                            {
                                position: relative;
                                margin-top: 4rem;
                                height: auto;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                background: #feeee7;
                                padding: 20px;
                                border-radius: 0.5rem;
                            }
                            .box-img
                            {
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                border-radius: 20px;
                            }
                            .box h2
                            {
                                font-size: 1.3rem;
                                color: var(--bg-color);
                            }
                            .box h3
                            {
                                font-size: 1rem;
                                color: var(--bg-color);
                                font-weight: 400;
                                margin: 4px 0 10px;
                            }

                        </style>";
                }
                else
                {
                    echo "Error al guardar la imagen";
                }
            }
        }
    }


