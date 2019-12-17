<?php
require_once ("IPay.php");
class cashDonate implements IPay
{
    private $amount;
    public $text="Cash";
    function pay($amount)
    {
        $this->amount=$amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

}
?>