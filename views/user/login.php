<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My first html</title>
    <link rel="stylesheet" href="/template/css/style.css">
    <link rel="stylesheet" href="\template\css\font-awesome.min.css">
</head>
<body>
<div id="page">
    <div id="navigation">
        <p>
        <ul id="styles">
            <li><a href="#">Главная</a></li>
            <li>
                <a href="#">Мастер-классы</a>
                <ul class="dropdown">
                    <li><a href="#">ИЗО</a></li>
                    <li><a href="#">Лепка</a></li>
                    <li><a href="#">Английский</a></li>
                    <li><a href="#">Вышивание</a></li>
                </ul>
            </li>
            <li><a href="#">Фотогаллерея</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a id="login" href="/user/login.php/"><i class="fa fa-lock"></i> Вход</a></li>
            <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
            <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
        </ul>
        </p>
    </div>
    <div id="header">
        <a class="logo" href="/" name="Логотип">
            <img src="/template/images/logo.png" alt="Логотип">
        </a>

        <p id="label">
            ГАЛАКТИКА
        </p>
        <!-- <form class="search">
            <input type="text">
            <input type="button" value="Поиск">
        </form> -->
    </div>

    <div class="user">
        <h2>Войдите на сайт</h2>
        <form class="formlogin" action="#" method="post">
        <input type="email" mame="email" placeholder="E-mail">
        <input type="password" mame="password" placeholder="password">
        <input id="submit" type="submit" mame="submit" value="Войти">
            <p>или пройдите<br><a href="#">Регистрацию</a></p>
        </form>
    </div>
</body>
</html>
