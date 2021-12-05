<?php
    session_start();
    require_once 'Task.php';

    $text = $_POST['text'];
    $id = $_POST['id'];


    if ($text !== '') {

        $task = new Task($id);
        if ($text === $task->text) {
            $_SESSION['same_task'] = true;
            header('Location: edit_task.php?id=' . $id);
        } else {
            $task->update($text);
            $_SESSION['update'] = true;
            header('Location: index.php');
        }

    } else {
        $_SESSION['empty_task'] = true;
        header('Location: edit_task.php?id=' . $id);
    }





