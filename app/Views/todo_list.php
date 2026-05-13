<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- HEADER CARD -->
    <div class="card shadow-sm">
        <div class="card-body">
            <a href="/logout" class="btn btn-danger btn-sm">
    Logout
</a>

            <h3 class="text-center mb-4">📝 Todo List App</h3>

            <!-- ADD FORM -->
          <form method="post" action="/store" class="d-flex gap-2">
    <input type="text" name="task" class="form-control" required>
    <button class="btn btn-primary">Add</button>
</form>

        </div>
    </div>

    <!-- TODO LIST CARD -->
    <div class="card shadow-sm mt-4">
        <div class="card-body">

            <h5 class="mb-3">Your Tasks</h5>

            <?php if(empty($todos)): ?>
                <p class="text-muted">No tasks found</p>
            <?php endif; ?>

            <ul class="list-group">

                <?php foreach($todos as $todo): ?>

                    <li class="list-group-item">

                        <div class="d-flex justify-content-between align-items-center">

                            <!-- TITLE -->
                            <div>
                                <?= $todo['status'] 
    ? '<del class="text-muted">'.$todo['task'].'</del>' 
    : $todo['task'] ?>
                            </div>

                            <!-- BUTTONS -->
                            <div class="d-grid gap-1">

                                <!-- EDIT -->
                                <a href="/edit/<?= $todo['id'] ?>" class="btn btn-warning btn-sm">
                                    ✏️ Edit
                                </a>

                                <!-- TOGGLE COMPLETE -->
                                <a href="/toggle/<?= $todo['id'] ?>" class="btn btn-success btn-sm">
                                    ✔ Done
                                </a>

                                <!-- DELETE -->
                                <a href="/delete/<?= $todo['id'] ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this task?')">
                                    ❌ Delete
                                </a>

                            </div>

                        </div>

                    </li>

                <?php endforeach; ?>

            </ul>

        </div>
    </div>

</div>

</body>
</html>