<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="text-center mb-4">✏️ Edit Todo</h3>

         <form method="post" action="/update/<?= $todo['id'] ?>">

    <input type="text"
           name="task"
           value="<?= $todo['task'] ?>"
           class="form-control mb-3">

    <div class="d-flex gap-2">
        <button class="btn btn-primary">
            Update
        </button>

        <a href="/" class="btn btn-secondary">
            Back
        </a>
    </div>

</form>

     

</body>
</html>