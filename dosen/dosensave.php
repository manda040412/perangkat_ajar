<?php
include '../koneksi.php';

$button = $_GET['button'];

if ($button == "Add") {
    $kd_dosen = $_GET['kd_dosen'];
    $nm_dosen = $_GET['nm_dosen'];

    $sql = "INSERT INTO dosen(kd_dosen, nm_dosen) VALUES ('$kd_dosen', '$nm_dosen')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('location: ./dosen.php');
    } else {
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('location: ./dosen.php');
    }
} else if ($button == "Update") {
    $kd_dosen = $_GET['kd_dosen'];
    $nm_dosen = $_GET['nm_dosen'];

    $sqlUpdate = "UPDATE dosen SET nm_dosen = '$nm_dosen', kd_dosen = '$kd_dosen'";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        $_SESSION['message'] = "Data berhasil diupdate!";
        header('location: ./dosen.php');
    } else {
        $_SESSION['message'] = "Data gagal diupdate!";
        header('location: ./dosen.php');
    }
} else if ($button == "Delete") {
    $kd_dosen = $_GET['kd_dosen'];

    $sqlDelete = "DELETE FROM dosen WHERE kd_dosen = '$kd_dosen'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        header('location: ./dosen.php');
    } else {
        $_SESSION['message'] = "Data gagal dihapus!";
        header('location: ./dosen.php');
    }
}
?>
