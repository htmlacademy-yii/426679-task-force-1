<?php

    namespace Htmlacademy\models;

    class ActionRespond extends Action {
        public function getTitle(): string
        {
            return 'ОТКЛИКНУТЬСЯ';
        }

        public function getInternalName(): string
        {
            return 'ACTION_RESPOND';
        }

        public function getVerification(): bool
        {
            return $this->performerId === $this->customerId;
        }
    }

?>