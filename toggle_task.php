<?php
session_start();

require_once 'Task.php';

$id = $_POST['id'];
$finished = $_POST['finished'] ? 0 : 1;
$task = new Task($id);

$task->toggle($finished);
$_SESSION['toggle']=true;


header('Location: index.php');

