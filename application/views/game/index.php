<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Data Game</h2>
    <button class="btn btn-primary mb-3" onclick="showAddGameForm()">Tambah Game</button>
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
                <td><?= $game->id ?></td>
                <td><?= $game->JudulGame ?></td>
                <td><?= $game->NegaraAsal ?></td>
                <td><?= $game->Deskripsi ?></td>
                <td><img src="<?= base_url('uploads/'.$game->Gambar) ?>" width="100"></td>
                <td>
                    <button class="btn btn-warning" onclick="showEditGameForm(<?= $game->id ?>)">Edit</button>
                    <button class="btn btn-danger" onclick="confirmDelete(<?= $game->id ?>)">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Form Add/Edit Game -->
<div class="modal" tabindex="-1" id="gameModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Game</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="gameForm" action="<?= base_url('game/insert_game') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
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
                        <input type="file" class="form-control" id="Gambar" name="Gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#gameTable').DataTable();
    });

    function showAddGameForm() {
        $('#gameModal').modal('show');
        $('#gameForm').attr('action', '<?= base_url('game/insert_game') ?>');
    }

    function showEditGameForm(id) {
        $.ajax({
            url: '<?= base_url('game/edit_game/') ?>' + id,
            method: 'GET',
            success: function(response) {
                let game = JSON.parse(response);
                $('#JudulGame').val(game.JudulGame);
                $('#NegaraAsal').val(game.NegaraAsal);
                $('#Deskripsi').val(game.Deskripsi);
                $('#Gambar').val('');
                $('#gameForm').attr('action', '<?= base_url('game/update_game/') ?>' + id);
                $('#gameModal').modal('show');
            }
        });
    }

    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = '<?= base_url('game/delete_game/') ?>' + id;
        }
    }
</script>

</body>
</html>
