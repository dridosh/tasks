<?php

require_once 'Task.php';

$text = $_POST['task'];

//var_dump($_POST);
//die;
$task = new Task();
$task->add($text,1);
//Task::add($text);

header('Location: index.php');

