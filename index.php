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


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">

        <title>Task manager</title>
    </head>


    <body class="container mt-5">


        <?php


            $alert = ['del'        => ['Task deletion was successful!', 'alert-success'],
                      'add'        => ['Adding task successfully!', 'alert-success'],
                      'toggle'     => ['Task status has been changed!', 'alert-success'],
                      'update'     => ['The task text has been changed!', 'alert-success'],
                      'empty_task' => ['Task text cannot be empty!', 'alert-warning'],
                      'Hello'      => ['Hello!', 'alert-success'],
            ];
            foreach ($alert as $index => $item) {

                if (isset($_SESSION[$index])) {
                    echo
                        '<div class="alert  ' . $item[1] . ' text-center"  >
                ' . $item[0] . '
               </div>';
                    unset($_SESSION[$index]);
                    break;
                }
            }

        ?>

        <script>
            if ((document.getElementsByClassName('alert-success').length === 0) &&
                (document.getElementsByClassName('alert-warning').length === 0)) {
                let div = document.createElement('div');
                div.className = "alert alert-success text-center";
                if (sessionStorage.getItem('reloaded') == null) {
                    text = document.createTextNode('Hello!!!');
                } else {
                    text = document.createTextNode('Refresh....');
                }
                div.appendChild(text);
                document.body.appendChild(div);
                sessionStorage.setItem('reloaded', 'yes');
            }
        </script>

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
                                            <th>Task</th>
                                            <th colspan='2'></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            foreach ($res as $key => $item) {
                                                $n = ++$key;

                                                $class = $item['finished'] ? 'bg-success bg-gradient' : '';
                                                $strike = $item['finished'] ? 'line-through' : 'none';
                                                echo
                                                "
                                                <tr class='$class' style='--bs-bg-opacity: 0.2' >
                                                    <th>$n</th>
                                                    <td style='text-decoration: $strike' >
                                                        <a href='edit_task.php?id={$item['id']}'>
                                                     {$item['text']} </a>
                                                     </td>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <script>

            setTimeout(() => {
                $('.alert-success').animate({
                    opacity: 0.0
                }, 2000, function () {
                });
                $('.alert-warning').animate({
                    opacity: 0.0
                }, 5000, function () {
                });

            }, 1000)

        </script>


    </body>


</html>


