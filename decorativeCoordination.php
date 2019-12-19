<?php
require_once("CoordinationModel.php");
require_once("decorativeCoordinationClass.php");
$coorMo = new CoordinationModel();
$coorMoDec = new CoordinationModelStringDecorator($coorMo);
writeln($coorMoDec->showString());
function writeln($line_in) {
    echo $line_in."<br/>";
}

?>
​
    <html>
​
    <form method="post">
        <input id='tax' name='strVal'>
        <button type='submit' name='addStr'>Add String</button>
    </form>
​
    </html>
​
<?php
if (isset($_POST['addStr'])) {
    if ($_POST['strVal'] != "") {
        $coorMoDecAdd = new CoordinationModelStringAddDecorator($coorMoDec);
        $coorMoDecAdd->add($_POST['strVal']);
        writeln($coorMoDec->showString());
    }
    else {
        writeln("enter a valid percentage");
    }
}
?>