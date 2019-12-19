<?php
class Saver {
private static $saver = null;

    private function __construct()
    {}
    public static function GetInstance(){
    if(self::$saver==null)
        return self::$saver=new Saver();
    else
    return null;
    }
    public static function Require()
    {
        require_once("Database.php");
        require_once("UserModel.php");
    }
    public static function DeleteRecordFromtable($id,$table)
    {
        require_once ("Database.php");
        Database::getInstance()::Connect();
        Database::ExecuteStatement("Delete from ".$table." where recid=".$id,false);
        Database::CloseConnection();

    }
    public static function UpdateUserProfile($u,$uname,$pass,$notification) {
    self::Require();
    Database::getInstance()::Connect();
    Database::getInstance()::ExecuteStatement("Update Users SET  userName = '".$uname."', password = '".sha1($pass)."' WHERE userID =" .$u->getID(),false);
    Database::getInstance()::CloseConnection();
}
public static function updateNotification($id,$notification)
{
    Database::getInstance()::Connect();
    echo "Connected";
    Database::getInstance()::ExecuteStatement("Update Users SET notification =".$notification." Where UserID =".$id);
    Database::CloseConnection();
}

    public static  function DeleteUserProfile($id) {
        self::Require();
    Database::getInstance()::Connect();
    Database::ExecuteStatement("Delete From donationhistory where Userid=".$id,false);
    Database::getInstance()::ExecuteStatement("Delete From Users Where userID=".$id,false);
    Database::getInstance()::CloseConnection();
}
    public static function AddUserProfile($u) {
        self::Require();
        Database::getInstance()::Connect();
        Database::getInstance()::ExecuteStatement("INSERT INTO Users (FirstName,LastName,Email,PhoneNumber,UserName,Password,BankAccount,userType) VALUES(".
            "'".$u->getFirstname()."','".
            $u->GetLastname()."','".
            $u->getEmail()."','".
            $u->getPhone()."','".
            $u->getUsername()."','".
            sha1($u->getPassword())."','".
            $u->getBankAccountNo()."',".
            (int)$u->getUsertype().")",false);
        Database::getInstance()::CloseConnection();
}

    public static function UpdateUserTransactions($u,$DonationAmount,$DonationType) {
        self::Require();
        Database::getInstance()::Connect();
        Database::getInstance()::ExecuteStatement("INSERT INTO DonationHistory(DonationAmount,DonationType,Userid) VALUES ('".(int)$DonationAmount."','".
        $DonationType."','".$u->getID()."')",false);
        Database::getInstance()::CloseConnection();
    }
    public static function addRecord($tablename,$dataArray,$columnNamesArray)
    {
        self::Require();
        $datastatement="";
        $columnstatement="";
        $i=0;
        while($i<count($columnNamesArray))
        {
            $columnstatement.=$columnNamesArray[$i];
            if($i+1!=count($columnNamesArray))
            {
                $columnstatement.=",";
            }
            $i++;
        }
        $i=0;
        while($i<count($dataArray))
        {
               $datastatement.="'".$dataArray[$i]."'";
               if($i+1!=count($dataArray))
               {
                   $datastatement.=",";
               }
                $i++;


        }
//        echo $columnstatement;
//        echo $datastatement;
        Database::getInstance()::Connect();
        Database::getInstance()::ExecuteStatement("INSERT INTO ".$tablename."(".$columnstatement.") VALUES (".$datastatement.")",false );
        Database::getInstance()::CloseConnection();
    }

}
?>
