<?php

    namespace Htmlacademy\models;

    class ActionCansel extends Action {
        public function getTitle(): string
        {
            return 'Отказаться';
        }

        public function getInternalName(): string
        {
            return 'ACTION_CANCEL';
        }

        public function getVerification(): bool
        {
            return $this->performerId === $this->customerId;
        }
    }

?>