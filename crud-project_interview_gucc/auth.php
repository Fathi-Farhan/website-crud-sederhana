<?php
include 'db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan key 'action' ada sebelum diproses
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Login
        if ($action === 'login') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user && password_verify($password, $user['password'])) {
                // Simpan username dalam session
                $_SESSION['user'] = $user['username'];
                header('Location: ../views/index.php');
                exit;
            } else {
                // Kirim pesan error melalui query string
                header('Location: ../views/login.php?error=1');
                exit;
            }
         
            
        } else {
            error_log("Prepare statement error: " . $conn->error);
            header('Location: ../views/login.php?error=2'); // Untuk error server
            exit;
        }

        // Register
        if ($action === 'register') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Periksa apakah username sudah ada
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Username sudah digunakan
                $error = "Username sudah terdaftar. Silakan gunakan username lain.";
            } else {
                // Masukkan user baru ke database
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->bind_param('ss', $username, $hashed_password);

                if ($stmt->execute()) {
                    // Registrasi berhasil, arahkan ke halaman login
                    header('Location: login.php');
                    exit;
                } else {
                    $error = "Registrasi gagal. Silakan coba lagi.";
                }
            }
        }
    } else {
        $error = "Aksi tidak valid.";
    }
}

// Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: views/login.php');
    exit;
}
?>
