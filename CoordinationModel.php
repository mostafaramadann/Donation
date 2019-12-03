<?php
class CoordinationModel
{
    private  $recid = array();
    private  $event= array();
    private  $date= array();
    private  $description = array();
    public function __construct()
    {

    }

    public function AddRecord($dataArray,$ColumnsArray)
    {
        require_once ("Saver.php");
        Saver::GetInstance()::addRecord("coordination",$dataArray,$ColumnsArray);
    }
    public function getRecords()
    {
        require_once ("Loader.php");
        $data=Loader::GetInstance()::LoadTableContentFromDatabase('coordination');
        $recid= array();
        $event =array();
        $date=array();
        $description = array();
        $i=0;
        while($i<count($data))
        {
            array_push($recid,$data[$i]['recid']);
            array_push($event,$data[$i]['Event']);
            array_push($date,$data[$i]['Date']);
            array_push($description,$data[$i]['Description']);
            $i++;
        }
        $this->setRecid($recid);
        $this->setEvent($event);
        $this->setDate($date);
        $this->setDescription($description);
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
    public function getEvent()
    {
        return $this->event;
    }
    public function setEvent($event)
    {
        $this->event = $event;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }


}
?>
