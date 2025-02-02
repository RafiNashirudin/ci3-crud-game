<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Game CRUD</h2>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Tambah Game</button>
        <table id="gameTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Game</th>
                    <th>Negara Asal</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($games as $game): ?>
                <tr>
                    <td><?php echo $game->id; ?></td>
                    <td><?php echo $game->JudulGame; ?></td>
                    <td><?php echo $game->NegaraAsal; ?></td>
                    <td><?php echo $game->Deskripsi; ?></td>
                    <td><img src="<?php echo base_url('uploads/' . $game->Gambar); ?>" width="100"></td>
                    <td>
                        <button class="btn btn-warning btn-edit" data-id="<?php echo $game->id; ?>">Edit</button>
                        <button class="btn btn-danger btn-delete" data-id="<?php echo $game->id; ?>">Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Game</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="JudulGame">Judul Game</label>
                            <input type="text" class="form-control" id="JudulGame" name="JudulGame" required>
                        </div>
                        <div class="form-group">
                            <label for="NegaraAsal">Negara Asal</label>
                            <input type="text" class="form-control" id="NegaraAsal" name="NegaraAsal" required>
                        </div>
                        <div class="form-group">
                            <label for="Deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="Deskripsi" name="Deskripsi" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Gambar">Gambar</label>
                            <input type="file" class="form-control" id="Gambar" name="Gambar" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Game</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" enctype="multipart/form-data">
                        <input type="hidden" id="editId" name="id">
                        <div class="form-group">
                            <label for="editJudulGame">Judul Game</label>
                            <input type="text" class="form-control" id="editJudulGame" name="JudulGame" required>
                        </div>
                        <div class="form-group">
                            <label for="editNegaraAsal">Negara Asal</label>
                            <input type="text" class="form-control" id="editNegaraAsal" name="NegaraAsal" required>
                        </div>
                        <div class="form-group">
                            <label for="editDeskripsi">Deskripsi</label>
                            <textarea class="form-control" id="editDeskripsi" name="Deskripsi" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editGambar">Gambar</label>
                            <input type="file" class="form-control" id="editGambar" name="Gambar">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Game</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#gameTable').DataTable();

            // Add Game
            $('#addForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: '<?php echo site_url('game/add'); ?>',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.status === 'success') {
                            $('#addModal').modal('hide');
                            location.reload();
                        } else {
                            alert(res.message);
                        }
                    }
                });
            });

            // Edit Game
            $('.btn-edit').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?php echo site_url('game/edit/'); ?>' + id,
                    type: 'GET',
                    success: function(response) {
                        var game = JSON.parse(response);
                        $('#editId').val(game.id);
                        $('#editJudulGame').val(game.JudulGame);
                        $('#editNegaraAsal').val(game.NegaraAsal);
                        $('#editDeskripsi').val(game.Deskripsi);
                        $('#editModal').modal('show');
                    }
                });
            });

            $('#editForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var id = $('#editId').val();
                $.ajax({
                    url: '<?php echo site_url('game/update/'); ?>' + id,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.status === 'success') {
                            $('#editModal').modal('hide');
                            location.reload();
                        } else {
                            alert(res.message);
                        }
                    }
                });
            });

            // Delete Game
            $('.btn-delete').on('click', function() {
                var id = $(this).data('id');
                $('#deleteModal').modal('show');
                $('#confirmDelete').on('click', function() {
                    $.ajax({
                        url: '<?php echo site_url('game/delete/'); ?>' + id,
                        type: 'POST',
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status === 'success') {
                                $('#deleteModal').modal('hide');
                                location.reload();
                            } else {
                                alert(res.message);
                            }
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>