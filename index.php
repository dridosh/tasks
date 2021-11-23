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
        <section style="background-color: lightgray ;">
            <div class="container mt-5 py-3">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-9 col-xl-7">
                        <div class="card rounded-2">
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
                                        <button class="btn btn-primary w-100 mb-1 " type="submit" id="add_task">Save task
                                        </button>
                                    </div>
                                </form>

                                <table class="table mb-2">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Todo item</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>Buy groceries for next week</td>
                                            <td>In progress</td>
                                            <td>
                                                <button class="btn btn-danger" type="submit">❌</button>
                                                <button class="btn btn-success ms-4" type="submit">✔</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>2</th>
                                            <td>Buy car</td>
                                            <td>In progress</td>
                                            <td>
                                                <button type="submit" class="btn btn-danger">❌</button>
                                                <button type="submit" class="btn btn-success ms-4"> ✔</button>
                                            </td>
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