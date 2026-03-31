<?php if (!isset($user)) {
    header("Location: ?route=login");
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/MiniSocialNetwork/app/views/partials/navbar.php'; ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card text-center mb-4">
                    <div class="card-body">
                        <img src="/MiniSocialNetwork/public/uploads/<?= htmlspecialchars($user['profile_image'] ?? 'default.png') ?>"
                            alt="Profile" class="rounded-circle mb-3" width="100" height="100">
                        <h4><?= htmlspecialchars($user['username']) ?></h4>
                        <?php if (!empty($user['full_name'])): ?>
                            <p class="text-muted mb-1"><?= htmlspecialchars($user['full_name']) ?></p>
                        <?php endif; ?>
                        <p class="text-muted">
                            <?= !empty($user['bio']) ? htmlspecialchars($user['bio']) : 'No bio yet.' ?>
                        </p>
                        <a href="?route=edit_profile" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>

                <h5>Your Posts</h5>
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="card mb-3">
                            <div class="card-body d-flex">
                                <img src="/MiniSocialNetwork/public/uploads/<?= htmlspecialchars($user['profile_image'] ?? 'default.png') ?>"
                                    alt="Profile">
                                <div>
                                    <strong><?= htmlspecialchars($user['username']) ?></strong>
                                    <?php if (!empty($post['created_at'])): ?>
                                        <small
                                            class="text-muted ms-2"><?= date('M j, Y g:i A', strtotime($post['created_at'])) ?></small>
                                    <?php endif; ?>
                                    <p class="mb-1 mt-1"><?= htmlspecialchars($post['content']) ?></p>
                                    <small class="text-muted"><?= $post['likes'] ?? 0 ?> Likes</small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted text-center">You haven't posted anything yet.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>

</html>