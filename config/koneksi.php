<?php
    $db_host = "db"; //pakai db karena mysql dijalankan di docker, bisa diubah menjadi localhost
    $db_user = "root";
    $db_pass = "gian14";
    $db_name = "tugaspemweb_3";
    $db_port = 3306;

    $koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);
?>