<?php require_once ROOT . '/views/loyouts/header_admin.php';?>
<div class="user user-admin">
    <a href="/admin/photo/create" class="navigation"><i class="fa fa-plus"></i> Добавить фото</a>

    <h4>Список фотографий:</h4>
    <div class="admin-width">
        <table class="admin">
            <tr>
                <th>ID фото</th>
                <th>Название </th>
                <th>Категория</th>
                <th>Картинка</th>
                <th>Дата</th>
                <th>Видимость</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($photoList as $photo): ?>
                <tr>
                    <td><?php echo $photo['id']; ?></td>
                    <td><?php echo $photo['name']; ?></td>
                    <td><?php echo Category::getCategory($photo['category']); ?></td>
                    <td><img src="<?php echo Photo::getRelativePathForPhotolist($photo['id']); ?>"  alt="" height="70"/> </td>
                    <td><?php echo $photo['date']; ?></td>
                    <td><?php echo News::getStatusNews($photo['visibility']); ?></td>
                    <td><a href="/admin/photo/update/<?php echo $photo['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="/admin/photo/delete/<?php echo $photo['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>
