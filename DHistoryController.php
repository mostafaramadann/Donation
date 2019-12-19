<?php
require_once ("HeaderView.php");
require_once ("UserModel.php");
require_once ("DHisoryView.php");
if(session_status()==PHP_SESSION_NONE)
session_start();
$umodel = UserModel::MakeObject();
if(isset($_SESSION['loggedin']))
    $umodel->Retrieveuser(null,null,$_SESSION['id'],2);
$hview = new HeaderView();
$hview->showView(null);
$dhistory= new DHisoryView();
$dhistory->showView()
?>