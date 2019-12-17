<?php

require_once("FinanceModel.php");

$finMo = new financeModel();
$finMo->setPrice(10);

$finMoDec = new financeModelPriceDecorator($finMo);
writeln($finMoDec->showPrice());

$finMoDecTax = new financeModelPriceTaxesDecorator($finMoDec);
$finMoDecTax->taxesPrice(0.2);


$finMoDec->resetPrice();


function writeln($line_in) {
    echo $line_in."<br/>";
}

?>

<html>

<form method="post">
    <input id='tax' name='taxPerc'>
    <button type='submit' name='calTax'>Calc Tax</button>
</form>

</html>

<?php
if (isset($_POST['calTax'])) {
    if ($_POST['taxPerc'] != "") {
        $finMoDecTax = new financeModelPriceTaxesDecorator($finMoDec);
        $finMoDecTax->taxesPrice($_POST['taxPerc']);
        writeln($finMoDec->showPrice());
    }
    else {
        writeln("enter a valid percentage");
    }
}
?>