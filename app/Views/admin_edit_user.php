<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            Edit User
        </div>

        <div class="card-body">

            <form method="post" action="<?= base_url('admin/user/update/'.$user['id']) ?>">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"
                           value="<?= esc($user['name']) ?>">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="<?= esc($user['email']) ?>">
                </div>

                <button class="btn btn-success w-100">
                    Update User
                </button>

                <a href="<?= base_url('admin/users') ?>" class="btn btn-secondary w-100 mt-2">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>