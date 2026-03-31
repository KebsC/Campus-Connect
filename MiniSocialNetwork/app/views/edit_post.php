<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/MiniSocialNetwork/app/views/partials/navbar.php'; ?>

    <div class="container mt-4">
        <h3>Edit Post</h3>
        <form method="POST" action="?route=update_post">
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <textarea name="content" class="form-control mb-3" rows="4"
                required><?= htmlspecialchars($post['content']) ?></textarea>
            <button class="btn btn-primary w-100">Update Post</button>
        </form>
    </div>
</body>

</html>