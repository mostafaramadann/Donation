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
public static function LoadUserProfileFromDatabase($UserName, $Password) {
        require_once("Database.php");
        require_once("UserModel.php");
        Database::getInstance()::Connect();
        $row = Database::getInstance()::ExecuteStatement("Select * from Users where UserName ="."'".$UserName."'"
                                                                    ."and Password = "."'".$Password."'");
        $ID = $row["userID"];
        $fname = $row["firstName"];
        $LastName = $row["lastName"];
        $Phone = $row["phoneNumber"];
        $Email = $row["email"];
        $password = $row["password"];
        $uname = $row["userName"];
        $baccount = $row["bankAccount"];
        $usertype =$row["userType"];

        $row = Database::getInstance()::ExecuteStatement("Select * from UserType where userTypeID ="."'".$usertype."'");
	$userTypeStr = $row["userTypeName"];

        $row = Database::getInstance()::ExecuteStatement("Select * from UserType_Links where userType="."'".$usertype."'");
	$UsertypeLink = $row["links"];

        $row = Database::getInstance()::ExecuteStatement("Select * from Links where linkID="."'".$UsertypeLink."'");
	$UsertypeLinkPath = $row["linkPath"];

        $ret = new UserModel($ID,$fname,$LastName,$Email,$Phone,$uname,$password,$baccount,$usertype);
	$ret->setUsertypeStr($userTypeStr);
	$ret->setUsertypeLinkPath($UsertypeLinkPath);
        Database::CloseConnection();
        return $ret;
    }
}
?>
