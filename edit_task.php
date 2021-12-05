<?php
    session_start();

    require_once 'Task.php';

    $id = $_GET['id'];
    $task = new Task($id);
?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">

        <title>Task editor</title>
    </head>
    <body class="container mt-5">

        <?php

            $alert = ['empty_task' => 'Task text cannot be empty',
                      'same_task'  => 'The task text must be changed',
            ];
            foreach ($alert as $index => $item) {

                if (isset($_SESSION[$index])) {
                    echo
                        '<div class="alert alert-warning text-center"  >
                ' . $item . '
               </div>';
                    unset($_SESSION[$index]);
                }
            }

            if ($task->text!==null) {
                echo "
                     <form action = 'update_task.php' method = 'post' >
                         <input required name = 'text' class='form-control mb-2' type = 'text' value = '{$task->text}' >
                         <input name = 'id' type = 'hidden' value = '{$task->id}' >
                         <button class='btn-success w-100' > Save</button >
                     </form >
        
                ";
            } else {
                echo '<em>Task is not found!</em>';
            }

        ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous">

        </script>
    </body>

</html>




