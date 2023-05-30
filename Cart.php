<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link rel='stylesheet' href='recursos/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='recursos/uicons-regular-straight.css'>

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="recursos/jsdelivir.css"/>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="Assets/CSS/styles.css" />
    <!--==============IMG Pestaña===============-->
    <link rel="icon" type="image/x-icon" href="/archivo_prueba/Assets/Img/Logo2.png">

    <title>Lista de deseos</title>
</head>
<body>
<!--=============== HEADER ===============-->
<header class="header">
    <div class="header__top">
        <div class="header__container container">
            <div class="header__contact">
                <span>(+52) 336-456-56785</span>

                <span>Localización</span>
            </div>

            <p class="header__alert-news">Rêve de Luxe</p>

            <a href="login-register.php" class="header__top-action">
                Log In / Sign Up
            </a>
        </div>
    </div>

    <nav class="nav container">
        <a href="Index.php" class="nav__logo">
            <img src="/archivo_prueba/Assets/Img/Logo2.png" alt="" class="nav__logo-img">
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="Index.php" class="nav__link ">Inicio</a>
                </li>

                <li class="nav__item">
                    <a href="Shop.php" class="nav__link active-link">Tienda</a>
                </li>

                <li class="nav__item">
                    <a href="Accounts.php" class="nav__link">Mi cuenta</a>
                </li>

                <li class="nav__item">
                    <a href="Compare.php" class="nav__link">Comparar</a>
                </li>

                <li class="nav__item">
                    <a href="login-register.php" class="nav__link">Login</a>
                </li>
            </ul>

            <div class="header__search">
                <input type="text" placeholder="Search for items..." class="form__input" id="searchInput">
                <button class="search__btn" id="searchButton">
                    <img src="Assets/ImgPrueba/search.png" alt="">
                </button>
            </div>
        </div>

        <div class="header__user-actions">
            <a href="wishlist.php" class="header__action-btn">
                <img src="Assets/ImgPrueba/icon-heart.svg" alt="">
                <span class="count">3</span>
            </a>

            <a href="Cart.php" class="header__action-btn">
                <img src="Assets/ImgPrueba/icon-cart.svg" alt="">
                <span class="count">3</span>
            </a>

        </div>
    </nav>
</header>


<!--=============== MAIN ===============-->
<main class="main">
    <!--================Conection==================-->
    <?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $server = "localhost";
        $pass = "";
        $user = "root";
        $db = "tienda";
        $total = 0;
        $con=mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse a la base de datos");

        $sqlVerificar = "SELECT id, cantidad FROM carrito WHERE id = ?";
        $stmtVerificar = mysqli_prepare($con, $sqlVerificar);
        mysqli_stmt_bind_param($stmtVerificar, "i", $id);
        mysqli_stmt_execute($stmtVerificar);
        $resultadoVerificar = mysqli_stmt_get_result($stmtVerificar);
        $productoExistente = mysqli_fetch_assoc($resultadoVerificar);

        if($productoExistente)
        {
            $nuevaCantidad = $productoExistente['cantidad'] + 1;
            $sqlActualizar = "UPDATE carrito SET cantidad = ? WHERE id = ?";
            $stmtActualizar = mysqli_prepare($con, $sqlActualizar);
            mysqli_stmt_bind_param($stmtActualizar, "ii", $nuevaCantidad, $id);
            mysqli_stmt_execute($stmtActualizar);
        }
        else
        {
            $query= "SELECT id, nombre, tipo,Img,precio,categoria FROM productos WHERE id=$id";
            $resultados = mysqli_query($con,$query);
            $column=mysqli_fetch_assoc($resultados);
            //variables
            $idCar = $column['id'];
            $nombre = $column['nombre'];
            $tipo = $column['tipo'];
            $img = $column['Img'];
            $precio = $column['precio'];
            $categoria = $column['categoria'];
            $cantidad = 1;
//
//            //Sentencia
            $sql2 = "INSERT INTO carrito (id, nombre, tipo, Img, precio, categoria,cantidad) VALUES (?, ?, ?, ?, ?, ?,?)";
            $stmt = mysqli_prepare($con, $sql2);
            mysqli_stmt_bind_param($stmt, "isssdsi", $idCar, $nombre, $tipo, $img, $precio, $categoria,$cantidad);
            $resultados2 = mysqli_stmt_execute($stmt);
            if ($resultados2) {
                // La inserción fue exitosa
                $column2 = mysqli_stmt_affected_rows($stmt);
            }
            else
            {
                echo "<script> alert('error al realizar la consulta');window.history.go(-1);</script>";
            }
        }

    }


