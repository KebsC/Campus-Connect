<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/MiniSocialNetwork/app/views/partials/navbar.php'; ?>

    <div class="container mt-4">
        <h3>Edit Comment</h3>
        <form method="POST" action="?route=update_comment">
            <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
            <textarea name="content" class="form-control mb-3" rows="4"
                required><?= htmlspecialchars($comment['content']) ?></textarea>
            <button class="btn btn-primary w-100">Update Comment</button>
        </form>
    </div>
</body>

</html>