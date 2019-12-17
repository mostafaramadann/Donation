<?php

require_once("LogisticsModel.php");
require_once ("decorativeLogisticsClass.php");

$logMo = new LogisticsModel();

$logMoDec = new LogisticsModelDepartmentDecorator($logMo);

writeln("available departments:");
writeAr($logMoDec->showDepartment());

echo "<br/>";
echo "<br/>";

$LogMoDecAdd = new LogisticsModelDepartmentAddDecorator($logMoDec);

//$logMoDecAdd = new LogisticsModelDepartmentAddDecorator($logMoDec);

//$logMoDec->resetDepartment();


function writeln($line_in) {
    echo $line_in."<br/>";
}

function writeAr($array) {
    print_r($array);
    //foreach($array as $element) {
    //    echo $element, '<br>';
    //}
}

?>

    <html>

    <form method="post">
        <input id='tax' name='addDepInp'>
        <button type='submit' name='addDepBut'>Add Department</button>
    </form>

    </html>

<?php
if (isset($_POST['addDepBut'])) {
    if ($_POST['addDepInp'] != "") {
        $LogMoDecAdd->add($_POST['addDepInp']);
        writeAr($logMoDec->showDepartment());
    }
    else {
        writeln("enter a valid input");
    }
}
?>