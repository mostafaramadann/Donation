<?php
require_once ("HeaderView.php");
require_once ("UserView.php");
require_once ("UserModel.php");
if(session_status()==PHP_SESSION_NONE)
session_start();
$um = UserModel::MakeObject();
$um->Retrieveuser(null,null,$_SESSION["id"],2);

$header= new HeaderView();
$header->showView(null);
$Userv= new UserView();
$Userv->showView(null);
if(isset($_POST["submit"]))
{
    if($_POST['uname']!=""&&$_POST['uname']==$_POST['uname2']
    &&$_POST['pass']!=""&&$_POST['pass']==$_POST['pass2'])
    {
        Saver::UpdateUserProfile($um,$_POST['uname'],$_POST['pass'],$_SESSION['notification']);
        header("Location:UserController.php");

    }

}
if(isset($_POST["del"]))
{
    Deactivate($um);
}
//////////////////////Functions///////////////////////////////////////////////////////////////////////
///

function Deactivate($um)
{
    $um->Deleteuserprofile();
    session_destroy();
    session_unset();
    header("Location:HomeController.php");
}
?>
