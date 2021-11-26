<?php
require_once 'Task.php';

$id = $_POST['id'];
$task = new Task($id );
$task->del();

header('Location: index.php');



