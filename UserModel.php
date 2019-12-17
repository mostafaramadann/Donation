<?php
require_once ("Loader.php");
require_once ("Saver.php");
class UserModel
{
    private  $ID;
    private  $FirstName;
    private  $LastName;
    private  $Email;
    private  $PhoneNumber;
    private  $Username;
    private  $Password;
    private  $BankAccountNo;
    private  $Usertype;
    private  $UsertypeStr;
    private  $UsertypeLinkPath;
    private  $otherlinks = array();
    private  $Donatationstrategy;
    public static function MakeObject()
    {
        return new UserModel(0,"","","","","","","",0, "", "");
    }
    public function __construct($ID,$firstName, $lastName, $email, $phoneNumber, $username, $password, $bankAccountNo, $usertype)
    {
        $this->ID=$ID;
        $this->FirstName = $firstName;
        $this->LastName = $lastName;
        $this->Email = $email;
        $this->PhoneNumber = $phoneNumber;
        $this->Username = $username;
        $this->Password = $password;
        $this->BankAccountNo = $bankAccountNo;
        $this->Usertype=$usertype;

	//$this->UsertypeStr = $UsertypeStr;
	//$this->UsertypeLink = $UsertypeLink;
    }

    public function getOtherlinks(): array
    {
        return $this->otherlinks;
    }

    public function setOtherlinks(array $otherlinks)
    {
        $this->otherlinks = $otherlinks;
    }

    private function Load($u)
    {
        $this->ID=$u->ID;
        $this->FirstName = $u->FirstName;
        $this->LastName = $u->LastName;
        $this->Email = $u->Email;
        $this->PhoneNumber = $u->PhoneNumber;
        $this->Username = $u->Username;
        $this->Password = $u->Password;
        $this->BankAccountNo = $u->BankAccountNo;
        $this->Usertype=$u->Usertype;
        $this->UsertypeStr = $u->UsertypeStr;
        $this->UsertypeLinkPath = $u->UsertypeLinkPath;
        $this->otherlinks=$u->otherlinks;
       // $this->Donatationstrategy=new cashDonate();
    }
    public function Retrieveuser($username,$password,$id,$option)
    {
        $u=Loader::GetInstance()::LoadUserProfileFromDatabase($username,$password,$id,$option);
        $this->Load($u);
    }
    public function AddUser()
    {
        Saver::GetInstance()::AddUserProfile($this);
//        $this->Retrieveuser($this->getUsername(),$this->getPassword(),$this->getID(),1);
    }
    public function getUsertype()
    {
        return $this->Usertype;
    }
    public function setUsertype($usertype)
    {
        $this->Usertype=$usertype;
    }

    public function getUsertypeStr()
    {
	return $this->UsertypeStr;
    }
    public function setUsertypeStr($str)
    {
	$this->UsertypeStr = $str;
    }

    public function getUsertypeLinkPath()
    {
	return $this->UsertypeLinkPath;
    }
    public function setUsertypeLinkPath($lin)
    {
	$this->UsertypeLinkPath = $lin;
    }

    public function Deleteuserprofile()
    {
        Saver::GetInstance()::DeleteUserProfile($this);
    }
    public function UpdateUserTransaction($donationamount,$donationtype)
    {
        Saver::GetInstance()::UpdateUserTransactions($this,$donationamount,$donationtype);
    }
    public  function getBankAccountNo()
    {
        return $this->BankAccountNo;
    }

    public  function setBankAccountNo($bankAccountNo)
    {
        $this->BankAccountNo = $bankAccountNo;
    }

    public  function getID()
    {
        return $this->ID;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public  function getUsername()
    {
        return $this->Username;
    }

    public function getLastname()
    {
        return $this->LastName;
    }
    public function Donate($donationAmount,$donationtype)
    {
        Saver::GetInstance()::UpdateUserTransactions($this,(int)$donationAmount,$donationtype);
    }

    public  function getFirstname()
    {
        return $this->FirstName;
    }

    public  function getEmail()
    {
        return $this->Email;
    }

    public function getPhone()
    {
        return $this->PhoneNumber;
    }

    public function setFirstName($FirstName)
    {
        if ($FirstName != '' && preg_match("#[A-Za-z]+#", $FirstName))
            $this->FirstName = $FirstName;

    }

    public function setLastName($LastName)
    {
        if ($LastName != '' && preg_match("#[A-Za-z]+#", $LastName))
            $this->LastName = $LastName;
    }

    public function setEmail($Email)
    {
        if ($Email != '')
            $this->Email = $Email;
    }

    public function setPhoneNumber($PhoneNumber)
    {
        if ($PhoneNumber != '' && preg_match("#[0-9]+#", $PhoneNumber))
            $this->PhoneNumber = $PhoneNumber;
    }

    public function setPassword($password)
    {
        if ($password != '' && !preg_match("(0123456789|123456789|012345678)", $password) && strlen($password) > 7)
            $this->Password = $password;
    }

    public function setID($ID)
    {
        if ($ID > 0)
            $this->ID = $ID;
    }

    public function setUsername($Username)
    {
        if ($Username != '')
            $this->Username = $Username;
    }
}
?>
