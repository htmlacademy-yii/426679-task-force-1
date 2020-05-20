<?php
    #Класс
    class FormStatus {
        const ACTION_CANCEL = 'action_cancel'; //отказаться
        const ACTION_MESSAGE = 'action_message'; //написать сообщение
        const ACTION_RESPOND = 'action_respond'; //откликнуться
        const ACTION_FAILD = 'action_faild'; //провалено


        const STATUS_NEW = 'new';
        const STATUS_CANCEL = 'cancel';
        const STATUS_WORK = 'work';
        const STATUS_PERFORMED = 'performed';
        const STATUS_FAILD = 'failed';

        public $performerId; //исполнитель
        public $customerId; //клиент

        public $arrayStatus = [
            'new'       =>  'Новое',
            'cancel'    =>  'Отмененное',
            'work'      =>  'В работе',
            'performed' =>  'Выполнено',
            'failed'    =>  'Провалено'
        ];

        public $arrayAction = [
            'action_cancel'       =>  'Отказаться',
            'action_message'    =>  'Написать сообщение',
            'action_respond'      =>  'Откликнуться',
            'action_faild' =>  'Провалено'
        ];

        #Конструктор
        public function __construct($performerId, $customerId)
        {
            $this->performerId = $performerId;
            $this->customerId = $customerId;
        }
    }

?>
