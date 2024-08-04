<?php
include '../koneksi.php';

if (isset($_SESSION['message'])) {
    echo "<script>alert('$_SESSION[message]');</script>";

    unset($_SESSION['message']);
}

$queryCount = "SELECT COUNT(*) AS count FROM penilaian";
$sqlCount = mysqli_query($conn, $queryCount);
$count = mysqli_fetch_assoc($sqlCount)['count'];

do {
    $num_kode_penilaian = str_pad(++$count, 3, "0", STR_PAD_LEFT);
    $kode_kode_penilaian = "PNSI" . $num_kode_penilaian;

    $queryCheck = "SELECT * FROM penilaian WHERE kd_penilaian= '$kode_kode_penilaian'";
    $sqlCheck = mysqli_query($conn, $queryCheck);
} while (mysqli_num_rows($sqlCheck) != 0);

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

<style>
    .container {
        margin-top: 100px;
    }
</style>

<body class="container">
    <!-- <center> -->
    <div class="container">
        <form action="./penilaiansave.php" method="GET" name="form_penilaian">
            <label>Kode Penilaian</label>
            <input type="text" name="kd_penilaian" id="kd_penilaian" value="<?= $kode_kode_penilaian; ?>" readonly class="form-control">

            <br>

            <label>Minggu</label>
            <input type="number" name="minggu" id="minggu" class="form-control">

            <br>

            <label>Sub CPMK</label>
            <input type="text" name="sub_cpmk" id="sub_cpmk" class="form-control">

            <br>

            <label>Bidang Kajian</label>
            <input type="text" name="bidang_kajian" id="bidang_kajian" class="form-control">

            <br>

            <label>Metode Pembelajaran</label>
            <input type="text" name="metode_pembelajaran" id="metode_pembelajaran" class="form-control">

            <br>

            <label>Estimasi Waktu</label>
            <input type="text" name="estimasi_waktu" id="estimasi_waktu" class="form-control">

            <br>

            <label>Pengalaman Belajar</label>
            <input type="text" name="pengalaman_belajar" id="pengalaman_belajar" class="form-control">

            <br>

            <label>Kriteria Penilaian</label>
            <input type="text" name="kriteria" id="kriteria" class="form-control">

            <br>

            <label>Bentuk Penilaian</label>
            <input type="text" name="bentuk" id="bentuk" class="form-control">

            <br>

            <label>Kode Dosen</label>
            <input type="text" name="kd_dosen" id="kd_dosen" class="form-control">

            <br>

            <input type="submit" name="button" value="Add" id="button" class="btn btn-primary">
        </form>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Kode Penilaian</th>
                    <th>Minggu</th>
                    <th>Sub CPMK</th>
                    <th>Bidang Kajian</th>
                    <th>Metode Pembelajaran</th>
                    <th>Estimasi Waktu</th>
                    <th>Pengalaman Belajar</th>
                    <th>Kriteria Penilaian</th>
                    <th>Bentuk Penilaian</th>
                    <th>Kode Dosen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlPenilaian = "SELECT * FROM penilaian";
                $queryPenilaian = mysqli_query($conn, $sqlPenilaian) or die($sqlPenilaian);

                while ($data = mysqli_fetch_array($queryPenilaian)) {
                    $kode_penilaian = $data['kd_penilaian'];
                    $minggu = $data['minggu'];
                    $sub_cpmk = $data['sub_cpmk'];
                    $bidang_kajian = $data['bidang_kajian'];
                    $metode_pembelajaran = $data['metode_pembelajaran'];
                    $estimasi_waktu = $data['estimasi_waktu'];
                    $pengalaman_belajar = $data['pengalaman_belajar'];
                    $kriteria = $data['kriteria'];
                    $bentuk = $data['bentuk'];
                    $kd_dosen = $data['kd_dosen'];
                ?>
                    <tr>
                        <td><?php echo $kode_penilaian; ?></td>
                        <td><?php echo $minggu; ?></td>
                        <td><?php echo $sub_cpmk; ?></td>
                        <td><?php echo $bidang_kajian; ?></td>
                        <td><?php echo $metode_pembelajaran; ?></td>
                        <td><?php echo $estimasi_waktu; ?></td>
                        <td><?php echo $pengalaman_belajar; ?></td>
                        <td><?php echo $kriteria; ?></td>
                        <td><?php echo $bentuk; ?></td>
                        <td><?php echo $kd_dosen; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="editPenilaian('<?= $kode_penilaian; ?>', '<?= $minggu; ?>', '<?= $sub_cpmk; ?>', '<?= $bidang_kajian; ?>', '<?= $metode_pembelajaran; ?>', '<?= $estimasi_waktu; ?>', '<?= $pengalaman_belajar; ?>','<?= $kriteria; ?>', '<?= $bentuk; ?>', '<?= $kd_dosen; ?>')">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deletePenilaian('<?= $kode_penilaian; ?>')">Delete</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- </center> -->
</body>

<script>
    function editPenilaian(kode_penilaian, minggu, sub_cpmk, bidang_kajian, metode_pembelajaran, estimasi_waktu, pengalaman_belajar, kriteria, bentuk, kd_dosen) {
        document.getElementById('kd_penilaian').value = kode_penilaian;
        document.getElementById('minggu').value = minggu;
        document.getElementById('sub_cpmk').value = sub_cpmk;
        document.getElementById('bidang_kajian').value = bidang_kajian;
        document.getElementById('metode_pembelajaran').value = metode_pembelajaran;
        document.getElementById('estimasi_waktu').value = estimasi_waktu;
        document.getElementById('pengalaman_belajar').value = pengalaman_belajar;
        document.getElementById('kriteria').value = kriteria;
        document.getElementById('bentuk').value = bentuk;
        document.getElementById('kd_dosen').value = kd_dosen;

        document.getElementById('button').value = "Update";
    }

    function deletePenilaian(kode_penilaian) {
        window.location.href = "./penilaiansave.php?kd_penilaian=" + kode_penilaian + "&button=Delete";
    }
</script>

</html>