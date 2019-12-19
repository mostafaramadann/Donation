<?php
require_once ("subject.php");
class DonationModel extends subject
{


    private $Observers = array();
    private $DonationStrategy;

    public function __construct()
    {

    }
    public function getDonationStrategy()
    {
        return $this->DonationStrategy;
    }
    public function setDonationStrategy(IPay $DonationStrategy)
    {
        if($DonationStrategy!=null) {
            $this->DonationStrategy = $DonationStrategy;
        }
    }

    public function attach(Observer $observer)
    {
        array_push($this->Observers,$observer);
    }


    public function notify()
    {
       for($i=0;$i<count($this->Observers);$i++)
       {
           $this->Observers[$i]->update($this);
       }
    }
    public function notifyWithLastDonor()
    {
      $this->setAmount( $this->DonationStrategy->getAmount);
        $this->notify();
    }
}
?>