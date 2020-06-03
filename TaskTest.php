<?php

use htmlacademy\models\Task;

require_once 'vendor/autoload.php';

$task = new Task();

assert($task->getNextStatus(Task::ACTION_CANCEL) === Task::STATUS_CANCEL, 'cancel action');
assert($task->getActionList(Task::STATUS_NEW) === Task::STATUS_NEW, 'status new');
assert($task->getNextStatus(Task::ACTION_COMPLETE) === Task::STATUS_PERFORMED, 'cancel action');
assert($task->getActionList(Task::STATUS_WORK) === Task::STATUS_WORK,'in work');
assert($task->getActionList(Task::STATUS_NEW) === Task::ACTION_RESPOND, 'status new');
assert($task->getActionList(Task::STATUS_WORK) === Task::ACTION_COMPLETE,'in work');

?>
