<?php

    namespace Htmlacademy\models;

    abstract class Action {

        public function __construct($currentStatus = null, $performerId = null, $customerId = null, $idDoer = null)
        {
            $this->currentStatus = $currentStatus;
            $this->performerId = $performerId;
            $this->customerId = $customerId;
            $this->idDoer = $idDoer;
        }

        abstract protected function getTitle();

        abstract protected function getInternalName();

        abstract protected function getVerification(): bool;
    }

    


?>