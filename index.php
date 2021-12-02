<?php
declare(strict_types=1);
use Htmlacademy\models\Task;

require_once 'vendor/autoload.php';

//текущий пользователь
$idDoer = 2;
//id клиента 
$idCustomer = 3;
//id исполнителя
$idPerformer = 3;

$currentStatus = Task::STATUS_NEW;
$task = new Task($currentStatus, $idPerformer, $idCustomer, $idDoer);

$isTaskStatusAll           = $task->getStatusAll();
$isTaskActionsAll          = $task->getActionsAll();
$isPossibleActionsForUser  = $task->getActionsUser($currentStatus);
$isPossibleStatus          = $task->getPossibleStatus($currentStatus);

if ( $isPossibleActionsForUser ) var_dump($isPossibleActionsForUser->getTitle());
else var_dump('Для данного пользователя нет возможных действий');
