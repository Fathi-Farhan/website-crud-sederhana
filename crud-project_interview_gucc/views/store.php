<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $description = $_POST['description'];


    if ($id) {
        $conn->query("UPDATE mahasiswa SET nama='$name', nim='$nim', jurusan='$jurusan', email='$email', tanggal_lahir='$tanggal_lahir', DESCRIPTION='$description' WHERE id=$id");
    } else {
        $conn->query("INSERT INTO mahasiswa (nama, nim, jurusan, email, tanggal_lahir, description) VALUES ('$name', '$nim', '$jurusan', '$email', '$tanggal_lahir', '$description')");
    }

    header('Location: index.php');
}

// notes
// (name, description) 
?>