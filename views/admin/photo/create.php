<?php require_once ROOT . '/views/loyouts/header_admin.php';?>
<div class="user user-admin">
    <div class="create">
        <h4>Новая фотография:</h4>

        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form enctype="multipart/form-data" action="#" method="post" >

            <p>Название фото</p>
            <input type="text" name="name" placeholder="" value="" width="500">

            <p>Категория фото</p>
            <select name="category">
                <?php if (is_array($categoryList)): ?>
                    <?php foreach ($categoryList as $category): ?>
                        <option value="<?php echo $category['id']; ?>">
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <p>Фотография: </p>
            <input type="file" name="photo" placeholder="" value="" height="100px">

            <p>Дата публикации</p>
            <input type="date" name="date" placeholder="" value="">

            <p>Показывать новость ?</p>
            <select name="visibility">
                <option value="1" selected="selected">Показывать</option>
                <option value="0">Скрыть</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Добавить новость">
        </form>
    </div>
</div>
</body>
</html>