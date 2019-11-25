<?php require_once ROOT . '/views/loyouts/header.php';?>
    <div id="header">
        <a class="logo" href="/" name="Логотип">
            <img src="/template/images/logo.png" alt="Логотип">
        </a>
        <p id="label">
            ГАЛАКТИКА
        </p>
    </div>

    <div id="carousel"
         data-cycle-fx=carousel
         data-cycle-timeout=5000
         data-cycle-carousel-visible=3
         data-cycle-carousel-fluid=true
         data-cycle-slides="div.item"
         data-cycle-prev="#prev"
         data-cycle-next="#next"
    >
        <?php foreach ($photoGallery as $photo): ?>
            <a href="/photo/<?php echo $photo['id']; ?>">
            <img src="<?php echo Photo::getImage($photo['id']); ?>" alt="" />
            </a><br/><br/>
            <a href="#" data-id="<?php echo $photo['id']; ?>"> </a>
        <?php endforeach; ?>

        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev" id="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next" id="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>

    <div id="content">
        <div id="article">
            <?php foreach ($newsInfo as $info): ?>
            <h1><?php echo $info['name']; ?></h1>
            <p>
                <img src="/template/images/1.jpg">
                <?php echo $info['content']; ?>
            </p>
                <div id="footer">
                    <p>
                        Автор: <?php echo $info['author'] ?>. Дата: <?php echo $info['date'] ?>г. Тема: Изобразительное искусство.
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
        <div id="sitebar">
            <ul id="menubar">
                <li><a href="#">ИЗО</a></li>
                <li><a href="#">Лепка</a></li>
                <li><a href="#">Английский</a></li>
                <li><a href="#">Вышивание</a></li>
                <li><a href="#">Другое</a></li>
            </ul>
        </div>
    </div>
<!-- <div id="fixed">
    <div class="modal-body">
        <p>Контентик</p>
    </div>
</div> -->
</body>
</html>