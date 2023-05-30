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
    <link rel="stylesheet" href="/archivo_prueba/Assets/CSS/styles.css"/>
    <!--==============IMG Pestaña===============-->
    <link rel="icon" type="image/x-icon" href="/archivo_prueba/Assets/Img/Logo2.png">

    <title>Tienda</title>
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
    <!--=============== BREADCRUMB ===============-->
    <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
            <li><a href="Index.php" class="breadcrumb__link">Inicio</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Tienda</span></li>
        </ul>
    </section>
    <?php
    $server = "localhost";
    $pass = "";
    $user = "root";
    $db = "tienda";
    $con=mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse a la base de datos");
    if(isset($_GET['search']))
    {
        $search = $_GET['search'];
        $sql = "SELECT * FROM productos WHERE categoria LIKE '%$search%'";
        $res = mysqli_query($con,$sql);
        if(mysqli_num_rows($res) == 0)
        {
            echo "<script>alert('No se encontraron resultados');window.history.go(-1);</script>";
        }
        else
        {
            $resultado = mysqli_query($con, "SELECT COUNT(*) AS total FROM productos WHERE categoria LIKE '%$search%'");
            $datos = mysqli_fetch_assoc($resultado);
            $cantidad = $datos['total'];
        }
    }
    else
    {
        $resultado = mysqli_query($con, "SELECT COUNT(*) AS total FROM productos");
        $datos = mysqli_fetch_assoc($resultado);
        $cantidad = $datos['total'];
    }

    ?>
    <!--=============== PRODUCTS ===============-->
    <section class="products section--lg container">
        <p class="total__products">Hemos encontrado <span><?php echo $cantidad?></span> productos para ti!</p>

        <div class="products__container grid">
            <?php
            if(isset($_GET['search']))
            {
                $sqlProd = "SELECT * FROM productos WHERE categoria LIKE '%$search%'";
                $resProd = mysqli_query($con,$sqlProd);
            }
            else
            {
                $sqlProd = "SELECT * FROM productos";
                $resProd = mysqli_query($con,$sqlProd);
            }
            while($columnProd=mysqli_fetch_assoc($resProd))
            {
                ?>
                <div class="product__item">
                    <div class="product__banner">
                        <a href='Details.php? id=<?php echo $columnProd['id'];?>'  class="product__images">
                            <img src="data:<?php echo $columnProd['tipo'];?>;base64,<?php echo base64_encode($columnProd['Img']);?>" alt="" class="product__img default">

                            <img  src="data:<?php echo $columnProd['tipo'];?>;base64,<?php echo base64_encode($columnProd['Img2']);?>" alt="" class="product__img hover">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View">
                                <i class="fi fi-rr-eye"></i>
                            </a>
                            <a href="#" class="action__btn" aria-label="Añadir a lista de deseados">
                                <i class="fi fi-rr-heart"></i>
                            </a>
                            <a href="#" class="action__btn" aria-label="Compare">
                                <i class="fi fi-rr-shuffle"></i>
                            </a>
                        </div>
                        <div class="product__badge light-pink"><?php echo $columnProd['badge']?></div>
                    </div>
                    <div class="product__content">
                        <span class="product-category"><?php echo $columnProd['categoria']; ?></span>
                        <a href="Details.php">
                            <h3 class="product__title"><?php echo $columnProd['nombre'];?></h3>
                        </a>
                        <div class="product__rating">
                            <?php
                            $rating = $columnProd['rating'];
                            for($i=0;$i<$rating;$i++) {
                                ?>
                                <i class="fi fi-rs-star"></i>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price"><?php echo $columnProd['precio']; ?></span>
                            <span class="new__price"><?php echo $columnProd['precioOriginal']; ?></span>
                        </div>
                        <a href="#" class="action__btn cart__btn" aria-label="añadir al carrito">
                            <i class="fi fi-rr-shopping-bag-add"></i>
                        </a>
                    </div>
                </div>
                <?php
                $cantidad++;
            }
            mysqli_close($con);
            ?>
        </div>

        <ul class="pagination">
            <li><a href="#" class="pagination__link active">01</a></li>
            <li><a href="#" class="pagination__link">02</a></li>
            <li><a href="#" class="pagination__link">03</a></li>
            <li><a href="#" class="pagination__link">...</a></li>
            <li><a href="#" class="pagination__link">16</a></li>
            <li>
                <a href="#" class="pagination__link icon">
                    <i class="fi-rs-angle-double-small-right"></i>
                </a>
            </li>
        </ul>
    </section>

    <!--=============== NEWSLETTER ===============-->
    <section class="newsletter section">
        <div class="newsletter__container container grid">
            <h3 class="newsletter__title flex">
                <img src="/archivo_prueba/Assets/ImgPrueba/icon-email.svg" alt="" class="newsletter__icon">
                Suscríbase al boletín
            </h3>

            <p class="newsletter__description">
                ...y recibe in cuppon de $25 en tu primer compra.
            </p>

            <form action="" class="newsletter__form">
                <input type="text" placeholder="Ingresa tu email" class="newsletter__input">
                <button type="submit" class="newsletter__btn">Suscribete</button>
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
<script src="recursos/jsdelivir.js"></script>

<!--=============== MAIN JS ===============-->
<script src="/archivo_prueba/Assets/JS/main.js"></script>
<script src="/archivo_prueba/Assets/JS/SearchBar.js"></script>
</body>
</html>