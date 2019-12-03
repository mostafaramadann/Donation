<?php
require_once ("HeaderView.php");
require_once ("UserModel.php");
require_once ("LogisticsModel.php");
require_once ("LogisticsView.php");
$hview =new HeaderView();
$um = UserModel::MakeObject();
if(isset($_SESSION['loggedin']))
    $um->Retrieveuser(null,null,$_SESSION['id'],2);
$lview = new LogisticsView();
$lmodel = new LogisticsModel();
$hview->showView($um->getOtherlinks());
$records=$lmodel->getRecords();
$lview->showView($records);
if(isset($_POST['addl'])) {
    $verify = verify(1);
    if ($verify) {
        $columns = array("Order_name", "Status", "Details");
        $dataArray = array($_POST['order'], $_POST['status'], $_POST['details']);
        $lmodel->AddRecord($dataArray, $columns);
        header("location:LogisticsController.php");
    }
}
/////////////////////////Verify//////////////////////////////////////////////////////////
function verify($verificationno)
{
    require_once("FinanceModel.php");
    if($verificationno==1)
    {
        if($_POST['order']!=""
            && $_POST['status']!=""
            && $_POST['details']!="")
        {
            return true;
        }
    }

}
?>