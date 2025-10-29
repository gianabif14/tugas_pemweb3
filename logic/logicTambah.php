<?php
    include("../config/koneksi.php");
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jeniskelamin'];

    $sql = "INSERT INTO mahasiswa (nama, nim, jenis_kelamin) VALUES ('$nama' , '$nim', '$jeniskelamin')";
    $result = mysqli_query($koneksi, $sql);

    if($result){
        header("Location: ../index.php");
    } else {
        echo "Data Gagal Ditambahkan: " . mysqli_error($koneksi);
    }
?>