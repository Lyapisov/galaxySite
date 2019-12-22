<?php require_once ROOT . '/views/loyouts/header_admin.php';?>
    <div class="backForCabinet adminBack">
        <div class="user user-admin">
            <div class="create">
                <h4>Изменить фото:</h4>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <form action="#" method="post" >

                <p>Название:</p>
                <input type="text" name="name" placeholder="" value="<?php echo $photo["name"]; ?>" width="500">

                <p>Категория:</p>
                    <select name="category">
                        <?php if (is_array($categoryList)): ?>
                            <?php foreach ($categoryList as $category): ?>
                                <option value="<?php echo $category['id']; ?>" <?php if ($photo['category'] == $category['news_type']) echo ' selected="selected"'; ?>>
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                <p>Фотография</p>
                    <img src="<?php echo Photo::getImage($photo['id']); ?>" width="200" alt="" />
                    <br>
                    <input type="file" name="photo" placeholder="" value="<?php echo $photo['photo']; ?>" height="100px">

                <p>Дата публикации</p>
                    <input type="date" name="date" placeholder="" value="<?php echo $photo["date"]; ?>">

                <p>Показывать новость ?</p>
                    <select name="visibility">
                        <option value="1" selected="selected">Показывать</option>
                        <option value="0">Скрыть</option>
                    </select>
                <br>
                <input type="submit" name="submit" value="Сохранить изменения">
                </form>
            </div>
        </div>
    </div>
</body>
</html>