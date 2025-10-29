<?php
    include("../config/koneksi.php");
    $id = $_POST["id"];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jeniskelamin'];

    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jenis_kelamin='$jeniskelamin' WHERE id=$id";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        header("Location: ../index.php");
    }else{
        echo "Error : Gagal";
    }
?>