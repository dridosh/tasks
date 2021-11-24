<?php

require_once 'Task.php';

$text = $_POST['task'];

//var_dump($_POST);
//die;

$task = new Task($text);
$task->add();

header('Location: index.php');

