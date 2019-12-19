<?php
session_start();
require_once ("HeaderView.php");
$hview = new HeaderView();
$hview->showView(null);
$rview=new RegisterView();
$rview->showView(null);
if(isset($_POST['reg']))
{
    $verify=true;
    if($_POST["Username"]==''||!preg_match("#[\w(\.)*]+#",$_POST["Username"])||strlen($_POST["Username"])<6)
    {
        echo "Username Not Matching Criteria\n";
        echo "Username is empty or less than 6 characters or does not match numerics or alphabetics\n";
        $verify=false;
    }
    if ($_POST["Password"]==''||strlen($_POST["Password"])<=7||preg_match("(0123456789|123456789|012345678)",$_POST["Password"])
        ||strcmp($_POST["Password"],$_POST["retype"])!=0)
    {
        echo "Password Not Matching Criteria\n";
        echo "Password may be written different in one of the fields\n";
        echo "Password is empty or less than 8 characters or is not strong enough\n";
        $verify=false;
    }
    if($_POST["Firstname"]==''||!preg_match("#^[^\d\s]+$#",$_POST["Firstname"])||$_POST["Lastname"]==''
        ||!preg_match("#^[^\d\s]+$#",$_POST["Lastname"]))
    {
        echo "First/Last Name Not Matching Criteria\n";
        echo "First/Last Name should not be followed by spaces and should not be empty\n";
        $verify=false;
    }
    if($_POST["Email"]==""||!preg_match("#[\w\.]+\@[\w]+[\.](com|eg|org|edu|net)#",$_POST["Email"]))
    {
        echo "Email Not Matching Criteria\n";
        echo "Email does not match its regular form ex: email@domain.com or empty\n";
        $verify=false;
    }
    if($_POST["Postcode"]==""||!preg_match("#[0-9]+#",$_POST["Postcode"])||strlen($_POST["Postcode"])<4)
    {
        echo "Postal Code Not Matching Criteria\n";
        echo "Post code is empty or is less than five or contains numeric\n";
        $verify=false;
    }
    if($_POST["BankAccountno"]==""||$_POST["BankAccountno"]<10||strlen($_POST["BankAccountno"])>12
        ||!preg_match("#[0-9]+#",$_POST["BankAccountno"]))
    {
        echo "Invalid Bank Account\n";
        echo "Bank account Number should be 10-12 digits and not empty\n";
        $verify=false;
    }
    if(strlen($_POST["Phonenumber"])==12||!preg_match("#[0-9]+#",$_POST["Phonenumber"]))
    {
        echo "Phone number Not Matching Criteria\n";
        echo "Phone number is empty or less than 12 numbers or includes alphabetic\n";
        $verify=false;
    }
    if ($verify==true) {
        require_once("UserModel.php");
        $user = new UserModel(0,$_POST["Firstname"],$_POST["Lastname"],$_POST["Email"],$_POST["Phonenumber"],$_POST["Username"],$_POST["Password"],$_POST["BankAccountno"],2);
        $user->AddUser();
    }
    $verify?header("location:Login.php"):exit();
}
?>