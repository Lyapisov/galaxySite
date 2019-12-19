<?php require_once ROOT . '/views/loyouts/header_admin.php';?>
        <div class="user">
            <h2>Добрый день, администратор <?php echo $user['name']; ?></h2>
            <p>
                <br>
                Выберите пункт:
                <br><br>
                <ul>
                <li><a href="/admin/news">Работа с новостями сайта</a></li>
                <li><a href="/admin/photo">Работа с фотографиями ленты</a></li>
                <li><a href="/admin/category">Работа с категориями</a></li>
                </ul>
            </p>
        </div>
    </body>
</html>