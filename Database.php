<?php
class Database {

    private static $conn;
    private static $Databaseinstance=null;
    public static function getInstance()
    {
        if(self::$Databaseinstance==null)
        {
            self::$Databaseinstance=new Database();
        }
        return self::$Databaseinstance;
    }
    private function __construct()
    {}
    public static function Connect()
    {
        self::$conn = new mysqli("localhost", "root", "","db");
        if(self::$conn->connect_errno)
            echo "Connection Error.";
        else
            echo "Database Connection Successfully.";

    }
    public static function CloseConnection()
    {
        if(self::$conn!=null)
        self::$conn->close();


    }
public static function getConnection()
{
    return self::$conn;
}
    public static function ExecuteStatement($sstatement) {
//        require_once("UserModel.php");
        echo $sstatement;
        $result = self::$conn->query($sstatement) or die(self::$conn->connect_errno);
        $rowarray = array();
        while($row= mysqli_fetch_array($result)) {
            array_push($rowarray,$row);
        }
        return $rowarray;

    }
}
?>