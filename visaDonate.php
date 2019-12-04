<?php
include("HeaderView.php");
class VisaDonate implements IPay
{
    private $creditcardno;
    private $CVC;
    private $ExpireMonth;
    private $expireYear;
    function pay($amount, $paymentMethod)
    {
        // TODO: Implement pay() method.
    }

    public function getCreditcardno()
    {
        return $this->creditcardno;
    }
    public function setCreditcardno($creditcardno)
    {
        $this->creditcardno = $creditcardno;
    }

    public function getCVC()
    {
        return $this->CVC;
    }

    public function setCVC($CVC)
    {
        if(strlen($CVC)==3)
        $this->CVC = $CVC;
    }
    public function getExpireMonth()
    {
        return $this->ExpireMonth;
    }

    public function setExpireMonth($ExpireMonth)
    {
        $this->ExpireMonth = $ExpireMonth;
    }

    public function getExpireYear()
    {
        return $this->expireYear;
    }
    public function setExpireYear($expireYear)
    {
        $this->expireYear = $expireYear;
    }

}
?>