<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            <h4>User Profile</h4>
        </div>

        <div class="card-body">

            <p><strong>Name:</strong> <?= esc($user['name']) ?></p>
            <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
            <p><strong>Role:</strong> <?= esc($user['role']) ?></p>

            <hr>

            <a href="<?= base_url('profile/edit') ?>" class="btn btn-warning btn-sm">
                Edit Profile
            </a>

            <a href="<?= base_url('profile/password') ?>" class="btn btn-info btn-sm">
                Change Password
            </a>

            <a href="<?= base_url('profile/delete') ?>" class="btn btn-danger btn-sm">
                Delete Account
            </a>

            <hr>

            <a href="<?= base_url('/') ?>" class="btn btn-secondary">
                ← Back to Tasks
            </a>

        </div>

    </div>

</div>

</body>
</html>