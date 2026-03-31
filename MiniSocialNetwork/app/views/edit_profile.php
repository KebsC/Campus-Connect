<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-pic-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            margin: auto;
            cursor: pointer;
        }

        .profile-pic-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #0d6efd;
            transition: 0.3s;
        }

        .profile-pic-wrapper img:hover {
            opacity: 0.8;
        }

        .profile-pic-wrapper input {
            display: none;
        }
    </style>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/MiniSocialNetwork/app/views/partials/navbar.php'; ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-3">Edit Profile</h3>

                <form method="POST" action="?route=edit_profile" enctype="multipart/form-data">

                    <div class="profile-pic-wrapper mb-3"
                        onclick="document.getElementById('profileImageInput').click();">
                        <img src="/MiniSocialNetwork/public/uploads/<?= htmlspecialchars($user['profile_image'] ?? 'default.png') ?>"
                            alt="Profile" id="profilePreview">
                        <input type="file" name="profile_image" id="profileImageInput" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control"
                            value="<?= htmlspecialchars($user['full_name'] ?? '') ?>">
                    </div>

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"
                            value="<?= htmlspecialchars($user['username'] ?? '') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label>Bio</label>
                        <textarea name="bio" class="form-control"
                            rows="3"><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('profileImageInput').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => document.getElementById('profilePreview').src = e.target.result;
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>