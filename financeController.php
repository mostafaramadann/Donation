<?php
require_once("financeView.php");
require_once ("financeModel.php");
////////////////////////////Main Calls////////////////////////////////////////////////////////////////
  $fview = new financeView();
  $records=financeModel::getRecords();
  $fview::showView($records);
if(isset($_POST['add']))
{
    verify(1);
    header("location:financeController.php");
}
///////////////////////Functions///////////////////////////////////////////////////////////////////////
    function verify($verificationno)
    {
        require_once ("financeModel.php");
        if($verificationno==1)
        {
            if($_POST['asset']!=""
            && preg_match("#^[^\d\s]+$#",$_POST['asset'])
            && $_POST['price']!=""
            && preg_match("#[0-9]+#",$_POST['price'])
            && $_POST['qty']!=""
            &&preg_match("#[0-9]+#",$_POST['qty']))
            {
                $columns=array($_POST['asset'],$_POST['price'],$_POST['qty']);
                $dataArray=array("Asset","price","qty");
                financeModel::AddRecord($dataArray,$columns);
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
