<?php

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return;

        $username = trim($_POST['username']);
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            header("Location: ?route=login&error=Please fill all fields");
            exit;
        }

        $userModel = new UserModel();
        $user = $userModel->findUserByUsername($username);

        if (!$user) {
            echo '<script>alert("User not found!"); window.location.href="?route=login";</script>';
            exit;
        }

        if (!password_verify($password, $user['password'])) {
            echo '<script>alert("Wrong password!"); window.location.href="?route=login";</script>';
            exit;
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['profile_image'] = $user['profile_image'] ?? 'default.png';

        header("Location: ?route=feed");
        exit;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: ?route=login");
        exit;
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return;

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm-password'] ?? '';

        if (empty($username) || empty($password) || empty($confirmPassword)) {
            header("Location: ?route=signup&error=Please fill all fields");
            exit;
        }

        if ($password !== $confirmPassword) {
            echo '<script>alert("Passwords do not match!"); window.location.href="?route=signup";</script>';
            exit;
        }

        $userModel = new UserModel();

        if ($userModel->findUserByUsername($username)) {
            header("Location: ?route=signup&error=Username already taken");
            exit;
        }

        $userId = $userModel->insertUser($username, $password);

        if ($userId) {
            echo '<script>alert("Registration successful!"); window.location.href="?route=login";</script>';
        } else {
            header("Location: ?route=signup&error=Registration failed");
        }
        exit;
    }
}