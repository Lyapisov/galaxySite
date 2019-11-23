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


    <div id="content">
        <?php foreach ($newsInfo as $info): ?>
        <div id="article">
            <h1><?php echo $info['name']; ?></h1>
            <p>
                <img src="/template/images/1.jpg">
                <?php echo $info['content']; ?>
            </p>
        </div>
        <?php endforeach; ?>
        <div id="sitebar">
            <ul id="menubar">
                <li><a href="#">ИЗО</a></li>
                <li><a href="#">Лепка</a></li>
                <li><a href="#">Английский</a></li>
                <li><a href="#">Вышивание</a></li>
                <li><a href="#">Другое</a></li>
            </ul>
        </div>
    </div>
    <?php foreach ($newsInfo as $info): ?>
    <div id="footer">
        <p>
            Автор: <?php echo $info['author'] ?>. Дата: <?php echo $info['date'] ?>г. Тема: Изобразительное искусство.
        </p>
    </div>
    <?php endforeach; ?>
</div>
<!-- <div id="fixed">
    <div class="modal-body">
        <p>Контентик</p>
    </div>
</div> -->
</body>
</html>