<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        }

        .sidebar a:hover{
            background:#343a40;
            color:white;
        }

        /* MAIN */
        .main-content{
            margin-left:250px;
            display:flex;
            flex-direction:column;
            min-height:100vh;
        }

        /* TOPBAR */
        .topbar{
            background:white;
            padding:15px 25px;
            border-bottom:1px solid #ddd;
        }

        /* CONTENT */
        .content{
            padding:25px;
            flex:1;
        }

        /* FOOTER */
        .footer{
            background:white;
            border-top:1px solid #ddd;
            text-align:center;
            padding:10px;
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

    <a href="<?= base_url('admin/profile') ?>">
        <i class="bi bi-person-circle"></i> Profile
    </a>

    <a href="<?= base_url('logout') ?>">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

</div>

<!-- MAIN -->
<div class="main-content">

    <!-- HEADER -->
    <div class="topbar d-flex justify-content-between align-items-center">

        <h5 class="mb-0">Admin Profile</h5>

        <div>
            Welcome, <strong><?= session()->get('name') ?></strong>
        </div>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow border-0">

                    <div class="card-body text-center">

                        <i class="bi bi-person-circle" style="font-size:60px;"></i>

                        <h4 class="mt-3"><?= esc($user['name']) ?></h4>
                        <p class="text-muted"><?= esc($user['email']) ?></p>

                        <span class="badge bg-danger mb-3">
                            <?= esc($user['role']) ?>
                        </span>

                        <hr>

                        <div class="d-grid gap-2">

                            <a href="<?= base_url('admin/profile/edit') ?>" class="btn btn-warning">
                                Edit Profile
                            </a>

                            <a href="<?= base_url('admin/profile/password') ?>" class="btn btn-info text-white">
                                Change Password
                            </a>

                            <a href="<?= base_url('admin/profile/delete') ?>" class="btn btn-danger"
                               onclick="return confirm('Are you sure?')">
                                Delete Account
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->
    <div class="footer">
        © <?= date('Y') ?> Admin Panel
    </div>

</div>

</body>
</html>