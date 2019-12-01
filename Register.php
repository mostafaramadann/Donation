<!DOCTYPE html>
<html>
<head>
	<title>Donation Portal-Register</title>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
<?php
session_start();
include ("Header.php");
?>
<form class="form" method="post">
    <h1>Register</h1>
    <div style="display: inline;">
    Username:
    <input type="text" name="Username"/>
    </div>
    <br/>
    <div style="display: inline;">
    Password:
    <input type="password" name="Password"/>
    </div>
    <br/>
    <div style="display: inline;">
        Re-type Password
        <input type="password" name="retype"/>
    </div>
    <br/>
    <div style="display: inline;">
        First name:
        <input type="text" name="Firstname"/>
    </div>
    <br/>
    <div style="display: inline;">
        Last name:
        <input type="text" name="Lastname"/>
    </div>
    <br/>
    <div style="display: inline;">
        Email:
        <input type="email" name="Email"/>
    </div>
    <br/>
    <div style="display: inline;">
        Postcode:
        <input type="number" name="Postcode"/>
    </div>
    <br/>
    <div style="display: inline;">
        PhoneNumber:
        <input type="tel"name="Phonenumber"/>
    </div>
    <br/>
    <div style="display:inline;">
        BankAccountno.:
        <input type="tel" name="BankAccountno"/>
    </div>
    <br/>
    <button type="submit" name="reg">Submit</button>
</form>
</body>
<?php
if(isset($_POST['reg']))
{
    require_once ("UserController.php");
    $verify=UserController::getInstance()::Verify(2);
    $verify?header("location:Home.php"):exit();
}
?>
</html>