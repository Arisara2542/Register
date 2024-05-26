<?php 
session_start();
$open_connect =1;
require('connect.php');

if(!isset($_SESSION['id_account']) || !isset($_SESSION['role_account'])){
    die(header('Location: formLogin.php')); // ถ้าไม่มี seesion id_account or seesion role_account จะถูกส่งไปหน้า login
}elseif(isset($_GET['logout'])){ // ถ้ามีการกดปุ่มจากระบบให้ทำการทำลาย session และส่งไปหน้า login
    session_destroy();
    die(header('Location: formLogin.php'));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
</head>
<body>
    <h1>Member</h1>
    <a href="index.php?logout=1">ออกจากระบบ</a>
</body>
</html>