<?php
session_start();

require_once 'Task.php';
$res = Task::getTasks();
?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">

        <title>Task manager</title>
    </head>



    <body class="container mt-5">
        <?php
        if (isset($_SESSION['del'])) {
            echo
            '<div class="alert alert-success text-center" role="alert" >
                Task deletion was successful!
            </div>';
            unset($_SESSION['del']);
        }
        if (isset($_SESSION['add'])) {
            echo
            '<div class="alert alert-success text-center" role="alert" >
                Adding tasks successfully!
            </div>';
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['toggle'])) {
            echo
            '<div class="alert alert-success text-center" role="alert" >
                Task status changed!
            </div>';
            unset($_SESSION['toggle']);
        }

        ?>

        <section style="background-color: lightgray ;">
            <div class="container mt-5 mb-5 py-3">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-12">
                        <div class="card rounded-4">
                            <div class="card-body p-4">
                                <h4 class="text-center my-3 pb-3">To Do List</h4>
                                <form method="POST" action="add_task.php">
                                    <div class="col-12  pb-2">
                                        <div class="form-outline">
                                            <label for="task_text"></label>
                                            <input class="form-control mb-2" id="task_text" name="task"
                                                   placeholder="Enter a task here">
                                        </div>
                                    </div>
                                    <div class="col-12 pb-5">
                                        <button class="btn btn-primary w-100 mb-1 " type="submit" id="add_task">Save
                                                                                                                task
                                        </button>
                                    </div>
                                </form>

                                <table class="table mb-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th >Task</th>
                                            <th>Status</th>
                                            <th colspan='2'> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($res as $key => $item) {
                                            $n = ++$key;

                                            $class =$item['finished'] ? 'bg-success' :'';
                                            echo
                                            "
                                                <tr class='$class' >
                                                    <th>$n</th>
                                                    <td>{$item['text']}</td>
                                                    <td>{$item['finished']}</td>
                                                    <td>
                                                         <form method='post' action='del_task.php'>
                                                            <input hidden name ='id' value = '{$item['id']}'>
                                                            <button class='btn btn - danger' type='submit'>❌</button>
                                                        </form>   
                                                    </td>  
                                                    <td>    
                                                        <form method='post' action='toggle_task.php'>
                                                            <input hidden name ='id' value = '{$item['id']}'>
                                                            <input hidden name ='finished' value = '{$item['finished']}'>
                                                            <button class='btn btn - success' type='submit'>✔</button>
                                                        </form>
                                                     </td>
                                                 </tr>
                                            ";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>


    </body>


</html>


