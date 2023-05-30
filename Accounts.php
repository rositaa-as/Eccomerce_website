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
                    <a href="PHPLogin/login-register.php" class="nav__link">Login</a>
                </li>
            </ul>

            <div class="header__search">
                <input type="text" placeholder="Search for items..." class="form__input">
                <button class="search__btn">
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
            <li><span class="breadcrumb__link">Lista de deseos</span></li>
        </ul>
    </section>
    <!--=============== ACCOUNTS ===============-->
    <section class="accounts">

    </section>
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
</body>
</html>


