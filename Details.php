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

    <!--================CSS===================-->
    <link rel="stylesheet" href="/archivo_prueba/Assets/CSS/styles.css">
    <!--==============SWIPER CSS===============-->
    <link rel="stylesheet" href="recursos/jsdelivir.css">
    <!--==============IMG Pestaña===============-->
    <link rel="icon" type="image/x-icon" href="/archivo_prueba/Assets/Img/Logo2.png">

    <title>Detalles Tienda</title>
</head>
<body>
<!--=============== HEADER ===============-->
<header class="header">
    <div class="header__top">
        <div class="header__container container">
            <div class="header__contact">
                <span>(+52) 336-456-5678</span>

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
                    <a href="Shop.php" class="nav__link">Tienda</a>
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
                    <img src="Assets/Img/search.png" alt="">
                </button>
            </div>
        </div>

        <div class="header__user-actions">
            <a href="wishlist.php" class="header__action-btn">
                <img src="Assets/Img/icon-heart.svg" alt="">
                <span class="count">3</span>
            </a>

            <a href="Cart.php" class="header__action-btn">
                <img src="Assets/Img/icon-cart.svg" alt="">
                <span class="count">3</span>
            </a>

        </div>
    </nav>
</header>

<!--=============== MAIN ===============-->
<main class="main">
    <!--=============== BREADCRUMB ===============-->
    <?php
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $server = "localhost";
        $pass = "";
        $user = "root";
        $db = "tienda";
        $con=mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse a la base de datos");
        $query= "SELECT * FROM productos WHERE id=$id";
        $resultado= mysqli_query($con,$query);
        if(mysqli_num_rows($resultado)>0){
            $column= mysqli_fetch_assoc($resultado);
        }
    }
        ?>
    <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
            <li><a href="Index.php" class="breadcrumb__link">Inicio</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link"><?php echo $column['categoria']  ?></span></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link"><?php echo $column['nombre'] ?></span></li>
        </ul>
    </section>

    <!--=============== DETAILS ===============-->
    <section class="details section--lg">
        <div class="details__container container grid">
            <div class="details__group">
                <img src="data:<?php echo $column['tipo'];?>;base64,<?php echo base64_encode($column['Img']);?>"  alt="" class="details__img">

                <div class="details__small-images grid">
                    <img src="data:<?php echo $column['tipoimg2'];?>;base64,<?php echo base64_encode($column['Img2']);?>" alt="" class="details__small-img">

                    <img src="data:<?php echo $column['tipo'];?>;base64,<?php echo base64_encode($column['Img']);?>" alt="" class="details__small-img">

                    <img src="data:<?php echo $column['tipoimg2'];?>;base64,<?php echo base64_encode($column['Img2']);?>" alt="" class="details__small-img">
                </div>
            </div>

            <div class="details__group">
                <h3 class="details__title"><?php echo $column['nombre'] ?></h3>
                <p class="details__brand">Brands: <span>Rêve de Luxe</span></p>

                <div class="details__price flex">
                    <span class="new__price">$<?php echo $column['precio'];?></span>
                </div>

                <p class="short__description">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam delectus laborum impedit porro numquam repellendus facere animi libero debitis. Similique velit repellendus rerum tempore deleniti modi mollitia dolorum rem iusto.
                </p>

                <ul class="product__list">
                    <li class="list__item flex">
                        <i class="fi-rs-crown"></i> 1 Year Al Jazeera Brand Warranty
                    </li>

                    <li class="list__item flex">
                        <i class="fi-rs-refresh"></i> 30 Day Return Policy
                    </li>

                    <li class="list__item flex">
                        <i class="fi-rs-credit-card"></i> Cash on Delivery available
                    </li>
                </ul>


                <div class="details__size flex">
                    <span class="details__size-title">Talla</span>

                    <ul class="size__list">
                        <li>
                            <a href="#" class="size__link size-active" >S</a>
                        </li>

                        <li>
                            <a href="#" class="size__link" >M</a>
                        </li>

                        <li>
                            <a href="#" class="size__link" >L</a>
                        </li>

                        <li>
                            <a href="#" class="size__link" >XL</a>
                        </li>

                        <li>
                            <a href="#" class="size__link" >XS</a>
                        </li>

                        <li>
                            <a href="#" class="size__link" >UNITALLA</a>
                        </li>
                    </ul>
                </div>

                <div class="details__action">
                    <input type="number" class="quantity" value="0">

                    <a href="Cart.php? id=<?php echo $column['id'];?>" class="btn btn--sm">Añadir al carrito</a>

                    <a href="#" class="details__action-btn">
                        <i class="fi fi-rs-heart"></i>
                    </a>
                </div>

                <ul class="details__meta">
                    <li class="meta__list flex"><span>SKU:</span> FWM15VKT</li>
                    <li class="meta__list flex"><span>Tags:</span> <?php echo $column['categoria'];?>, <?php echo $column['nombre'];?></li>
                    <li class="meta__list flex"><span>Disponibilidad:</span> 8 Articulos en Stock</li>
                </ul>
            </div>
        </div>
    </section>

    <!--=============== DETAILS TAB ===============-->
    <section class="details__tab"></section>

    <!--=============== PRODUCTS ===============-->
    <section class="products"></section>

    <!--=============== NEWSLETTER ===============-->
    <section class="newsletter section home__newsletter">
        <div class="newsletter__container container grid">
            <h3 class="newsletter__title flex">
                <img src="Assets/Img/icon-email.svg" alt="" class="newsletter__icon">
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
<script src="recursos/jsdelivir.js"></script>

<!--=============== MAIN JS ===============-->
<script src="/archivo_prueba/Assets/JS/main.js"></script>
<script src="/archivo_prueba/Assets/JS/SearchBar.js"></script>
</body>
</html>

