<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
</head>
<body>
    <h1>เข้าสู่ระบบ</h1>
    <form action="process-login.php" method="POST"> 
        <div>
            <input name="email_account" type="email" placeholder="Enter your Email" require>
        </div>
        <div>
            <input name="password_account" type="password" placeholder="Enter your password" require>
        </div>
        <button type="submit">Login</button>
        <a href="form-register.php">สร้างบัญชีใหม่</a>
    </form>
</body>
</html>