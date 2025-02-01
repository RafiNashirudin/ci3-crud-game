<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Game</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Game</h1>
        <form action="<?= site_url('game/create') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="JudulGame">Judul Game:</label>
                <input type="text" class="form-control" name="JudulGame" value="<?= set_value('JudulGame') ?>">
                <small class="form-text text-danger"><?= form_error('JudulGame') ?></small>
            </div>

            <div class="form-group">
                <label for="NegaraAsal">Negara Asal:</label>
                <input type="text" class="form-control" name="NegaraAsal" value="<?= set_value('NegaraAsal') ?>">
                <small class="form-text text-danger"><?= form_error('NegaraAsal') ?></small>
            </div>

            <div class="form-group">
                <label for="Deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="Deskripsi"><?= set_value('Deskripsi') ?></textarea>
                <small class="form-text text-danger"><?= form_error('Deskripsi') ?></small>
            </div>

            <div class="form-group">
                <label for="Gambar">Gambar:</label>
                <input type="file" class="form-control-file" name="Gambar">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
