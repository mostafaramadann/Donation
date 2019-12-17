<?php

require_once("HRModel.php");
require_once("decorativeHRClass.php");

$hrMo = new HRModel();
$hrMoDec = new HRModelStringDecorator($hrMo);


function writeln($line_in) {
    echo $line_in."<br/>";
}

?>

    <html>

    <form method="post">
        <input id='tax' name='strVal'>
        <button type='submit' name='addStrBut'>Add String</button>
    </form>

    </html>

<?php
if (isset($_POST['addStrBut'])) {
    if ($_POST['strVal'] != "") {
        $hrMoDecAdd = new HRModelStringAddDecorator($hrMoDec);
        $hrMoDecAdd->add($_POST['strVal']);
        writeln($hrMoDec->showString());
    }
    else {
        writeln("enter a valid percentage");
    }
}
?>