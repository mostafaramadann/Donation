<link rel="stylesheet" href="Home.css"/>
<?php
session_start();
require_once ("HeaderView.php");
require_once ("UserModel.php");
$hview=new HeaderView();
$umodel = UserModel::MakeObject();
$umodel->Retrieveuser(null,null,$_SESSION['id'],2);
$hview->showView($umodel->getOtherlinks());
include ("greetings.php");

?>


