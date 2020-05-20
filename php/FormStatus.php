<?php
    #Класс
    class FormStatus {
        const STATUS_NEW = 'new';
        const STATUS_CANCEL = 'cancel';
        const STATUS_WORK = 'work';
        const STATUS_PERFORMED = 'performed';
        const STATUS_FAILD = 'failed';

        public $performerId;
        public $customerId;

        public $arrayStatus = [
            'new'       =>  'Новое',
            'cancel'    =>  'Отмененное',
            'work'      =>  'В работе',
            'performed' =>  'Выполнено',
            'failed'    =>  'Провалено'
        ];

        #Конструктор
        public function __construct($performerId, $customerId)
        {
            $this->performerId = $performerId;
            $this->customerId = $customerId;
        }
    }


?>
