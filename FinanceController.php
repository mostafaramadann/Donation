<?php
require_once("FinanceView.php");
require_once("FinanceModel.php");
require_once ("HeaderView.php");
session_start();
////////////////////////////Main Calls////////////////////////////////////////////////////////////////
  $hview =new HeaderView();
  $fview = new financeView();
  $fmodel = new financeModel();
  $hview->showView(null);
  $records=$fmodel->getRecords();
  $fview->showView($records);
if(isset($_POST['addf']))
{
 $verify = verify(1);
 if($verify)
 {
     $columns=array("Asset","price","qty");
     $dataArray=array($_POST['asset'],$_POST['price'],$_POST['qty']);
     $fmodel->AddRecord($dataArray,$columns);
     header("location:FinanceController.php");
 }
}
///////////////////////Functions///////////////////////////////////////////////////////////////////////
    function verify($verificationno)
    {
        require_once("FinanceModel.php");
        if($verificationno==1)
        {
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

    }
////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////commented out//////////////////////////////////////
//    private static $controller=null;
//    private function __construct()
//    {
//
//    }
//   function getInstance()
//    {
//        if (static::$controller == null) {
//            self::$controller = new financeController();
//        }
//        return self::$controller;
//    }
?>
