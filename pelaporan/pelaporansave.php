<?php
include '../koneksi.php';

$button = $_GET['button'];

if ($button == "Add") {
    $kode_pelaporan = $_GET['kd_pelaporan'];
    $isi_pelaporan = $_GET['isi_pelaporan'];
    $kd_dosen = $_GET['kd_dosen'];

    $sql = "INSERT INTO pelaporan(kd_pelaporan, isi_pelaporan, kd_dosen) VALUES ('$kode_pelaporan', '$isi_pelaporan', '$kd_dosen')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('location: ./pelaporan.php');
    } else {
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('location: ./pelaporan.php');
    }
} else if ($button == "Update") {
    $kode_pelaporan = $_GET['kd_pelaporan'];
    $isi_pelaporan = $_GET['isi_pelaporan'];
    $kd_dosen = $_GET['kd_dosen'];

    $sqlUpdate = "UPDATE pelaporan SET isi_pelaporan = '$isi_pelaporan' kd_dosen = '$kd_dosen' WHERE kd_pelaporan = '$kode_pelaporan'";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        $_SESSION['message'] = "Data berhasil diupdate!";
        header('location: ./pelaporan.php');
    } else {
        $_SESSION['message'] = "Data gagal diupdate!";
        header('location: ./pelaporan.php');
    }
} else if ($button == "Delete") {
    $kode_pelaporan = $_GET['kd_pelaporan'];

    $sqlDelete = "DELETE FROM pelaporan WHERE kd_pelaporan = '$kode_pelaporan'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        header('location: ./pelaporan.php');
    } else {
        $_SESSION['message'] = "Data gagal dihapus!";
        header('location: ./pelaporan.php');
    }
}
?>
