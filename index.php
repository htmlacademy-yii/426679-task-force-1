<?php

use Htmlacademy\models\Task;

require_once 'vendor/autoload.php';


$idCustomer = 2;
$idPerformer = 1;
$currentStatus = Task::STATUS_WORK;
$task = new Task($currentStatus, $idPerformer, $idCustomer);
$isTaskStatusAll        = $task->arrayStatus;



if($task->getNextStatus('action_cancel') == Task::STATUS_CANCEL){
    echo 'Следующий статус' . ' ' . $task->getNextStatus('action_cancel');
}

if($task->getNextStatus(Task::STATUS_NEW) == Task::STATUS_CANCEL){
    echo 'Следующий статус' . ' ' . $task->getNextStatus('action_cancel');
}

echo 'Доступные действия для заказчика:';
echo '<pre>';
var_dump($task->getActionList());
echo '</pre>';
