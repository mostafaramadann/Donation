<?php
class UserModelStringDecorator {
    protected $userModel;
    protected $string;
    public function __construct(UserModel $userModel_in) {
        $this->userModel = $userModel_in;
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

class UserModelStringAddDecorator extends UserModelStringDecorator {
    private $btd;
    public function __construct(UserModelStringDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function add($string_in) {
        $this->btd->string = $string_in;
    }
}

?>