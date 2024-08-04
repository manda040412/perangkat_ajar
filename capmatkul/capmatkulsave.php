<?php
include '../koneksi.php';

$button = $_GET['button'];

if ($button == "Add") {
    $kode_capmatkul = $_GET['kd_capmatkul'];
    $deskripsi_capmatkul = $_GET['deskripsi_capmatkul'];
    $kode_matkul = $_GET['kd_matkul'];

    $sql = "INSERT INTO capmatkul(kd_capmatkul, deskripsi_capmatkul, kd_matkul) VALUES ('$kode_capmatkul', '$deskripsi_capmatkul', '$kode_matkul')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('location: ./capmatkul.php');
    } else {
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('location: ./capmatkul.php');
    }
} else if ($button == "Update") {
    $kode_capmatkul = $_GET['kd_capmatkul'];
    $deskripsi_capmatkul = $_GET['deskripsi_capmatkul'];
    $kode_matkul = $_GET['kd_matkul'];

    $sqlUpdate = "UPDATE capmatkul SET deskripsi_capmatkul = '$deskripsi_capmatkul', kd_matkul = '$kode_matkul' WHERE kd_capmatkul = '$kode_capmatkul'";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        $_SESSION['message'] = "Data berhasil diupdate!";
        header('location: ./capmatkul.php');
    } else {
        $_SESSION['message'] = "Data gagal diupdate!";
        header('location: ./capmatkul.php');
    }
} else if ($button == "Delete") {
    $kode_capmatkul = $_GET['kd_capmatkul'];

    $sqlDelete = "DELETE FROM capmatkul WHERE kd_capmatkul = '$kode_capmatkul'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        header('location: ./capmatkul.php');
    } else {
        $_SESSION['message'] = "Data gagal dihapus!";
        header('location: ./capmatkul.php');
    }
}
