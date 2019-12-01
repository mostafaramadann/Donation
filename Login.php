<!DOCTYPE html>
<?php
session_start();
    include("Header.php");
    echo "
    <html lang='en'>
    <head>
        <link rel='stylesheet' href='Login.css'>
        <title>Donation Portal-Login</title>
    </head>
    <body>
    <div class='form'>
    <h2>Login</h2> 
        <form method='post'>
            <div style='display:inline;'>
                Username:<input type='text' name='UserName' />
            </div>
            <div style='display:inline;'>
                Password:<input type='password' name='Password' />
            </div>
            <button type='submit' name='login'> Login </button>
            <p class='message'>Not Registered ? <a href='Register.php'>Create Account</a></p>
        </form>
    </div>
    </body>
    </html>";
if (isset($_POST['login']))
{
    require_once("UserController.php");
    session_start();
    $verify = UserController::getInstance()::Verify(1);
    //$verify?header("location: greetings.php"):exit();
}
?>
