<?php
include '../koneksi.php';

$button = $_GET['button'];

if ($button == "Add") {
    $kode_rubrik = $data['kd_rubrik'];
    $grade = $data['grade'];
    $skor = $data['skor'];
    $kriteria_penilaian = $data['kriteria_penilaian'];

    $sql = "INSERT INTO rubrik_penilaian(kd_rubrik, grade, skor, kriteria_penilaian) VALUES ('$kode_rubrik', '$grade', '$skor', '$kriteria_penilaian')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('location: ./rubrik_penilaian.php');
    } else {
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('location: ./rubrik_penilaian.php');
    }
} else if ($button == "Update") {
    $kode_rubrik = $_GET['kd_rubrik'];
    $grade = $_GET['grade'];
    $skor = $_GET['skor'];
    $kriteria_penilaian = $_GET['kriteria_penilaian'];

    $sqlUpdate = "UPDATE rubrik_penilaian SET grade = '$grade' skor = '$skor' kriteria_penilaian = '$kriteria_penilaian' WHERE kd_rubrik = '$kode_rubrik' ";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        $_SESSION['message'] = "Data berhasil diupdate!";
        header('location: ./rubrik_penilaian.php');
    } else {
        $_SESSION['message'] = "Data gagal diupdate!";
        header('location: ./rubrik_penilaian.php');
    }
} else if ($button == "Delete") {
    $kode_rubrik = $_GET['kd_rubrik'];

    $sqlDelete = "DELETE FROM rubrik_penilaian WHERE kd_rubrik = '$kode_rubrik'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        header('location: ./rubrik_penilaian.php');
    } else {
        $_SESSION['message'] = "Data gagal dihapus!";
        header('location: ./rubrik_penilaian.php');
    }
}
?>
