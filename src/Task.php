<?php

namespace HtmlAcademy;

    #Класс
    class Task {
        const ACTION_CANCEL = 'action_cancel'; // отменить
        const ACTION_MESSAGE = 'action_message'; //написать сообщение
        const ACTION_RESPOND = 'action_respond'; //откликнуться
        const ACTION_COMPLETE = 'action_complete'; //выполнено
        const ACTION_DECLINE = 'action_decline'; //отказаться

        const STATUS_NEW = 'new';
        const STATUS_CANCEL = 'cancel';
        const STATUS_WORK = 'work';
        const STATUS_PERFORMED = 'performed';
        const STATUS_FAILD = 'failed';

        public $currentStatus; //состояние
        public $performerId; //исполнитель
        public $customerId; //клиент

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

        #Конструктор
        public function __construct($currentStatus = null, $performerId = null, $customerId = null)
        {
            $this->currentStatus = $currentStatus;
            $this->performerId = $performerId;
            $this->customerId = $customerId;
        }

        public function getActionList (){
            $result = [];
            $status = $this->currentStatus;
            $statusActMap = [
                self::STATUS_NEW => [self::ACTION_CANCEL, self::ACTION_RESPOND],
                self::STATUS_WORK => [self::ACTION_COMPLETE, self::ACTION_CANCEL]
            ];
            switch ($status) {
                case self::STATUS_WORK:
                    return $result = $statusActMap[self::STATUS_WORK];
                case self::STATUS_NEW:
                    return $result = $statusActMap[self::STATUS_NEW];
                default:
                    return "Статус не установлен";
            }
        }

        public function getNextStatus ($action){
            $actionStatusMap = [
                self::ACTION_CANCEL => self::STATUS_CANCEL,
                self::ACTION_DECLINE => self::STATUS_FAILD,
                self::ACTION_COMPLETE => self::STATUS_PERFORMED
            ];
            switch ($action) {
                case self::ACTION_CANCEL:
                    return $result = $actionStatusMap[self::ACTION_CANCEL];
                case self::ACTION_DECLINE:
                    return $result = $actionStatusMap[self::ACTION_DECLINE];
                case self::ACTION_COMPLETE:
                    return $result =$actionStatusMap[self::ACTION_COMPLETE];
                default:
                    return "Действие не выбрано";
            }
        }
    }

?>
