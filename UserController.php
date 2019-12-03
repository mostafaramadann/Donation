<?php
require_once ("HeaderView.php");
require_once ("UserView.php");
require_once ("UserModel.php");
session_start();
$header= new HeaderView();
$header->showView(null);
$Userv= new UserView();
///User view is the account management
$Userv->showView(null);
//////////////////////Functions///////////////////////////////////////////////////////////////////////
     function Deactivate()
    {
        Saver::GetInstance()::DeleteUserProfile($_SESSION["id"]);
    }
    function Donate()
    {
        ///Not Implemented Yet
    }
?>
