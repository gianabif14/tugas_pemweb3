<?php
    include '../config/koneksi.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM mahasiswa WHERE id = $id";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
?>