<?php require_once ROOT . '/views/loyouts/header_admin.php';?>
<div class="user user-admin">
    <div class="create">
        <h4>Новая категория:</h4>

        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form enctype="multipart/form-data" action="#" method="post" >

            <p>Название категории</p>
            <input type="text" name="name" placeholder="" value="" width="500">

            <p>Тип категории:</p>
            <input type="text" name="news_type" placeholder="" value="" width="500">

            <p>Показывать категорию ?</p>
            <select name="visibility">
                <option value="1" selected="selected">Показывать</option>
                <option value="0">Скрыть</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Добавить категорию">
        </form>
    </div>
</div>
</body>
</html>