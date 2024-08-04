<?php
include '../koneksi.php';

if (isset($_SESSION['message'])) {
    echo "<script>alert('$_SESSION[message]');</script>";

    unset($_SESSION['message']);
}
$queryCount = "SELECT COUNT(*) AS count FROM capdi";
$sqlCount = mysqli_query($conn, $queryCount);
$count = mysqli_fetch_assoc($sqlCount)['count'];

do {
    $num_kode_capdi = str_pad(++$count, 3, "0", STR_PAD_LEFT);
    $kode_kode_capdi = "CPDSI" . $num_kode_capdi;

    $queryCheck = "SELECT * FROM capdi WHERE kd_capdi = '$kode_kode_capdi'";
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
        <form action="./capdisave.php" method="GET" name="form_capdi">
            <label>Kode Capaian Pembelajaran Prodi</label>
            <input type="text" name="kd_capdi" id="kd_capdi" value="<?= $kode_kode_capdi; ?>" readonly class="form-control">

            <br>

            <label>Capaian Pembelajaran Prodi</label>
            <input type="text" name="capaian_pembelajaran" id="capaian_pembelajaran" class="form-control">

            <br>

            <label>Kode Prodi</label>
            <!-- <input type="text" name="kd_prodi" id="kd_prodi" class="form-control"> -->
            <select name="kd_prodi" id="kd_prodi" class="form-control">
                <option value="" selected disabled>Pilih Prodi</option>
                <?php
                $sqlProdi = "SELECT * FROM prodi";
                $queryProdi = mysqli_query($conn, $sqlProdi) or die($sqlProdi);

                while ($data = mysqli_fetch_array($queryProdi)) {
                    $kode_prodi = $data['kd_prodi'];
                    $prodi = $data['nama_prodi'];
                ?>
                    <option value="<?= $kode_prodi; ?>"><?= $prodi; ?></option>
                <?php
                }
                ?>
            </select>

            <br>

            <input type="submit" name="button" value="Add" id="button" class="btn btn-primary">
        </form>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Kode Capdi</th>
                    <th>Capaian Pembelajaran</th>
                    <th>Kode Prodi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlCapdi = "SELECT * FROM capdi";
                $queryCapdi = mysqli_query($conn, $sqlCapdi) or die($sqlCapdi);

                while ($data = mysqli_fetch_array($queryCapdi)) {
                    $kode_capdi = $data['kd_capdi'];
                    $capdi = $data['capaian_pembelajaran'];
                    $kd_prodi = $data['kd_prodi'];
                ?>
                    <tr>
                        <td><?php echo $kode_capdi; ?></td>
                        <td><?php echo $capdi; ?></td>
                        <td><?php echo $kd_prodi; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="editCapdi('<?= $kode_capdi; ?>', '<?= $capdi; ?>', '<?= $kd_prodi; ?>')">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deleteCapdi('<?= $kode_capdi; ?>')">Delete</button>
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
    function editCapdi(kode_capdi, capdi, kd_prodi) {
        document.getElementById('kd_capdi').value = kode_capdi;
        document.getElementById('capaian_pembelajaran').value = capdi;
        document.getElementById('kd_prodi').value = kd_prodi;

        document.getElementById('button').value = "Update";
    }

    function deleteCapdi(kode_capdi) {
        window.location.href = "./capdisave.php?kd_capdi=" + kode_capdi + "&button=Delete";
    }
</script>

</html>