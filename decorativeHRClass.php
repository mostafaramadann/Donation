<?php
class HRModelStringDecorator {
    protected $HRModel;
    protected $string;
    public function __construct(HRModel $HRModel_in) {
        $this->HRModel = $HRModel_in;
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

class HRModelStringAddDecorator extends HRModelStringDecorator {
    private $btd;
    public function __construct(HRModelStringDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function add($string_in) {
        $this->btd->string = $string_in;
    }
}

?>