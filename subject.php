<?php
abstract class subject
{
        private $lastDonationby="";
        private $amount;
     abstract function attach(Observer $observer);
     abstract function notify();

    public function getLastDonationby(): string
    {
        return $this->lastDonationby;
    }


    public function setLastDonationby(string $lastDonationby)
    {
        if($lastDonationby!="")
        $this->lastDonationby = $lastDonationby;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        if($amount>0)
        $this->amount = $amount;
    }

}