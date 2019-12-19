<?php
require_once ("HeaderView.php");
require_once ("LoginView.php");
session_start();
    $header= new HeaderView();
    $header->showView(null);
    $lview=new LoginView();
    $lview->showView(null);
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
        header("location: HomeController.php");
        exit;
    } else {
        if ($_POST['Password'] != '' || $_POST['UserName'] != '') {
            require_once ("UserModel.php");
            $u = UserModel::MakeObject();
            $u->Retrieveuser($_POST['UserName'], sha1($_POST['Password']),null,1);
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
