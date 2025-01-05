<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="index.php">Farhan GUCC</a>
        
        <!-- Navbar Right Section -->
        <div class="ms-auto">
            <?php if (isset($_SESSION['user'])): ?>
                <span class="text-light me-2">Welcome, <?= $_SESSION['user'] ?></span>
                <a href="../auth.php?action=logout" class="btn btn-danger btn-sm">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary btn-sm">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container mt-4">
