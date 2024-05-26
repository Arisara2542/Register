<?php 

//prevent user enter to connect.php
if($open_connect !=1){
    die(header('Location:formLogin.php'));
}

$hostname ='localhost';
$username ='root';
$password ='';
$database ='programming_world';
$port = NULL;
$socket =NULL;

// connect ฐานข้อมูล
$connect = mysqli_connect($hostname,$username,$password,$database);

// check ฐานข้อมูลว่า connect ยัง dieคือการหยุดการทำงานของโค้ดด้านล่าง 
if(!$connect){

    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: ".mysqli_connect_error());
}else{
    mysqli_set_charset($connect,'utf8');
    $limit_login_account =3; 
    $time_band_account =1; 
    $query_reset_ban_account = "UPDATE account SET lock_account =0 , 
    login_count_account =0 WHERE ban_account <= NOW() AND login_count_account >= '$limit_login_account'";
    $call_back_ban_account = mysqli_query($connect , $query_reset_ban_account);
}

?>