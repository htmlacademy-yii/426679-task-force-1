<?php

namespace Htmlacademy\models;

    class Task {

        //Действия
        public const ACTION_CANCEL = 'ОТМЕНЕНО'; // отменить
        public const ACTION_RESPOND = 'ОТКЛИКНУТЬСЯ'; //откликнуться
        public const ACTION_COMPLETE = 'ВЫПОЛНЕНО'; //выполнено
        public const ACTION_DECLINE = 'ОТКАЗАТЬСЯ'; //отказаться

        //Статус
        public const STATUS_NEW = 'НОВЫЙ';
        public const STATUS_CANCEL = 'ОТМЕНЕНО';
        public const STATUS_WORK = 'В РАБОТЕ';
        public const STATUS_COMPLETE = 'ВЫПОЛНЕНО';
        public const STATUS_FAILD = 'ПРОВАЛЕНО';

        public const ROLE_CUSTOMER = 'КЛИЕНТ';
        public const ROLE_PERFORMER = 'ИСПОЛНИТЕЛЬ';

        public $nextAction = [
            self::STATUS_NEW => [
                self::ROLE_PERFORMER => ActionRespond::class,
                self::ROLE_CUSTOMER  => ActionCansel::class
            ],
            self::STATUS_WORK => [
                self::ROLE_PERFORMER => ActionDecline::class,
                self::ROLE_CUSTOMER  => ActionComplete::class
            ]
        ];

        /**
        * Task constructor.
        * Конструктор создает экземпляр класса, в который обязательно нужно передать текущий стутус, id-исполнителя и id-заказчика, 
        */
        public function __construct($currentStatus = null, $performerId = null, $customerId = null, $idDoer = null)
        {
            $this->currentStatus = $currentStatus;
            $this->performerId = $performerId;
            $this->customerId = $customerId;
            $this->idDoer = $idDoer;
        }

        //Проверяем id исполнителя с id клиента
        private function isClientOrDoer(): bool
        {
            return $this->performerId === $this->customerId or $this->performerId === $this->idDoer;
        }

        public function getStatusAll(): array
        {
            return [
                'new' => self::STATUS_NEW,
                'work' => self::STATUS_WORK,
                'cancelled' => self::STATUS_CANCEL,
                'done' => self::STATUS_COMPLETE,
                'failed' => self::STATUS_FAILD,
            ];
        }

        public function getActionsAll(): array
        {
            return [
                'cancel' => self::ACTION_CANCEL,
                'respond' => self::ACTION_RESPOND,
                'done' => self::ACTION_COMPLETE,
                'refuse' => self::ACTION_DECLINE,
            ];
        }

        public function getPossibleStatus(string $currentStatus): array
        {
        switch ($currentStatus) {
            case self::STATUS_NEW:
                return ['work' => self::STATUS_WORK, 'canceled' => self::STATUS_CANCEL];
            case self::STATUS_WORK:
                return ['done' => self::STATUS_COMPLETE, 'failed' => self::STATUS_FAILD];
        }

        return [];
        }

        public function getActionsUser(string $currentStatus): ?Action
        {
        if ($this->isClientOrDoer()) {
            $role = $this->performerId === $this->customerId ? self::ROLE_CUSTOMER : self::ROLE_PERFORMER;
            return new $this->nextAction[$currentStatus][$role]($this->idDoer, $this->customerId, $this->performerId);
        }
        return null;
        }
    }
