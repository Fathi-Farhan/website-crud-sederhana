<?php
include 'header.php';
include '../db.php';
$id = $_GET['id'];
$item = $conn->query("SELECT * FROM mahasiswa WHERE id = $id")->fetch_assoc();
?>
<h1>Edit Item</h1>
<form method="POST" action="store.php">
    <input type="hidden" name="id" value="<?= $item['id'] ?>">
    <div class="mb-3">
        <label>Nama:</label>
        <input type="text" name="name" value="<?= $item['name'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi:</label>
        <textarea name="description" class="form-control" required><?= $item['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
<?php include 'footer.php'; ?>
