<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#f5f6fa;
}

.sidebar{
    width:250px;
    height:100vh;
    background:#212529;
    position:fixed;
    left:0;
    top:0;
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
}

.sidebar a:hover{
    background:#343a40;
    color:white;
}

.main{
    margin-left:250px;
}

.topbar{
    background:white;
    padding:15px 25px;
    border-bottom:1px solid #ddd;
}

.content{
    padding:25px;
}

.footer{
    background:white;
    padding:12px;
    text-align:center;
    border-top:1px solid #ddd;
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


<!-- MAIN -->
<div class="main">

    <!-- HEADER -->
    <div class="topbar d-flex justify-content-between">

        <h4>Dashboard</h4>

        <strong>
            <?= session()->get('name') ?>
        </strong>

    </div>


    <!-- CONTENT -->
    <div class="content">

        <div class="row">

            <div class="col-md-3 mb-4">
                <div class="card text-bg-primary">
                    <div class="card-body">
                        <h5>Total Users</h5>
                        <h2><?= $totalUsers ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card text-bg-dark">
                    <div class="card-body">
                        <h5>Total Tasks</h5>
                        <h2><?= $totalTasks ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card text-bg-success">
                    <div class="card-body">
                        <h5>Completed</h5>
                        <h2><?= $completed ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card text-bg-warning">
                    <div class="card-body">
                        <h5>Pending</h5>
                        <h2><?= $pending ?></h2>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <!-- FOOTER -->
    <div class="footer">
        © <?= date('Y') ?> Admin Dashboard
    </div>

</div>

</body>
</html>