<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use Htmlacademy\models\Task;
use Htmlacademy\exceptions\StatusException as StatusException;



//текущий пользователь
$idDoer = 3;
//id клиента
$idCustomer = 2;
//id исполнителя
$idPerformer = 3;

$currentStatus = Task::STATUS_NEW;

try {
    $task = new Task($currentStatus, $idPerformer, $idCustomer, $idDoer);

    $isTaskStatusAll = $task->getStatusAll();
    $isTaskActionsAll = $task->getActionsAll();
    try {
        $isPossibleActionsForUser = $task->getActionsUser(Task::STATUS_NEW);
        if ($isPossibleActionsForUser) {
            var_dump($isPossibleActionsForUser->getTitle());
        } else {
            var_dump('Для данного пользователя нет возможных действий');
        }
    } catch (StatusException $e) {
        var_dump('Выброшено исключение:' . $e->getMessage(), "\n");
    }

    try {
        $isPossibleStatus = $task->getPossibleStatus(Task::STATUS_WORK);
        var_dump($isPossibleStatus);
    } catch (StatusException $e) {
        var_dump('Выброшено исключение:' . $e->getMessage(), "\n");
    }
} catch (STatusException $e) {
    var_dump('Выброшено исключение:' . $e->getMessage(), "\n");
}
