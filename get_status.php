<?php
    require 'db.php';
    if (isset($_SESSION['logged_user'])) {
        $record = R::findOne('watch_list', ' title_id = ? AND login = ?', [$_GET['id'], $_SESSION['logged_user']['login']]);
        echo $record->status;
    }
?>