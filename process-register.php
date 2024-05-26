<?php 
    // connect db
    $open_connect =1;
    require('connect.php');
    //รับค่า post จาก form-register
   
     // Check if the form was submitted
     if(isset($_POST['username_account']) && isset($_POST['email_account']) && isset($_POST['password_account1'])&& isset($_POST['password_account2'])){
       $username_account = htmlspecialchars( mysqli_real_escape_string($connect,$_POST['username_account']));
       $email_account = htmlspecialchars( mysqli_real_escape_string($connect,$_POST['email_account']));
       $password_account1 = htmlspecialchars( mysqli_real_escape_string($connect,$_POST['password_account1']));
       $password_account2 = htmlspecialchars( mysqli_real_escape_string($connect,$_POST['password_account2']));

       if(empty($username_account)){
        die(header('Location: form-register.php')); //คุณไม่ได้กรอกชื่อผู้ใช้
       }elseif(empty($email_account)){
        die(header('Location: form-register.php'));
       }elseif(empty($password_account1)){
        die(header('Location: form-register.php'));
       }elseif(empty($password_account2)){
        die(header('Location: form-register.php'));
       }elseif($password_account1 != $password_account2){
        die(header('Location: form-register.php')); //ยืนยันรหัสผ่านให้ถูกต้อง
       }else{
        $query_check_email_account = "SELECT email_account FROM account WHERE email_account = '$email_account' " ;
        $call_back_query_check_email_account = mysqli_query($connect , $query_check_email_account);
        if(mysqli_num_rows($call_back_query_check_email_account) >0){
            die(header('Location: form-register.php')); // ผู้ใช้มี email นี้แล้ว
        }else{
            // email มัน unique แล้วต่อไปจะเป็นการเข้ารหัสเพื่อเก็บรักษาความปลอดภัยของผู้ใช้
            $length = random_int(97,128);
            $salt_account = bin2hex(random_bytes($length));
            $password_account1 = $password_account1.$salt_account; //เอามาต่อกับค่าเกลือ(hash+salt)
            $algo = PASSWORD_ARGON2I;
            $options =[
                'cost' =>   PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
                'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST,
                'threads' => PASSWORD_ARGON2_DEFAULT_THREADS


            ];
            $password_account = password_hash($password_account1 ,$algo ,$options); // นำรหัสที่ต่อกับค่าเกลือแล้วเข้ารหัสด้วยวิธี argon2id
            $query_create_account = "INSERT INTO account VALUES ('','$username_account','$email_account','$password_account',
            '$salt_account','member','default_images_account.jpg','','','')";
            // add  $query_create_account ลงใน db
            // รอการตอบกลับ
            $call_back_create_account = mysqli_query($connect , $query_create_account);
            if($call_back_create_account){
                die(header('Location: formLogin.php')); // สร้างบชสำเร็จ
            }else{
                die(header('Location: form-register.php')); // สร้างบชล้มเหลว  
            }
        }

       }


     }else{
        die(header('Location: form-register.php')); // ไม่มีข้อมูล 
     }
       

   
   


?>