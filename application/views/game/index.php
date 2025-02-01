<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Daftar Game</h1>
        <a href="<?= site_url('game/create') ?>" class="btn btn-primary mb-3">Tambah Game</a>
        <table class="table table-striped table-bordered">
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
                        <td><?= $game['id'] ?></td>
                        <td><?= $game['JudulGame'] ?></td>
                        <td><?= $game['NegaraAsal'] ?></td>
                        <td><?= $game['Deskripsi'] ?></td>
                        <td><img src="<?= base_url('uploads/'.$game['Gambar']) ?>" alt="Game Image" class="img-fluid" style="max-width: 100px;"></td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="<?= site_url('game/edit/'.$game['id']) ?>" class="btn btn-warning">Edit</a>
                                <form action="<?= site_url('game/delete/'.$game['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
