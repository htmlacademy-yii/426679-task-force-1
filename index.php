<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use Htmlacademy\models\Task;
use Htmlacademy\exceptions\StatusExceptions as StatusExceptions;



//текущий пользователь
$idDoer = 3;
//id клиента
$idCustomer = 2;
//id исполнителя
$idPerformer = 3;

$currentStatus = Task::STATUS_NEW;


