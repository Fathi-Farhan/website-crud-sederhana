<?php
include '../db.php';
include 'header.php';

$result = $conn->query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manage Mahasiswa</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../public/css/style2.css">
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b>Mahasiswa</b></h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="#addMahasiswaModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Mahasiswa</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            <th>Email</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Lahir</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['nim']; ?></td>
                            <td><?php echo $row['jurusan']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['DESCRIPTION'] ?? 'No description'; ?></td>
                            <td><?php echo $row['tanggal_lahir']; ?></td>
                            <td>
                                <a href="#editMahasiswaModal" class="edit" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['nama']; ?>" data-nim="<?php echo $row['nim']; ?>" data-jurusan="<?php echo $row['jurusan']; ?>" data-email="<?php echo $row['email']; ?>" data-tanggal_lahir="<?php echo $row['tanggal_lahir']; ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteMahasiswaModal" class="delete" data-toggle="modal" data-id="<?php echo $row['id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal HTML -->
    <div id="addMahasiswaModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="store.php" method="POST">
                    <div class="modal-header">                        
                        <h4 class="modal-title">Add Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>                    
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal HTML -->
    <div id="editMahasiswaModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="store.php" method="POST">
                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <div class="modal-header">                        
                        <h4 class="modal-title">Edit Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" id="edit-name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim" id="edit-nim" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" name="jurusan" id="edit-jurusan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="edit-email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="edit-tanggal-lahir" class="form-control" required>
                        </div>                    
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteMahasiswaModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="delete.php" method="POST">
                    <div class="modal-header">                        
                        <h4 class="modal-title">Delete Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to delete this record?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                        <input type="hidden" name="id" id="delete-id">
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Pass data to Edit Modal
        $('#editMahasiswaModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var id = button.data('id');
            var name = button.data('name');
            var nim = button.data('nim');
            var jurusan = button.data('jurusan');
            var email = button.data('email');
            var tanggal_lahir = button.data('tanggal_lahir');
            var description = button.data('description'); // Perbaikan di sini!

            var modal = $(this);
            modal.find('#edit-id').val(id);
            modal.find('#edit-name').val(name);
            modal.find('#edit-nim').val(nim);
            modal.find('#edit-jurusan').val(jurusan);
            modal.find('#edit-email').val(email);
            modal.find('#edit-tanggal-lahir').val(tanggal_lahir);
            modal.find('#edit-description').val(description); // Sesuaikan ID textarea di sini
        });


        // Pass data to Delete Modal
        $('#deleteMahasiswaModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract the 'id' data attribute

            var modal = $(this);
            modal.find('#delete-id').val(id); // Set the hidden input field value
        });
    </script>
</body>
</html>
