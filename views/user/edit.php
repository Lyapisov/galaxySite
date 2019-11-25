<?php require_once ROOT . '/views/loyouts/header.php';?>
    <div class="user">
        <h2>Введите новые данные</h2><br>
        <?php if($result): ?>
            <p>Данные сохранены!</p>
        <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?> </li>
                <?php endforeach; ?>
            </ul><br>
        <?php endif; ?>
        <?php endif; ?>
        <form class="formlogin" action="#" method="post">
            <input type="text" name="name" placeholder="Имя">
            <input type="password" name="password" placeholder="Пароль">
            <input id="submit" type="submit" name="submit" value="Сохранить">
        </form>
    </div>
</body>
</html>