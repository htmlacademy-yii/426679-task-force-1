<?php
    #Класс
    class FormStatus {
        const STATUS_NEW = 'new';
        const STATUS_CANCEL = 'cancel';
        const STATUS_WORK = 'work';
        const STATUS_PERFORMED = 'performed';
        const STATUS_FAILD = 'failed';

        #Публичный метод возврата карты статуса
        public function cardStatus() {
            $arrayStatus = [
                'new'       =>  'Новое',
                'cancel'    =>  'Отмененное',
                'work'      =>  'В работе',
                'performed' =>  'Выполнено',
                'failed'    =>  'Провалено'
            ];

            return null;
        }
    }

    
?>