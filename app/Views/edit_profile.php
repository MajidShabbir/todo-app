<!DOCTYPE html>
<html>
<head>

    <title>Edit Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5" style="max-width:700px;">

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <h2 class="mb-4">
                ✏ Edit Profile
            </h2>

            <form method="post" action="/profile/update">

                <div class="mb-3">

                    <label>Name</label>

                    <input type="text"
                           name="name"
                           value="<?= $user['name'] ?>"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           value="<?= $user['email'] ?>"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Update Profile
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>