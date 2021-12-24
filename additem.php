<?php

    require 'db.php';

    if(isset($_POST['do_add']))
    {
        $errors = array();

        if($_POST['title'] == '')
        {
            $errors[] = 'Введите название!';
        }

        if($_POST['description'] == '')
        {
            $_POST['description'] = 'Описание отсутствует';
        }

        if (!isset($_FILES['poster'])) {
            $_POST['poster'] = '';
        }

        if(empty($errors))
        {
            $upload_image=$_FILES["poster"]["name"];
            $folder="/domains/localhost/images/";
            move_uploaded_file($_FILES["poster"]["tmp_name"],"$folder".$_FILES["poster"]["name"]);
            $insert_path='/images/'.$upload_image;
            $catalog = R::dispense('catalog');
            $catalog->title = $_POST['title'];
            $catalog->description = $_POST['description'];
            $catalog->image = $insert_path;
            $catalog->user = $_SESSION['logged_user']->login;
            R::store($catalog);
            echo '<p>Данные успешно добавлены!</p>';
        }
        else
        {
            echo '<p>'.array_shift($errors).'</p>';
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Добавить</title>
        <style>
            @import url("/styles/all.css");
            @import url("/styles/addItem.css");
        </style>
    </head>

    <body>
        <?php include 'header.php';?>

        <div class="main-block">
            <div class="content">
            <h2>Добавить что-то новое</h2>
            <?php if(isset($_SESSION['logged_user'])) : ?>
            <form enctype="multipart/form-data" action="/additem.php" method="POST">
                <div class="input-field">
                    <p>Название</p>
                    <input type="text" name="title"/>
                </div>
                <div class="input-field">
                    <p>Описание</p>
                    <textarea name="description"></textarea>
                </div>
                <div class="input-field">
                    <p>Постер</p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                    <input type="file" name="poster"/>
                </div>
                <div class="accept-button">
                    <button type="submit" name="do_add">Добавить</button>
                </div>
            </form>
            <?php else : ?>
                <p>Выполните авторизацию</p>
            <?php endif; ?>
            </div>
        </div>
    </body>
</html>