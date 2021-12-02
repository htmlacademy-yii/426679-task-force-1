<?php

    namespace Htmlacademy\models;

    class ActionComplete extends Action {
        public function getTitle(): string
        {
            return 'ВЫПОЛНЕНО';
        }

        public function getInternalName(): string
        {
            return 'ACTION_COMPLETE';
        }

        public function getVerification(): bool
        {
            return $this->performerId === $this->customerId;
        }
    }

?>