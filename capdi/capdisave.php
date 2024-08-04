<?php
include '../koneksi.php';

$button = $_GET['button'];

if ($button == "Add") {
    $kode_capdi = $_GET['kd_capdi'];
    $capdi = $_GET['capaian_pembelajaran'];
    $kd_prodi = $_GET['kd_prodi'];

    $sql = "INSERT INTO capdi(kd_capdi, capaian_pembelajaran, kd_prodi) VALUES ('$kode_capdi', '$capdi', '$kd_prodi')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('location: ./capdi.php');
    } else {
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('location: ./capdi.php');
    }
} else if ($button == "Update") {
    $kode_capdi = $_GET['kd_capdi'];
    $capdi = $_GET['capaian_pembelajaran'];
    $kd_prodi = $_GET['kd_prodi'];

    $sqlUpdate = "UPDATE capdi SET capaian_pembelajaran = '$capdi', kd_prodi = '$kd_prodi' WHERE kd_capdi = '$kode_capdi'";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        $_SESSION['message'] = "Data berhasil diupdate!";
        header('location: ./capdi.php');
    } else {
        $_SESSION['message'] = "Data gagal diupdate!";
        header('location: ./capdi.php');
    }
} else if ($button == "Delete") {
    $kode_capdi = $_GET['kd_capdi'];

    $sqlDelete = "DELETE FROM capdi WHERE kd_capdi = '$kode_capdi'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        header('location: ./capdi.php');
    } else {
        $_SESSION['message'] = "Data gagal dihapus!";
        header('location: ./capdi.php');
    }
}
