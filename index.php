<?php

use HtmlAcademy\models\Task;

require_once 'vendor/autoload.php';

$task = new Task();

assert($task->getNextStatus('action_cancel') === Task::STATUS_CANCEL, 'cancel action');
assert($task->getActionList('new') === Task::STATUS_NEW, 'status new');
assert($task->getActionList('work') === Task::STATUS_WORK,'in work');

?>
