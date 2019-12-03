<?php
class HRModel
{
    private $recid;
    private $name;
    private $dateofjoin;
    private $role;

    public function __construct()
    {

    }
    public function AddRecord($dataArray,$ColumnsArray)
    {
        require_once ("Saver.php");
        Saver::GetInstance()::addRecord("humanresources",$dataArray,$ColumnsArray);
    }
    public function getRecords()
    {
        require_once ("Loader.php");
        $data=Loader::GetInstance()::LoadTableContentFromDatabase('humanresources');
        $recid= array();
        $Name =array();
        $Date=array();
        $Role=array();
        $i=0;
        while($i<count($data)) {
            array_push($recid, $data[$i]['recid']);
            array_push($Name, $data[$i]['Name']);
            array_push($Date, $data[$i]['DateofJoin']);
            array_push($Role, $data[$i]['Role']);
            $i++;
        }
        $this->setRecid($recid);
        $this->setName($Name);
        $this->setDateofjoin($Date);
        $this->setRole($Role);
        return $data;
    }
    public function getRecid()
    {
        return $this->recid;
    }
    public function setRecid($recid)
    {
        $this->recid = $recid;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDateofjoin()
    {
        return $this->dateofjoin;
    }

    public function setDateofjoin($dateofjoin)
    {
        $this->dateofjoin = $dateofjoin;
    }
    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
}
?>
