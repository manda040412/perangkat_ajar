<?php
include '../koneksi.php';

$button = $_GET['button'];

if ($button == "Add") {
    $kode_bk = $_GET['kd_bk'];
    $bk = $_GET['bidang_kajian'];
    $kode_matkul = $_GET['kd_matkul'];

    $sql = "INSERT INTO bidang_kajian(kd_bk, bidang_kajian, kd_matkul) VALUES ('$kode_bk', '$bk', '$kode_matkul')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('location: ./bidang_kajian.php');
    } else {
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('location: ./bidang_kajian.php');
    }
} else if ($button == "Update") {
    $kode_bk = $_GET['kd_bk'];
    $bk = $_GET['bidang_kajian'];
    $kode_matkul = $_GET['kd_matkul'];

    $sqlUpdate = "UPDATE bidang_kajian SET bidang_kajian = '$bk', kd_matkul = '$kode_matkul' WHERE kd_bk = '$kode_bk'";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        $_SESSION['message'] = "Data berhasil diupdate!";
        header('location: ./bidang_kajian.php');
    } else {
        $_SESSION['message'] = "Data gagal diupdate!";
        header('location: ./bidang_kajian.php');
    }
} else if ($button == "Delete") {
    $kd_dosen = $_GET['kd_bk'];

    $sqlDelete = "DELETE FROM bidang_kajian WHERE kd_bk = '$bk'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        header('location: ./bidang_kajian.php');
    } else {
        $_SESSION['message'] = "Data gagal dihapus!";
        header('location: ./bidang_kajian.php');
    }
}
?>
