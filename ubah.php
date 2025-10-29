<?php
    include("config/koneksi.php");
    $id = $_GET["id"];
    $sql = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="#">
        <img src="./logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        Speda
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="tambah.php">Tambah Mahasiswa</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container mt-2">
        <br>
        <h3>Ubah Data Mahasiswa</h3>
        <form method="post" action ="logic/logicUbah.php">
            <input type="text" name="id" value=<?php echo $id ?> hidden>
            <p class="mb-1">NIM</p>
            <input class="form-control mb-3" type="text" name="nim" value="<?php echo $data['nim']; ?>">
            <p class="mb-1">Nama</p>
            <input class="form-control mb-3" type="text" name="nama" value="<?php echo $data['nama']; ?>" >
            <p class="mb-1">Jenis Kelamin</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jeniskelamin" id="cowo" value="Laki-laki" checked>
                <label class="form-check-label" for="cowo">
                    Laki-laki
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="jeniskelamin" id="cewe" value="Perempuan">
                <label class="form-check-label" for="cewe">
                    Perempuan
                </label>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>