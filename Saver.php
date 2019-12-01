<?php
class Saver {

    private function __construct()
    {}
    private static $saver = null;
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
    Database::getInstance()::ExecuteStatement("Update Users SET UserName = '"+$uname+"', Password = '"+$pass+"' WHERE User_ID = '"+$u->getID()+"'",1);
    Database::getInstance()::CloseConnection();
}

    public static  function DeleteUserProfile($id) {
        self::Require();
    Database::getInstance()::Connect();
    Database::getInstance()::ExecuteStatement("Delete From Users Where User_ID = '".$id."'",1);
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
        Database::getInstance()::ExecuteStatement("INSERT INTO DonationHistory(DonationAmount,DonationType,Userid) VALUES ('".$DonationAmount."','".
        $DonationType."','".$u->getID()."')");
        Database::getInstance()::CloseConnection();
    }

}
?>
