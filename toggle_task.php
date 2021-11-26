<?php
require_once 'Task.php';

$id = $_POST['id'];
$finished = $_POST['finished'] ? 0 : 1;
$task = new Task($id);

$task->toggle($finished);

header('Location: index.php');

