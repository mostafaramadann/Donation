<h1>Welcome</h1>
<link rel="stylesheet" href="CSS/Home.css"/>
<?php
/////Home Is Puplic and is not concerned with any User
session_start();
include("HeaderView.php");
require_once ("UserModel.php");
$umodel = UserModel::MakeObject();
if(isset($_SESSION['loggedin']))
$umodel->Retrieveuser(null,null,$_SESSION['id'],2);
$hview = new HeaderView();
$hview->showView($umodel->getOtherlinks());
 if (session_status() == PHP_SESSION_NONE)
            session_start();

?>
