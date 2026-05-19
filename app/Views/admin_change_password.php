<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Change Password</h5>
                </div>

                <div class="card-body">

                    <form method="post" action="<?= base_url('admin/profile/password/update') ?>">

                        <div class="mb-3">
                            <label>Old Password</label>
                            <input type="password" name="old_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100">
                            Update Password
                        </button>

                    </form>

                    <a href="<?= base_url('admin/profile') ?>" class="btn btn-secondary w-100 mt-2">
                        Back
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>