<?php
require_once ("HeaderView.php");
require_once ("UserView.php");
require_once ("UserModel.php");
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
        Saver::UpdateUserProfile($um,$_POST['uname'],$_POST['pass']);

    }

}
if(isset($_POST["del"]))
{
    Deactivate();
}
//////////////////////Functions///////////////////////////////////////////////////////////////////////
///

function Deactivate()
{
    //require_once ("Home.php");
    Saver::GetInstance()::DeleteUserProfile($_SESSION["id"]);
    session_destroy();
    session_unset();
    //header("loc:Home.php");
}
?>
