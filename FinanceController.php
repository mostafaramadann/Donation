<?php
require_once("FinanceView.php");
require_once("FinanceModel.php");
require_once ("HeaderView.php");
require_once ("UserModel.php");
session_start();
////////////////////////////Main Calls////////////////////////////////////////////////////////////////
  $hview =new HeaderView();
  $um = UserModel::MakeObject();
  if(isset($_SESSION['loggedin']))
  $um->Retrieveuser(null,null,$_SESSION['id'],2);
  $fview = new financeView();
  $fmodel = new financeModel();
  $hview->showView($um->getOtherlinks());
  $records=$fmodel->getRecords();
  $fview->showView($records);
if(isset($_POST['addf']))
{
 if(verify())
 {
     $columns=array("Asset","price","qty");
     $dataArray=array($_POST['asset'],$_POST['price'],$_POST['qty']);
     $fmodel->AddRecord($dataArray,$columns);
     header("location:FinanceController.php");
 }
}
///////////////////////Functions///////////////////////////////////////////////////////////////////////
    function verify()
    {
        require_once("FinanceModel.php");
            if($_POST['asset']!=""
            && preg_match("#^[^\d\s]+$#",$_POST['asset'])
            && $_POST['price']!=""
            && preg_match("#[0-9]+#",$_POST['price'])
            && $_POST['qty']!=""
            &&preg_match("#[0-9]+#",$_POST['qty']))
            {
               return true;
            }

    }
?>
