<?php require_once ROOT . '/views/loyouts/header.php';?>
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
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?> </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <h2>Войдите на сайт</h2>
        <form class="formlogin" action="#" method="post">
        <input type="email" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Пароль">
        <input id="submit" type="submit" name="submit" value="Войти">
            <p>или пройдите<br><a href="/user/register/">Регистрацию</a></p>
        </form>
    </div>
</body>
</html>
