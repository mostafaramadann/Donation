<?php
include("HeaderView.php");
class cashDonate implements IPay
{
    private $amount;

    function pay($amount, $paymentMethod)
    {
        // TODO: Implement pay() method.
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
?>