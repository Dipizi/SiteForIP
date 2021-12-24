<?php
    require 'db.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Каталог</title>
        <style>
            @import url(/styles/catalog.css);
            @import url(/styles/all.css);
        </style>
    </head>
    <body>
        <?php include 'header.php';?>
        <div class="main">
            <div class="catalog">
                <?php
                    $items = R::getAll('SELECT * FROM catalog');
                ?>
                <?php
                    foreach($items as $item):
                ?>
                <a href='/item.php?id=<?php echo $item['id'];?>'>
                <div class="item">
                    <img src="<?=$item['image']?>">
                    <span><?=$item['title']?></span>
                </div>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="filters" style="display: none;">Фильтры</div>
        </div>
    </body>
</html>