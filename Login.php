<!DOCTYPE html>
<?php
require_once ("HeaderView.php");
session_start();
    $header= new HeaderView();
    $header->showView(null);
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
    if(session_status()==PHP_SESSION_NONE)
    session_start();
    Verify();
    //$verify?header("location: greetings.php"):exit();
}
function Verify()
{
if(session_status()==PHP_SESSION_NONE)
    session_start();
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: Home.php");
        exit;
    } else {
        if ($_POST['Password'] != '' || $_POST['UserName'] != '') {
            require_once ("UserModel.php");
            $u = UserModel::MakeObject();
            $u->Retrieveuser($_POST['UserName'], $_POST['Password'],null,1);
            if ($u->getID() != null) {
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $u->getID();
                $_SESSION["username"] = $u->getUsername();
                $_SESSION["userType"] = $u->getUsertype();
                $_SESSION["UsertypeStr"] = $u->getUsertypeStr();
                $_SESSION["UsertypeLinkPath"] = $u->getUsertypeLinkPath();
                header("location: ".$_SESSION["UsertypeLinkPath"]."");
            }
        }
    }
}
?>
