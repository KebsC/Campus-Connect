<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="?route=feed" class="navbar-brand fw-bold">Campus Connect</a>

        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Search bar -->
            <form class="d-flex mx-auto" method="GET" action="/MiniSocialNetwork/public/index.php">
                <input type="hidden" name="route" value="search">
                <input class="form-control me-2" type="search" name="q" placeholder="Search users..."
                    value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" style="width: 250px;">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        <?php endif; ?>

        <div class="ms-auto">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="dropdown d-inline">
                    <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" href="#"
                        role="button" data-bs-toggle="dropdown">
                        <img src="/MiniSocialNetwork/public/uploads/<?= htmlspecialchars($_SESSION['profile_image'] ?? 'default.png') ?>"
                            alt="Profile" class="rounded-circle me-2" width="35" height="35">
                        <?= htmlspecialchars($_SESSION['username'] ?? 'User') ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="?route=profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="?route=logout">Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="?route=login" class="btn btn-primary me-2">Login</a>
                <a href="?route=signup" class="btn btn-secondary">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
</nav>