
<!DOCTYPE html>
<html>
<head>

    <title>Change Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5" style="max-width:700px;">

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <h2 class="mb-4">
                🔒 Change Password
            </h2>

            <form method="post"
                  action="/profile/password/update">

                <div class="mb-3">

                    <label>Old Password</label>

                    <input type="password"
                           name="old_password"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>New Password</label>

                    <input type="password"
                           name="new_password"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-warning">

                    Update Password
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>