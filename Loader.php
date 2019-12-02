<?php
class Loader {

    private static $L = null;
    private function __consrtuct()
{

}
    public static function GetInstance()
    {
        if(self::$L==null)
        {
            self::$L = new Loader();
        }
        return self::$L;
    }
public static function LoadTableContentFromDatabase($table)
{
    require_once ("Database.php");
    Database::getInstance()::Connect();
    $tabledata=Database::ExecuteStatement("select * from ".$table);
    Database::CloseConnection();
    return $tabledata;
}
public static function LoadUserProfileFromDatabase($UserName, $Password) {
        require_once("Database.php");
        require_once("UserModel.php");
        Database::getInstance()::Connect();
        $row = Database::getInstance()::ExecuteStatement("Select * from Users where UserName ="."'".$UserName."'"
                                                                    ."and Password = "."'".$Password."'");
        $ID = $row[0]["userID"];
        $fname = $row[0]["firstName"];
        $LastName = $row[0]["lastName"];
        $Phone = $row[0]["phoneNumber"];
        $Email = $row[0]["email"];
        $password = $row[0]["password"];
        $uname = $row[0]["userName"];
        $baccount = $row[0]["bankAccount"];
        $usertype =$row[0]["userType"];

        $row = Database::getInstance()::ExecuteStatement("Select * from UserType where userTypeID ="."'".$usertype."'");
	$userTypeStr = $row[0]["userTypeName"];

        $row = Database::getInstance()::ExecuteStatement("Select * from UserType_Links where userType="."'".$usertype."'");
	$UsertypeLink = $row[0]["links"];

        $row = Database::getInstance()::ExecuteStatement("Select * from Links where linkID="."'".$UsertypeLink."'");
	$UsertypeLinkPath = $row[0]["linkPath"];

        $ret = new UserModel($ID,$fname,$LastName,$Email,$Phone,$uname,$password,$baccount,$usertype);
	    $ret->setUsertypeStr($userTypeStr);
	    $ret->setUsertypeLinkPath($UsertypeLinkPath);
        Database::CloseConnection();
        return $ret;
    }
}
?>
