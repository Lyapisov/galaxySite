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
        <?php if($result): ?>
            <p>Вы зарегестрированы!</p>
        <?php else: ?>
             <?php if (isset($errors) && is_array($errors)): ?>
                 <ul>
                    <?php foreach ($errors as $error): ?>
                         <li> - <?php echo $error; ?> </li>
                     <?php endforeach; ?>
                 </ul><br>
             <?php endif; ?>

        <h2>Введите данные</h2>
        <form class="formlogin" action="#" method="post">
            <input type="text" name="name" placeholder="Имя">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Пароль">
            <input id="submit" type="submit" name="submit" value="Регистрация">
        </form>
    </div>
        <?php endif; ?>
</body>
</html>