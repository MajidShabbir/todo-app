<!DOCTYPE html>
<html>
<head>
    <title>Edit Admin Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-header bg-warning">
                    <h5 class="mb-0">Edit Profile</h5>
                </div>

                <div class="card-body">

                    <form method="post" action="<?= base_url('admin/profile/update') ?>">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                   value="<?= esc($user['name']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= esc($user['email']) ?>" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            Update Profile
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