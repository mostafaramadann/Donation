<?php

require_once ("IView.php");
class LoginView implements IView
{

    function showView($records)
    {
        echo "<html lang='en'>
    <head>
        <link rel='stylesheet' href='CSS/Login.css'>
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
            <p class='message'>Not Registered ? <a href='RegisterController.php'>Create Account</a></p>
        </form>
    </div>
    </body>
    </html>";
    }
}