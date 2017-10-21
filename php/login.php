<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 17/10/12
 * Time: 下午7:02
 */
header("content-type:text/html;charset=utf-8");

require_once 'database.php';
$username = "";
$password = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new DB('127.0.0.1:8080', 'root', "", 'PHP0707') or die(mysqli_error());
    $mysql = "SELECT * FROM user WHERE 1 ";

    $select = $db->selSQL($mysql);
    foreach ($select as $key => $value) {
        if ($username == $value['phone']) {
            if ($password == $value['password']) {
                echo '登录成功'.','.$value['phone'].','.$value['password'];
            } else {
                echo '密码错误';
            }
        } else {
            echo '账号不存在';
        }

    }
}

