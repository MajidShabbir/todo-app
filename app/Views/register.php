<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

    <div class="card shadow-sm" style="width:400px;">

        <div class="card-body">

            <h3 class="text-center mb-4">📝 Register</h3>

            <form method="post" action="/register">

                <!-- NAME -->
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                </div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>

                <!-- BUTTON -->
                <button class="btn btn-success w-100">Register</button>

            </form>

            <p class="text-center mt-3">
                Already have account? 
                <a href="/login">Login</a>
            </p>

        </div>
    </div>

</div>

</body>
</html>