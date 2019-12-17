<?php
class LogisticsModelDepartmentDecorator {
    protected $logisticsModel;
    protected $department = array();
    public function __construct(LogisticsModel $LogisticsModel_in) {
    $this->logisticsModel = $LogisticsModel_in;
    $this->resetDepartment();
}
//doing this so original object is not altered
function resetDepartment() {
    reset($this->department);
}
function showDepartment() {
    return $this->department;
}
}

class LogisticsModelDepartmentAddDecorator extends LogisticsModelDepartmentDecorator {
    private $btd;
    public function __construct(LogisticsModelDepartmentDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function add($deparment_in) {
        array_push($this->btd->department, $deparment_in);
    }
}

?>