<?php

use HtmlAcademy\Task;

require_once 'vendor/autoload.php';

$task = new Task();

assert($task->getNextStatus('action_cancel') == $task::STATUS_CANCEL, 'cancel action');


?>
