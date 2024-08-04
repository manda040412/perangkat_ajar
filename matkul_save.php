<?php
include 'koneksi.php';

$kd_matkul = $_POST['kode_matkul'];
$nm_matkul = $_POST['nama_matkul'];
$sks = $_POST['sks'];
$kd_dosen = $_POST['kode_dosen'];
$kd_rubrik = $_POST['kode_rubrik'];
$button = $_POST['button'];

if ($button == "add") {
    $sql = "INSERT INTO matkul(kd_matkul, nama_matkul, sks, kd_dosen, kd_rubrik) VALUES ('$kd_matkul', '$nm_matkul', '$sks', '$kd_dosen', '$kd_rubrik')";
    $query = mysqli_query($conn, $sql) or die($sql);

    if ($query) {
?>
        <script>
            alert("Berhasil membuat mata kuliah");
            location.href = "matkul.php";
        </script>
<?
    }
} else if ($button == "edit") {
}
