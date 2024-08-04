<?php
include 'koneksi.php';

$button = $_GET['button'];

if ($button == "getDataDosen") {
    $kode_dosen = $_GET['kd_dosen'];

    $sql = "SELECT kd_matkul, nm_matkul FROM matkul WHERE kd_dosen='$kode_dosen'";
    $query = mysqli_query($conn, $sql) or die($sql);

    $option = '<option value="">Pilih Mata Kuliah</option>';

    while ($data = mysqli_fetch_array($query)) {
        $kode_matkul = $data['kd_matkul'];
        $nama_matkul = $data['nm_matkul'];

        $option .= '<option value="' . $kode_matkul . '">' . $nama_matkul . '</option>';
    }

    echo json_encode($option);
} else if ($button == "Login") {
    $kode_dosen = $_GET['kd_dosen'];
    $kd_matkul = $_GET['kd_matkul'];

    $sql = "SELECT * FROM matkul WHERE kd_dosen = '$kode_dosen' AND kd_matkul = '$kd_matkul'";
    $query = mysqli_query($conn, $sql) or die($sql);
    $result = mysqli_fetch_assoc($query);
    $num = mysqli_num_rows($query);

    if ($num > 0) {
        $_SESSION['kd_dosen'] = $kode_dosen;
        $_SESSION['kd_matkul'] = $kd_matkul;
        $_SESSION['kd_prodi'] = $result['kd_prodi'];

        $_SESSION['loginStatus'] = true;
        header("Location: home.php");
    } else {
        $_SESSION['loginStatus'] = false;
        header("Location: index.php");
    }
}
