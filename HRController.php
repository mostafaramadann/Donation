<?php
session_start();
require_once("HeaderView.php");
require_once("UserModel.php");
require_once("HRModel.php");
require_once("HrView.php");
$hview = new HeaderView();
$um = UserModel::MakeObject();
if (isset($_SESSION['loggedin']))
$um->Retrieveuser(null, null, $_SESSION['id'], 2);
$hrview = new HRView();
$hmodel = new HRModel();
$hview->showView($um->getOtherlinks());
$records = $hmodel->getRecords();
$hrview->showView($records);
if (isset($_POST['addh'])) {
    $verify = verify(1);
    if ($verify) {
        $columns = array("Name", "DateofJoin", "Role");
        $dataArray = array($_POST['Name'], $_POST['DateofJoin'], $_POST['Role']);
        $hmodel->AddRecord($dataArray, $columns);
        header("location:HRController.php");
    }
}
/////////////////////////Verify//////////////////////////////////////////////////////////
function verify($verificationno)
{
    require_once("HRModel.php");
    if ($verificationno == 1) {
        if ($_POST['Name'] != ""
            && $_POST['Role'] != ""
            && $_POST['DateofJoin'] != "") {
            return true;
        }
    }

}
?>
