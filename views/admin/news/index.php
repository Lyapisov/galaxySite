<?php require_once ROOT . '/views/loyouts/header_admin.php';?>
<div class="user user-admin">
    <a href="/admin/news/create" class="navigation"><i class="fa fa-plus"></i> Добавить новость</a>

    <h4>Список новостей:</h4>
    <div class="admin-width">
        <table class="admin">
            <tr>
                <th>ID новости</th>
                <th>Название </th>
                <th>Категория</th>
                <th>Контент</th>
                <th>Картинка</th>
                <th>Дата</th>
                <th>Автор</th>
                <th>Видимость</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
                <?php foreach ($newsInfo as $news): ?>
            <tr>
                <td><?php echo $news['id']; ?></td>
                <td><?php echo $news['name']; ?></td>
                <td><?php echo Category::getCategory($news['category']); ?></td>
                <td id="text-content"><div><?php echo $news['content']; ?></div></td>
                <td><img src="<?php echo Photo::getRelativePathForPhotolist($news['id']); ?>"  alt="" height="70"/></td>
                <td><?php echo $news['date']; ?></td>
                <td><?php echo $news['author']; ?></td>
                <td><?php echo News::getStatusNews($news['visibility']); ?></td>
                <td><a href="/admin/news/update/<?php echo $news['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/admin/news/delete/<?php echo $news['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
                <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>
