<!DOCTYPE html>
<html>
<head>
    <title>Todo Dashboard</title>
</head>
<body>

<h2>Welcome <?= session()->get('name') ?></h2>

<a href="/logout">Logout</a>

<hr>

<!-- ADD TODO FORM -->
<form action="/store" method="post">

    <input type="text" name="task" placeholder="Enter task" required>

    <button type="submit">Add</button>

</form>

<hr>

<!-- TODO LIST -->
<?php foreach($todos as $todo): ?>

    <p>
        <!-- TASK -->
        <span style="text-decoration: <?= $todo['status'] ? 'line-through' : 'none' ?>">
            <?= $todo['task'] ?>
        </span>

        <!-- TOGGLE -->
        <a href="/toggle/<?= $todo['id'] ?>">
            [<?= $todo['status'] ? 'Undo' : 'Done' ?>]
        </a>

        <!-- DELETE -->
        <a href="/delete/<?= $todo['id'] ?>">
            Delete
        </a>
    </p>

<?php endforeach; ?>

</body>
</html>