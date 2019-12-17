<?php
class CoordinationModelStringDecorator {
    protected $coordinationModel;
    protected $string;
    public function __construct(CoordinationModel $coordinationModel_in) {
        $this->coordinationModel = $coordinationModel_in;
        $this->resetString();
    }
//doing this so original object is not altered
    function resetString() {
        $this->string = "";
    }
    function showString() {
        return $this->string;
    }
}

class CoordinationModelStringAddDecorator extends CoordinationModelStringDecorator {
    private $btd;
    public function __construct(CoordinationModelStringDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function add($string_in) {
        $this->btd->string = $string_in;
    }
}

?>