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


    <table class="table">
        <tr>
            <th colspan="3">
                <h1>RENCANA PEMBELAJARAN SEMESTER</h1>
            </th>
        </tr>
        
        <th colspan="2">Capaian Pembelajaran Prodi</th>
        <th><a href="../capdi/capdi.php" class="btn btn-warning">Edit</a></th>
        <?php
        $kd_prodi = $_SESSION['kd_prodi'];

        $sqlCapdi = "SELECT * FROM capdi WHERE kd_prodi = '$kd_prodi'";
        $queryCapdi = mysqli_query($conn, $sqlCapdi) or die($sqlCapdi);

        while ($data = mysqli_fetch_assoc($queryCapdi)) {
            $capaian_pembelajaran = $data['capaian_pembelajaran'];
        ?>
            <tr>
                <td colspan="3"><?php echo $capaian_pembelajaran; ?></td>
                <!-- <td>
                    <a href="../capdi/capdi.php" class="btn btn-warning">Edit</a>
                </td> -->
            </tr>
        <?php
        }
        ?>

        <th colspan="2">Capaian Pembelajaran Mata Kuliah</th>
        <th><a href="../capmatkul/capmatkul.php" class="btn btn-warning">Edit</a></th>
        <?php
        $kd_dosen = $_SESSION['kd_dosen'];

        $sqlCapmatkul = "SELECT * FROM capmatkul LEFT JOIN matkul ON capmatkul.kd_matkul = matkul.kd_matkul WHERE matkul.kd_dosen = '$kd_dosen'";
        $queryCapmatkul = mysqli_query($conn, $sqlCapmatkul) or die($sqlCapmatkul);

        while ($data = mysqli_fetch_assoc($queryCapmatkul)) {
            $deskripsi_capmatkul = $data['deskripsi_capmatkul'];
        ?>
            <tr>
                <td colspan="3"><?php echo $deskripsi_capmatkul; ?></td>
                <!-- <td>
                    <a href="../capmatkul/capmatkul.php" class="btn btn-warning">Edit</a>
                </td> -->
            </tr>
        <?php
        }
        ?>

        <th colspan="2">Bidang Kajian</th>
        <th><a href="../bidang_kajian/bidang_kajian.php" class="btn btn-warning">Edit</a></th>
        <?php
        $kd_dosen = $_SESSION['kd_dosen'];
        $kd_matkul = $_SESSION['kd_matkul'];

        $sqlBidangKajian = "SELECT * FROM bidang_kajian LEFT JOIN matkul ON bidang_kajian.kd_matkul = matkul.kd_matkul WHERE matkul.kd_dosen = '$kd_dosen' AND matkul.kd_matkul = '$kd_matkul'";
        $queryBidangKajian = mysqli_query($conn, $sqlBidangKajian) or die($sqlBidangKajian);

        while ($data = mysqli_fetch_assoc($queryBidangKajian)) {
            $bidang_kajian = $data['bidang_kajian'];
        ?>
            <tr>
                <td colspan="3"><?php echo $bidang_kajian; ?></td>
                <!-- <td>
                    <a href="../bidang_kajian/bidang_kajian.php" class="btn btn-warning">Edit</a>
                </td> -->
            </tr>
        <?php
        }
        ?>

        <th colspan="2">Penilaian</th>
        <th><a href="../penilaian/penilaian.php" class="btn btn-warning">Edit</a></th>
        <?php
        $kd_dosen = $_SESSION['kd_dosen'];
        $kd_matkul = $_SESSION['kd_matkul'];

        $sqlPenilaian = "SELECT * FROM penilaian WHERE kd_dosen = '$kd_dosen'";
        $queryPenilaian = mysqli_query($conn, $sqlPenilaian) or die($sqlPenilaian);

        while ($data = mysqli_fetch_assoc($queryPenilaian)) {
            $kd_penilaian = $data['kd_penilaian'];
        ?>
            <tr>
                <td colspan="3"><?php echo $kd_penilaian; ?></td>
                <!-- <td>
                    <a href="../penilaian/penilaian.php" class="btn btn-warning">Edit</a>
                </td> -->
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>