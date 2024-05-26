<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
</head>
<body>
    <h1>Create your account</h1>
    <form action="process-register.php" method="POST"> 
        <div>
            <input name="username_account" type="text" placeholder="Enter your account" require>
        </div>
        <div>
            <input name="email_account" type="email" placeholder="Enter your email" require>
        </div>
        <div>
            <input name="password_account1" type="password" placeholder="Enter your password" require>
        </div>
        <div>
            <input name="password_account2" type="password" placeholder="confirm your password" require>
        </div>
        <button type="submit">Register</button>
        <a href="formLogin.php">Have any account?</a>
    </form>
</body>
</html>