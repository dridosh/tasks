<?php

require_once 'Task.php';

$text = $_POST['task'];

//var_dump($_POST);
//die;
Task::add($text);

header('Location: index.php');