//
//            //total de productos
//            $resultadoProd = mysqli_query($con, "SELECT COUNT(*) AS totalProd FROM carrito");
//            $datosProd = mysqli_fetch_assoc($resultadoProd);
//            $cantidad = $datos['totalProd'];

    ?>
    <!--=============== BREADCRUMB ===============-->
    <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
            <li><a href="Index.php" class="breadcrumb__link">Inicio</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Lista de deseos</span></li>
        </ul>
    </section>
    <!--=============== CART ===============-->
    <?php
    $sql3 = "SELECT id, nombre, tipo, Img, precio,cantidad FROM carrito";
    $resultados3 = mysqli_query($con, $sql3);
    while($column3 = mysqli_fetch_assoc($resultados3))
    {
        //calcular el precio
        $precio = $column3['precio'];
        $cantidad = $column3['cantidad'];
        $column3['total'] = $precio * $cantidad;

    ?>
    <section class="cart section--lg container">
        <div class="table__container"></div>
        <table class="table">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>cantidad</th>
                <th>Subtotal</th>
                <th>Remover</th>
            </tr>

            <tr>
                <td>
                    <img src="data:<?php echo $column3['tipo'];?>;base64, <?php echo base64_encode($column3['Img']);?>" alt="" class="table__img">
                </td>
                <td>
                    <h3 class="table__title"><?php echo $column3['nombre'];?></h3>

                    <p class="table__descripcion">Productos hechos con los mejores materiales de alta calidad para mayor duración.</p>
                </td>
                <td><span class="table__prince"><?php echo $column3['precio'];?></span></td>
                <td><input type="number" value="<?php echo $column3['cantidad']; ?>" class="quantity"></td>
                <td><span class="table__subtotal"><?php echo $column3['total']; ?></span></td>
                <td><i class="fi fi-rs-trash table__trash"></i></td>
            </tr>
        </table>
    </section>
    <?php
    }
    mysqli_close($con);
    ?>


    <!--=============== NEWSLETTER ===============-->
    <section class="newsletter section ">
        <div class="newsletter__container container grid">
            <h3 class="newsletter__title flex">
                <img src="/archivo_prueba/Assets/Img/icon-email.svg" alt="" class="newsletter__icon">
                Suscríbase al boletín
            </h3>

            <p class="newsletter__description">
                ...y recibe in cupón de $25 en tu primer compra.
            </p>

            <form action="" class="newsletter__form">
                <input type="text" placeholder="Enter your email" class="newsletter__input">
                <button type="submit" class="newsletter__btn">Suscríbete</button>
            </form>
        </div>
    </section>
</main>
<!--=============== FOOTER ===============-->
<footer class="footer container">
    <div class="footer__container grid">
        <div class="footer__content">
            <a href="Index.php" class="footer__logo">
                <img src="Assets/Img/Logo2.png" alt="" class="footer__logo-img">
            </a>

            <h4 class="footer__subtitle">Contacto</h4>

            <p class="footer__description">
                <span>Dirección: </span>Blvd. Gral. Marcelino García Barragán 1421, Olímpica, 44430 Guadalajara, Jal
            </p>

            <p class="footer__description">
                <span>Teléfono: </span>+01 2222 365 / (+52) 336-456-5678
            </p>

            <p class="footer__description">
                <span>Horario: </span>10:00 - 18:00, Lun - Sab
            </p>

            <div class="footer__social">
                <h4 class="footer__subtitle">Síguenos</h4>

                <div class="footer__social-links flex">
                    <a href="">
                        <img src="Assets/ImgPrueba/icon-facebook.svg" alt="" class="footer__social-icon">
                    </a>

                    <a href="">
                        <img src="Assets/ImgPrueba/icon-twitter.svg" alt="" class="footer__social-icon">
                    </a>

                    <a href="">
                        <img src="Assets/ImgPrueba/icon-instagram.svg" alt="" class="footer__social-icon">
                    </a>

                    <a href="">
                        <img src="Assets/ImgPrueba/icon-pinterest.svg" alt="" class="footer__social-icon">
                    </a>

                    <a href="">
                        <img src="Assets/ImgPrueba/icon-youtube.svg" alt="" class="footer__social-icon">
                    </a>
                </div>
            </div>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Dirección</h3>

            <ul class="footer__links">
                <li><a href="" class="footer__link">Sobre Nosotros</a></li>
                <li><a href="" class="footer__link">Información de entrega</a></li>
                <li><a href="" class="footer__link">Política de privacidad</a></li>
                <li><a href="" class="footer__link">Términos y condiciones</a></li>
                <li><a href="" class="footer__link">Contáctanos</a></li>
                <li><a href="" class="footer__link">Centro de ayuda</a></li>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Mi cuenta</h3>

            <ul class="footer__links">
                <li><a href="" class="footer__link">Sign In</a></li>
                <li><a href="" class="footer__link">Ver carrito</a></li>
                <li><a href="" class="footer__link">Mi lista de deseados</a></li>
                <li><a href="" class="footer__link">Seguir mi pedido</a></li>
                <li><a href="" class="footer__link">Ayuda</a></li>
                <li><a href="" class="footer__link">Ordenar</a></li>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Métodos de pago seguros</h3>

            <img src="Assets/ImgPrueba/payment-method.png" alt="" class="payment__img">
        </div>
    </div>

    <div class="footer__bottom">
        <p class="copyright">&copy; 2023 Rêve de Luxe. All rights reserved</p>
        <span class="designer">Designed by </span>
    </div>
</footer>
<!--=============== SWIPER JS ===============-->
<script src=""></script>

<!--=============== MAIN JS ===============-->
<script src=""></script>
<script src="/archivo_prueba/Assets/JS/SearchBar.js"></script>
</body>
</html>


