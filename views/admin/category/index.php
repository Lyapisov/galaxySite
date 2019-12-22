<?php require_once ROOT . '/views/loyouts/header_admin.php';?>
    <div class="backForCabinet adminBack">
        <div class="user user-admin">
            <a href="/admin/category/create"><i class="fa fa-plus"></i> Добавить категорию</a>
            <h4>Список категорий:</h4>
            <div class="admin-width">
                <table class="admin">
                    <tr>
                        <th>ID категории</th>
                        <th>Название категории</th>
                        <th>Тип категории</th>
                        <th>Видимость</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($categoryList as $category): ?>
                        <tr>
                            <td><?php echo $category['id']; ?></td>
                            <td><?php echo $category['name']; ?></td>
                            <td><?php echo $category['news_type']; ?></td>
                            <td><?php echo News::getStatusNews($category['visibility']); ?></td>
                            <td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
