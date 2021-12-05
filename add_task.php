<?php
    session_start();

    require_once 'Task.php';

    $text = $_POST['task'];

    if ($text !== '') {
        $task = new Task();
        $task->add($text);
        $_SESSION['add'] = true;
    } else{
        $_SESSION['empty_task'] = true;
    }
    header('Location: index.php');


