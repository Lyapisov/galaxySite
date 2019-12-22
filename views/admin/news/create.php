<?php require_once ROOT . '/views/loyouts/header_admin.php';?>
    <div class="backForCabinet adminBack">
        <div class="user user-admin">
            <div class="create">
                <h4>Новая новость:</h4>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <form enctype="multipart/form-data" action="#" method="post" >

                <p>Заголовок новости</p>
                <input type="text" name="name" placeholder="" value="" width="500">

                <p>Категория новости</p>
                    <select name="category">
                        <?php if (is_array($categoryList)): ?>
                            <?php foreach ($categoryList as $category): ?>
                                <option value="<?php echo $category['id']; ?>">
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                <p>Основоной текст новости</p>
                    <textarea name="content" rows="20" cols="100"></textarea>
                    <br/><br/>

                <p>Фотография новости</p>
                    <input type="file" name="photo" placeholder="" value="" height="100px">

                <p>Дата публикации</p>
                    <input type="date" name="date" placeholder="" value="">

                <p>Автор новости</p>
                    <input type="text" name="author" placeholder="" value="">

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
    </div>
</body>
</html>