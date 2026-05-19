<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.toast-box{
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
}

.toast-message{
    min-width: 280px;
    padding: 14px 18px;
    margin-bottom: 10px;
    border-radius: 8px;
    color: white;
    font-weight: 500;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    animation: slideIn 0.4s ease,
               fadeOut 0.5s ease 3s forwards;
}

.toast-success{
    background: #198754;
}

.toast-error{
    background: #dc3545;
}

@keyframes slideIn{
    from{
        transform: translateX(100%);
        opacity:0;
    }
    to{
        transform: translateX(0);
        opacity:1;
    }
}

@keyframes fadeOut{
    to{
        transform: translateX(100%);
        opacity:0;
    }
}
</style>
</head>
  <!-- HEADER CARD -->
<body class="bg-light">
    <?php
$session = session();
$error = session()->getFlashdata('error');
$success = session()->getFlashdata('success');
?>
<div id="toast" class="toast-box"></div>
  


<div class="container py-5" style="max-width: 900px;">

    <!-- HEADER -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">

            <div>
                <h3 class="mb-0 fw-bold">
                    📝 Todo Dashboard  User
                </h3>

                <small class="text-muted">
                    Welcome, <?= session()->get('name') ?>
                </small>
            </div>

            <div class="d-flex gap-2">
                <a href="/profile" class="btn btn-outline-primary btn-sm">
                    👤 Profile
                </a>

                <a href="/logout" class="btn btn-danger btn-sm">
                    🚪 Logout
                </a>
            </div>

        </div>
    </div>

    <!-- ADD TASK -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">

            <h5 class="fw-semibold mb-3">
                Add New Task
            </h5>

            <form method="post" action="/store">

                <textarea
                    name="task"
                    class="form-control"
                    rows="3"
                    placeholder="Write your task here..."></textarea>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary px-4">
                        Add Task
                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- TASK LIST -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-semibold mb-0">
                    Your Tasks
                </h5>

                <span class="badge bg-dark">
                    <?= count($todos) ?> Tasks
                </span>
            </div>

            <?php if(empty($todos)): ?>

                <div class="text-center py-5 text-muted">
                    No tasks found
                </div>

            <?php else: ?>

                <ul class="list-group list-group-flush">

                    <?php foreach($todos as $todo): ?>

                    <li class="list-group-item px-0">

                        <div class="d-flex justify-content-between align-items-center">

                            <!-- TASK -->
                            <div class="fw-medium">

                                <?= $todo['status']
                                    ? '<del class="text-muted">'.$todo['task'].'</del>'
                                    : $todo['task'] ?>

                            </div>

                            <!-- ACTIONS -->
                            <div class="d-flex gap-2">

                                <a href="/edit/<?= $todo['id'] ?>"
                                   class="btn btn-warning btn-sm">
                                   Edit
                                </a>

                                <a href="/toggle/<?= $todo['id'] ?>"
                                   class="btn btn-success btn-sm">
                                   Done
                                </a>

                                <a href="/delete/<?= $todo['id'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Delete this task?')">
                                   Delete
                                </a>

                            </div>

                        </div>

                    </li>

                    <?php endforeach; ?>

                </ul>

            <?php endif; ?>

        </div>
    </div>

</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    function showToast(message, type = 'success')
    {
        const toast = document.getElementById('toast');

        const div = document.createElement('div');

        div.className = 'toast-message toast-' + type;
        div.innerText = message;

        toast.appendChild(div);

        setTimeout(() => {
            div.remove();
        }, 3500);
    }

    <?php if ($error): ?>
        showToast("<?= esc($error) ?>", "error");
    <?php endif; ?>

    <?php if ($success): ?>
        showToast("<?= esc($success) ?>", "success");
    <?php endif; ?>

});
</script>
</body>
</html>