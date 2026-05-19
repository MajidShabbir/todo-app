<!DOCTYPE html>
<html>
<head>
    <title>Admin Tasks</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#f5f6fa;
            overflow-x:hidden;
        }

        /* SIDEBAR */
        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            top:0;
            left:0;
            background:#212529;
            padding-top:20px;
        }

        .sidebar h4{
            color:white;
            text-align:center;
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            color:#ddd;
            padding:14px 20px;
            text-decoration:none;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#343a40;
            color:white;
        }

        /* MAIN */
        .main-content{
            margin-left:250px;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        /* HEADER */
        .topbar{
            background:white;
            padding:15px 25px;
            border-bottom:1px solid #ddd;
        }

        /* CONTENT */
        .dashboard-content{
            padding:25px;
            flex:1;
        }

        /* FOOTER */
        .footer{
            background:white;
            border-top:1px solid #ddd;
            text-align:center;
            padding:12px;
            font-size:14px;
        }

    </style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h4>🛡 Admin Panel</h4>

    <a href="<?= base_url('admin/dashboard') ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="<?= base_url('admin/tasks') ?>">
        <i class="bi bi-list-check"></i> Tasks
    </a>

    <a href="<?= base_url('admin/users') ?>">
        <i class="bi bi-people"></i> Users
    </a>

    <a href="<?= base_url('profile') ?>">
        <i class="bi bi-person-circle"></i> Profile
    </a>

    <a href="<?= base_url('logout') ?>">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

</div>


<!-- MAIN CONTENT -->
<div class="main-content">

    <!-- HEADER -->
    <div class="topbar d-flex justify-content-between align-items-center">

        <h4 class="mb-0">All Tasks</h4>

        <div>
            Welcome,
            <strong>
                <?= session()->get('name') ?>
            </strong>
        </div>

    </div>


    <!-- PAGE CONTENT -->
    <div class="dashboard-content">

        <!-- TASK TABLE -->
        <div class="card shadow-sm border-0">

            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">All Users Tasks</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle table-bordered">

                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Task</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php if(!empty($todos)) : ?>

                            <?php $i = 1; ?>

                            <?php foreach($todos as $todo) : ?>

                                <tr>

                                    <td><?= $i++ ?></td>

                                    <td>
                                        <?= esc($todo['username'] ?? ('User ID: '.$todo['user_id'])) ?>
                                    </td>

                                    <td>
                                        <?= esc($todo['task']) ?>
                                    </td>

                                    <td>

                                        <?php if(($todo['status'] ?? 0) == 1 || ($todo['status'] ?? '') == 'completed') : ?>

                                            <span class="badge bg-success">
                                                Completed
                                            </span>

                                        <?php else : ?>

                                            <span class="badge bg-warning text-dark">
                                                Pending
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    No tasks found
                                </td>
                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    <!-- FOOTER -->
    <div class="footer">
        © <?= date('Y') ?> Admin Dashboard | CodeIgniter 4 Todo App
    </div>

</div>

</body>
</html>