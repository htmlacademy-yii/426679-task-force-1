<?php

namespace Htmlacademy\models;

    class Task {

        //Действия
        const ACTION_CANCEL = 'action_cancel'; // отменить
        const ACTION_MESSAGE = 'action_message'; //написать сообщение
        const ACTION_RESPOND = 'action_respond'; //откликнуться
        const ACTION_COMPLETE = 'action_complete'; //выполнено
        const ACTION_DECLINE = 'action_decline'; //отказаться

        //Статус
        const STATUS_NEW = 'new';
        const STATUS_CANCEL = 'cancel';
        const STATUS_WORK = 'work';
        const STATUS_PERFORMED = 'performed';
        const STATUS_FAILD = 'failed';

        private $currentStatus; //состояние
        private $performerId; //исполнитель
        private $customerId; //клиент


        public $arrayStatus = [
            self::STATUS_NEW  =>  'Новое',
            self::STATUS_CANCEL =>  'Отмененное',
            self::STATUS_WORK =>  'В работе',
            self::STATUS_PERFORMED =>  'Выполнено',
            self::STATUS_FAILD    =>  'Провалено'
        ];

        public $arrayAction = [
            self::ACTION_CANCEL =>  'Отказаться',
            self::ACTION_DECLINE =>  'Написать сообщение',
            self::ACTION_RESPOND =>  'Откликнуться',
            self::ACTION_COMPLETE => "Выполнено"
        ];

        /**
        * Task constructor.
        * Конструктор создает экземпляр класса, в который обязательно нужно передать текущий стутус, id-исполнителя и id-заказчика
        * Статус задания при это автоматически переходит в "новое"
        * @param string $name наименование задания
        * @param int $clientId идентификатор заказчика
        */
        public function __construct($currentStatus = null, $performerId = null, $customerId = null)
        {
            $this->currentStatus = $currentStatus;
            $this->performerId = $performerId;
            $this->customerId = $customerId;
        }

        public function getActionList()
        {
            $status = $this->currentStatus;
            $statusActMap = [
                self::STATUS_NEW => [self::ACTION_CANCEL, self::ACTION_RESPOND],
                self::STATUS_WORK => [self::ACTION_COMPLETE, self::ACTION_CANCEL]
            ];
            return $statusActMap[$status] ?? 'Статус не установлен';
        }

        public function getNextStatus($action)
        {
            $actionStatusMap = [
                self::ACTION_CANCEL => self::STATUS_CANCEL,
                self::ACTION_DECLINE => self::STATUS_FAILD,
                self::ACTION_COMPLETE => self::STATUS_PERFORMED
            ];
            return $actionStatusMap[$action] ?? 'Действие не выбрано';
        }
    }
