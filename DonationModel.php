<?php
class DonationModel
{
    private $DonationStrategy;
    private $uid;
    public function __construct()
    {

    }
    public function getDonationStrategy()
    {
        return $this->DonationStrategy;
    }

    public function setDonationStrategy($DonationStrategy)
    {
        if($DonationStrategy!=null)
        $this->DonationStrategy = $DonationStrategy;
        $this->updateDonationHistory();
    }
    private function updateDonationHistory()
    {
        $u = UserModel::MakeObject();
        $u->Retrieveuser(null,null,$this->uid,2);
        echo (int)$this->DonationStrategy->getAmount();
        $u->Donate((int)$this->DonationStrategy->getAmount(),$this->DonationStrategy->text);
    }
    public function getUid()
    {
        return $this->uid;
    }
    public function setUid($uid)
    {
        if($this->uid>=0)
        $this->uid = $uid;
    }
}
?>