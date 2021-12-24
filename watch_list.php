<?php
    require 'db.php';
    $username =  $_SESSION['logged_user']['login'];
    if (!empty($_GET)) {
        $st = $_GET['status'];
        $sql = "SELECT id, title FROM watch_list INNER JOIN catalog ON id = title_id WHERE login = '%s' AND watch_list.status = '%s'";
        $items = R::getAll(sprintf($sql, $username, $st));
        echo json_encode($items);
        return json_encode($items);
    } else if (!empty($_POST)) {
        $id = $_POST['id'];
        $new_status = $_POST['status'];
        $item = R::findOne('watch_list', 'title_id = ? and login = ?', [[$id, PDO::PARAM_INT], [$username, PDO::PARAM_STR]]);
        if (isset($item)) {
            $sql = "UPDATE watch_list SET status = '%s' WHERE login = '%s' AND title_id = %d";
            R::exec(sprintf($sql, $new_status, $username, $id));
            echo 'update';
        }
        else {
            $sql = "INSERT INTO watch_list VALUES (%d, '%s', '%s')";
            R::exec(sprintf($sql, $id, $username, $new_status));
            echo 'create';
        }   
    }
?>