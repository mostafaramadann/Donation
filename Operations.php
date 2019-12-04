<?php


class Operations
{
    private $operationtype;
    public function OperationMade($UserModel)
    {

    }

    public function getOperationtype()
    {
        return $this->operationtype;
    }
    public function setOperationtype($operationtype)
    {
        $this->operationtype = $operationtype;
    }
}