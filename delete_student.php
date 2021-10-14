<?php
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = 'delete from  info where id = '.$id;
    require_once('dbhelp.php');
    execute($sql);

    echo 'xoa thanh cong';
}