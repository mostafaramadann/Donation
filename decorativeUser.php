<?php

require_once("UserModel.php");
require_once("decorativeUserClass.php");

$useMo = new UserModel(0,"","","","","","","",0, "", "");
$useMoDec = new UserModelStringDecorator($useMo);


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
        $useMoDecAdd = new UserModelStringAddDecorator($useMoDec);
        $useMoDecAdd->add($_POST['strVal']);
        writeln($useMoDec->showString());
    }
    else {
        writeln("enter a valid percentage");
    }
}
?>