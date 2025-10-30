<?php
include("config/koneksi.php");
$sql = "SELECT * FROM mahasiswa";

if (isset($_GET['cari'])) {
    $kata_kunci = $_GET['cari'];
    $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$kata_kunci%'";
}

$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Speda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="#">
                <img src="./logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Speda
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-2">
        <br>
        <h3>Daftar Mahasiswa</h3>
        <form class="d-flex mb-2" method="get" Action="index.php">
            <input class="form-control" type="search" placeholder="Cari Mahasiswa" aria-label="Search" name="cari">
            <button class="btn btn-outline-dark" type="submit">Cari</button>
        </form>
        <table class="table table-dark table-striped" id="tabel_mhs">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php if (mysqli_num_rows($result) > 0):
                $i = 1;
                ?>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $data['nim'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td class="text-center">
                                <a href="ubah.php?id=<?php echo $data['id']; ?>"><button type="button"
                                        class="btn btn-primary">Update</button></a>
                                <button type="button" class="btn btn-danger btn-hapus" data-bs-toggle="modal"
                                    data-bs-target="#konfirmasiHapusModal" data-id="<?php echo $data['id']; ?>"
                                    data-nama="<?php echo $data['nama']; ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">Tidak Ada Data.</td>
            </tr>
        <?php endif ?>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="konfirmasiHapusModal" tabindex="-1" aria-labelledby="konfirmasiHapusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirmasiHapusModalLabel">Hapus Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data mahasiswa dengan nama <b><span
                            id="namaMahasiswaHapus"></span></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="#" id="hapusLink" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>