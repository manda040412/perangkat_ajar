<?php
include '../koneksi.php';

$button = $_GET['button'];

if ($button == "Add") {
    $kode_prolus = $_GET['kd_prolus'];
    $prolus = $_GET['profil_lulusan'];
    $deskripsi_prolus = $_GET['deskripsi_prolus'];
    $kode_prodi = $_GET['kd_prodi'];

    $sql = "INSERT INTO prolus(kd_prolus, profil_lulusan, deskripsi_prolus, kd_prodi) VALUES ('$kode_prolus', '$prolus', '$deskripsi_prolus', '$kode_prodi)";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('location: ./prolus.php');
    } else {
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('location: ./prolus.php');
    }
} else if ($button == "Update") {
    $kode_prolus = $_GET['kd_prolus'];
    $prolus = $_GET['profil_lulusan'];
    $deskripsi_prolus = $_GET['deskripsi_prolus'];
    $kode_prodi = $_GET['kd_prodi'];

    $sqlUpdate = "UPDATE prolus SET profil_lulusan = '$prolus', deskripsi_prolus = '$deskripsi_prolus', kd_prodi = '$kode_prodi' WHERE kd_prolus = '$kode_prolus'";

    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        $_SESSION['message'] = "Data berhasil diupdate!";
        header('location: ./prolus.php');
    } else {
        $_SESSION['message'] = "Data gagal diupdate!";
        header('location: ./prolus.php');
    }
} else if ($button == "Delete") {
    $kode_prolus = $_GET['kd_prolus'];

    $sqlDelete = "DELETE FROM prolus WHERE kd_prolus = '$kode_prolus'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        header('location: ./prolus.php');
    } else {
        $_SESSION['message'] = "Data gagal dihapus!";
        header('location: ./prolus.php');
    }
}
