<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="container mt-4">
    <img src="../img/logo.png" alt="">
    <h6 class="text-center">
        <?php
        $kd_prodi = $_SESSION['kd_prodi'];

        $sqlProdi = "SELECT * FROM prodi WHERE kd_prodi = '$kd_prodi'";
        $queryProdi = mysqli_query($conn, $sqlProdi) or die($sqlProdi);
        $resultProdi = mysqli_fetch_assoc($queryProdi);

        $nama_prodi = "PROGRAM STUDI " . $resultProdi['nama_prodi'];

        echo strtoupper($nama_prodi);
        ?>
    </h6>
    <hr>
    <hr>
    <h1 class="text-center">Silabus</h1>
    <?php
    $kd_dosen = $_SESSION['kd_dosen'];
    $kd_matkul = $_SESSION['kd_matkul'];
    $kd_prodi = $_SESSION['kd_prodi'];

    $sqlMatkul = "SELECT * FROM matkul WHERE kd_matkul = '$kd_matkul'";
    $queryMatkul = mysqli_query($conn, $sqlMatkul) or die($sqlMatkul);
    $resultMatkul = mysqli_fetch_assoc($queryMatkul);

    echo "<p><b>Mata Kuliah: </b> " . $resultMatkul['nm_matkul'] . "</p>";
    ?>

    <h5>Capaian Pembelajaran:</h5>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Keterangan</th>
        </tr>
        <?php
        $kd_dosen = $_SESSION['kd_dosen'];
        $kd_matkul = $_SESSION['kd_matkul'];

        $sqlBidangKajian = "SELECT * FROM bidang_kajian LEFT JOIN matkul ON bidang_kajian.kd_matkul = matkul.kd_matkul WHERE matkul.kd_dosen = '$kd_dosen' AND matkul.kd_matkul = '$kd_matkul'";
        $queryBidangKajian = mysqli_query($conn, $sqlBidangKajian) or die($sqlBidangKajian);

        $x = 0;

        while ($data = mysqli_fetch_assoc($queryBidangKajian)) {
            $kd_bk = $data['kd_bk'];
            $bidang_kajian = $data['bidang_kajian'];
        ?>
            <tr>
                <td><?= ++$x ?></td>
                <td><?= $kd_bk; ?></td>
                <td><?= $bidang_kajian; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h5 class="mt-4">Deskripsi Mata Kuliah</h5>
    <p>
        <?php
        $kd_matkul = $_SESSION['kd_matkul'];

        $sqlCapmatkul = "SELECT * FROM capmatkul LEFT JOIN matkul ON capmatkul.kd_matkul = matkul.kd_matkul WHERE matkul.kd_matkul = '$kd_matkul'";
        $queryCapmatkul = mysqli_query($conn, $sqlCapmatkul) or die($sqlCapmatkul);
        $resultCapmatkul = mysqli_fetch_assoc($queryCapmatkul);

        echo $resultCapmatkul['deskripsi_capmatkul'];
        ?>
    </p>

    <h5 class="mt-4">Bidang Kajian:</h5>
    <table class="table mb-4">
        <tr>
            <th>No</th>
            <th>Keterangan</th>
        </tr>
        <?php
        $kd_dosen = $_SESSION['kd_dosen'];
        $kd_matkul = $_SESSION['kd_matkul'];

        $sqlBidangKajian = "SELECT * FROM bidang_kajian LEFT JOIN matkul ON bidang_kajian.kd_matkul = matkul.kd_matkul WHERE matkul.kd_dosen = '$kd_dosen' AND matkul.kd_matkul = '$kd_matkul'";
        $queryBidangKajian = mysqli_query($conn, $sqlBidangKajian) or die($sqlBidangKajian);

        $x = 0;

        while ($data = mysqli_fetch_assoc($queryBidangKajian)) {
            $bidang_kajian = $data['bidang_kajian'];
        ?>
            <tr>
                <td><?= ++$x ?></td>
                <td><?= $bidang_kajian; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <!-- INI MEMPERINDAH SAJA KAKAK, TIDAK PERLU DI LOOP DARI DATABASE -->
    <h5 class="mt-4">Daftar Pustaka:</h5>
    <p>Utama: </p>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Keterangan</th>
        </tr>
        <tr>
            <td>1.</td>
            <td>Coronel, C., Morris, S., Ros, P. (2011). Database Systems</td>
        </tr>
    </table>
</body>

</html>