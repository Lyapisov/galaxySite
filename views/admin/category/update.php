<?php require_once ROOT . '/views/loyouts/header_admin.php';?>
<div class="user user-admin">
    <div class="create">
        <h4>Изменить категорию:</h4>

        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="#" method="post" >

        <p>Название:</p>
        <input type="text" name="name" placeholder="" value="<?php echo $category["name"]; ?>" width="500">

        <input type="text" name="news_type" placeholder="" value="<?php echo $category["news_type"]; ?>" width="500">

        <p>Показывать категорию ?</p>
            <select name="visibility">
                <option value="1" selected="selected">Показывать</option>
                <option value="0">Скрыть</option>
            </select>
        <br>
        <input type="submit" name="submit" value="Сохранить изменения">
        </form>
    </div>
</div>
</body>
</html>