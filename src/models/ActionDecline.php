<?php

    namespace Htmlacademy\models;

    class ActionDecline extends Action
    {
        public function getTitle(): string
        {
            return 'ОТКАЗАТЬСЯ';
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
