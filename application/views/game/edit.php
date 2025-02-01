<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Game</h1>
        <form action="<?= site_url('game/edit/'.$game['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="JudulGame">Judul Game:</label>
                <input type="text" class="form-control" name="JudulGame" value="<?= set_value('JudulGame', $game['JudulGame']) ?>">
                <div class="form-error text-danger"><?= form_error('JudulGame') ?></div>
            </div>

            <div class="form-group">
                <label for="NegaraAsal">Negara Asal:</label>
                <input type="text" class="form-control" name="NegaraAsal" value="<?= set_value('NegaraAsal', $game['NegaraAsal']) ?>">
                <div class="form-error text-danger"><?= form_error('NegaraAsal') ?></div>
            </div>

            <div class="form-group">
                <label for="Deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="Deskripsi"><?= set_value('Deskripsi', $game['Deskripsi']) ?></textarea>
                <div class="form-error text-danger"><?= form_error('Deskripsi') ?></div>
            </div>

            <div class="form-group">
                <label for="Gambar">Gambar:</label>
                <input type="file" class="form-control-file" name="Gambar">
                <img src="<?= base_url('uploads/'.$game['Gambar']) ?>" alt="Current Game Image" class="mt-3" style="max-width: 150px;">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
