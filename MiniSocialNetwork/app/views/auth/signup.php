<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <?php if (isset($_GET['success'])): ?>
        <script>
            alert("<?= htmlspecialchars($_GET['success']) ?>");
            window.location.href = "/MiniSocialNetwork/public/index.php?route=login";
        </script>
    <?php endif; ?>

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="w-50 p-4 shadow rounded bg-white">

            <form method="POST" action="/MiniSocialNetwork/public/index.php?route=signup">

                <h2 class="text-center mb-4">Sign Up</h2>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Enter your username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password" required>
                </div>

                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                        placeholder="Confirm your password" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-50">Register</button>
                </div>

            </form>

        </div>
    </div>
</body>

</html>