<?php
include '../koneksi.php';

$button = $_GET['button'];

if ($button == "Add") {
    $kd_matkul = $_GET['kd_matkul'];
    $nm_matkul = $_GET['nm_matkul'];
    $sks = $_GET['sks'];
    $kd_dosen = $_GET['kd_dosen'];
    // $kd_rubrik = $_GET['kd_rubrik'];
    $kd_prodi = $_GET['kd_prodi'];

    $sql = "INSERT INTO matkul(kd_matkul, nm_matkul, sks, kd_dosen, kd_prodi) VALUES ('$kd_matkul', '$nm_matkul', '$sks', '$kd_dosen', '$kd_prodi')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('location: ./matkul.php');
    } else {
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('location: ./matkul.php');
    }
} else if ($button == "Update") {
    $kd_matkul = $_GET['kd_matkul'];
    $nm_matkul = $_GET['nm_matkul'];
    $sks = $_GET['sks'];
    $kd_dosen = $_GET['kd_dosen'];
    // $kd_rubrik = $_GET['kd_rubrik'];
    $kd_prodi = $_GET['kd_prodi'];

    $sqlUpdate = "UPDATE matkul SET nm_matkul = '$nm_matkul', sks = '$sks', kd_dosen = '$kd_dosen', kd_prodi = '$kd_prodi' WHERE kd_matkul = '$kd_matkul'";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        $_SESSION['message'] = "Data berhasil diupdate!";
        header('location: ./matkul.php');
    } else {
        $_SESSION['message'] = "Data gagal diupdate!";
        header('location: ./matkul.php');
    }
} else if ($button == "Delete") {
    $kd_matkul = $_GET['kd_matkul'];

    $sqlDelete = "DELETE FROM matkul WHERE kd_matkul = '$kd_matkul'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        header('location: ./matkul.php');
    } else {
        $_SESSION['message'] = "Data gagal dihapus!";
        header('location: ./matkul.php');
    }
}
