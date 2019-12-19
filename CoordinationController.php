<?php
require_once("CoordinationModel.php");
require_once ("CoordinationView.php");
require_once ("UserModel.php");
require_once ("HeaderView.php");
///check if user logged in and with usertype
 session_start();
$um = UserModel::MakeObject();
if(isset($_SESSION['loggedin']))
    $um->Retrieveuser(null,null,$_SESSION['id'],2);
$hview =new HeaderView();
$hview->showView($um->getOtherlinks());
$coordinationmodel = new CoordinationModel();
$records=$coordinationmodel->getRecords();
$cooview = new CoordinationView();
$cooview->showView($records);
if(isset($_POST["addc"]))
{
    $verify=verify();
    if($verify==true)
    {
        $columns = array("Event", "Date", "Description");
        $dataArray = array($_POST['evnt'], $_POST['date'], $_POST['description']);
        $coordinationmodel->AddRecord($dataArray, $columns);
        header("CoordinationController"); //Refresh records
    }
}
if(isset($_POST['delc']))
{
    if($_POST['recid']!=""&&(int)$_POST['recid']>=0)
    {
        Saver::DeleteRecordFromtable($_POST['recid'],"coordination");
    }
}
function verify()
{
    require_once("FinanceModel.php");
        if ($_POST['evnt'] != ""
            && preg_match("#[\w]+#", $_POST['evnt'])
            && $_POST['date'] != ""
            && preg_match("#([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))#", $_POST['date'])
            && $_POST['description'] != ""
            && preg_match("#[\w\W]+#", $_POST['description'])) {
        return true;
        }
        return false;

}
?>