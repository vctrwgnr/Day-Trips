<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5">User Registration</h3>
            <form action="register.php" method="post" class="mt-3">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input name="username" id="username" class="form-control" type="text" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input name="email" id="email" class="form-control" type="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input name="password" id="password" class="form-control" type="password" required>
                </div>

                <div class="mb-3">
                    <label for="repeatPassword" class="form-label">Repeat Password:</label>
                    <input name="repeatPassword" id="repeatPassword" class="form-control" type="password" required>
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-info me-2" value="Register">
                    <a href="index.php?action=login&area=public" class="btn btn-secondary me-2">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>