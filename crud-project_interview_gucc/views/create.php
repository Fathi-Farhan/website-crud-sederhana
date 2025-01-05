<?php include 'header.php'; ?>
<h1>Tambah Item</h1>
<form method="POST" action="store.php">
    <div class="mb-3">
        <label>Nama:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi:</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Deskripsi:</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
<?php include 'footer.php'; ?>
