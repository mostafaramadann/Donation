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
    public static function UpdateUserProfile($u,$uname,$pass) {
    self::Require();
    Database::getInstance()::Connect();
    Database::getInstance()::ExecuteStatement("Update Users SET userName = '".$uname."', password = '".$pass."' WHERE userID ='" .$u->getID()."'");
    Database::getInstance()::CloseConnection();
}

    public static  function DeleteUserProfile($id) {
        self::Require();
    Database::getInstance()::Connect();
    Database::ExecuteStatement("Delete From donationhistory where Userid=".$id);
    Database::getInstance()::ExecuteStatement("Delete From Users Where userID=".$id);
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
            $u->getPassword()."','".
            $u->getBankAccountNo()."',".
            (int)$u->getUsertype().")");
        Database::getInstance()::CloseConnection();
}

    public static function UpdateUserTransactions($u,$DonationAmount,$DonationType) {
        self::Require();
        Database::getInstance()::Connect();
        Database::getInstance()::ExecuteStatement("INSERT INTO DonationHistory(DonationAmount,DonationType,Userid) VALUES ('".(int)$DonationAmount."','".
        $DonationType."','".$u->getID()."')");
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
        Database::getInstance()::ExecuteStatement("INSERT INTO ".$tablename."(".$columnstatement.") VALUES (".$datastatement.")" );
        Database::getInstance()::CloseConnection();
    }

}
?>
