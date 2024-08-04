<?php
include '../koneksi.php';

$button = $_GET['button'];

if ($button == "Add") {
    $kode_penilaian = $_GET['kd_penilaian'];
    $minggu = $_GET['minggu'];
    $sub_cpmk = $_GET['sub_cpmk'];
    $bidang_kajian = $_GET['bidang_kajian'];
    $metode_pembelajaran = $_GET['metode_pembelajaran'];
    $estimasi_waktu = $_GET['estimasi_waktu'];
    $pengalaman_belajar = $_GET['pengalaman_belajar'];
    $kriteria = $_GET['kriteria'];
    $bentuk = $_GET['bentuk'];
    $kd_dosen = $_GET['kd_dosen'];

    $sql = "INSERT INTO penilaian(kd_penilaian, minggu, sub_cpmk, bidang_kajian, metode_pembelajaran, estimasi_waktu, pengalaman_belajar, kriteria, bentuk, kd_dosen) VALUES ('$kode_penilaian', '$minggu', '$sub_cpmk', '$bidang_kajian', '$metode_pembelajaran', '$estimasi_waktu', '$pengalaman_belajar', '$kriteria', '$bentuk', '$kd_dosen')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('location: ./penilaian.php');
    } else {
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('location: ./penilaian.php');
    }
} else if ($button == "Update") {
    $kode_penilaian = $_GET['kd_penilaian'];
    $minggu = $_GET['minggu'];
    $sub_cpmk = $_GET['sub_cpmk'];
    $bidang_kajian = $_GET['bidang_kajian'];
    $metode_pembelajaran = $_GET['metode_pembelajaran'];
    $estimasi_waktu = $_GET['estimasi_waktu'];
    $pengalaman_belajar = $_GET['pengalaman_belajar'];
    $kriteria = $_GET['kriteria'];
    $bentuk = $_GET['bentuk'];
    $kd_dosen = $_GET['kd_dosen'];

    $sqlUpdate = "UPDATE penilaian SET minggu = '$minggu' sub_cpmk = '$sub_cpmk' bidang_kajian = '$bidang_kajian' metode_pembelajaran = '$metode_pembelajaran' estimasi_waktu = '$estimasi_waktu' pengalaman_belajar = '$pengalaman_belajar' kriteria = '$kriteria' bentuk = '$bentuk' kd_dosen = '$kd_dosen' WHERE kd_penilaian = '$kode_penilaian'";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        $_SESSION['message'] = "Data berhasil diupdate!";
        header('location: ./penilaian.php');
    } else {
        $_SESSION['message'] = "Data gagal diupdate!";
        header('location: ./penilaian.php');
    }
} else if ($button == "Delete") {
    $kode_penilaian = $_GET['kd_penilaian'];

    $sqlDelete = "DELETE FROM penilaian WHERE kd_penilaian = '$kode_penilaian'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        header('location: ./penilaian.php');
    } else {
        $_SESSION['message'] = "Data gagal dihapus!";
        header('location: ./penilaian.php');
    }
}
?>
