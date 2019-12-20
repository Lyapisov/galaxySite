<!DOCTYPE html>
<html>
<head>

    <script src="/template/js/jquery.js"></script>

    <script src="/template/js/jquery.cycle2.min.js"></script>
    <script src="/template/js/jquery.cycle2.carousel.min.js"></script>

    <script src="/template/js/bootstrap.min.js"></script>
    <script src="/template/js/jquery.scrollUp.min.js"></script>
    <script src="/template/js/price-range.js"></script>
    <script src="/template/js/jquery.prettyPhoto.js"></script>
    <script src="/template/js/main.js"></script>

    <meta charset="utf-8">
    <title>Galaxy</title>
    <link rel="stylesheet" href="/template/css/style.css">
    <link rel="stylesheet" href="/template/css/styleCarousel.css">
    <link rel="stylesheet" href="/template/css/font-awesome.min.css">
</head>
<body>
<div id="page">
    <div class="navigation">
        <p>
        <ul id="styles">
            <li><a href="/">Главная</a></li>
            <li>
                <a href="#">Мастер-классы</a>
                <ul class="dropdown">
                    <li><a href="#">ИЗО</a></li>
                    <li><a href="#">Лепка</a></li>
                    <li><a href="#">Английский</a></li>
                    <li><a href="#">Вышивание</a></li>
                </ul>
            </li>
            <li><a href="/site/photogalery/">Фотогаллерея</a></li>
            <li><a href="/site/aboutUs/">О нас</a></li>
            <li><a id="login" href="/site/contacts/">Контакты</a></li>
            <?php if (User::isGuest()): ?>
            <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
            <li class="instagram">  <a href="https://www.instagram.com/studiya_galaktika/?hl=ru"><i class="fa fa-instagram"></i></a></li>
            <?php else: ?>
            <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
            <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
            <li class="instagram">  <a href="https://www.instagram.com/studiya_galaktika/?hl=ru"><i class="fa fa-instagram"></i></a></li>
            <?php endif; ?>
        </ul>
        </p>
    </div>