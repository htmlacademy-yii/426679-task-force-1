<?php

namespace Htmlacademy\models;

abstract class Action
{

    public function __construct($currentStatus = null, $performerId = null, $customerId = null)
    {
        $this->currentStatus = $currentStatus;
        $this->performerId = $performerId;
        $this->customerId = $customerId;
    }

    abstract protected function getTitle();

    abstract protected function getInternalName();

    abstract protected function getVerification(): bool;
}
