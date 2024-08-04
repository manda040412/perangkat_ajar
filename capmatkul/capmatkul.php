<?php
include '../koneksi.php';

if (isset($_SESSION['message'])) {
    echo "<script>alert('$_SESSION[message]');</script>";

    unset($_SESSION['message']);
}

$queryCount = "SELECT COUNT(*) AS count FROM capmatkul";
$sqlCount = mysqli_query($conn, $queryCount);
$count = mysqli_fetch_assoc($sqlCount)['count'];

do {
    $num_kode_capmatkul = str_pad(++$count, 3, "0", STR_PAD_LEFT);
    $kode_kode_capmatkul = "CPSBD" . $num_kode_capmatkul;

    $queryCheck = "SELECT * FROM capmatkul WHERE kd_capmatkul = '$kode_kode_capmatkul'";
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
        <form action="./capmatkulsave.php" method="GET" name="form_capmatkul">
            <label>Kode Capaian Mata Kuliah</label>
            <input type="text" name="kd_capmatkul" id="kd_capmatkul" value="<?= $kode_kode_capmatkul; ?>" readonly class="form-control">

            <br>

            <label>Deskripsi Capaian Mata Kuliah</label>
            <input type="text" name="deskripsi_capmatkul" id="deskripsi_capmatkul" class="form-control">

            <br>

            <label>Kode Mata Kuliah</label>
            <!-- <input type="text" name="kd_matkul" id="kd_matkul" class="form-control"> -->
            <select name="kd_matkul" id="kd_matkul" class="form-control">
                <option value="" selected disabled>Pilih Matkul</option>
                <?php
                $sqlMatkul = "SELECT * FROM matkul";
                $queryMatkul = mysqli_query($conn, $sqlMatkul) or die($sqlMatkul);

                while ($data = mysqli_fetch_array($queryMatkul)) {
                    $kode_matkul = $data['kd_matkul'];
                    $nama_matkul = $data['nm_matkul'];
                ?>
                    <option value="<?= $kode_matkul; ?>"><?= $nama_matkul; ?></option>
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
                    <th>Kode Capaian Mata Kuliah</th>
                    <th>Deskripsi Capaian Mata Kuliah</th>
                    <th>Kode Mata Kuliah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlCapmatkul = "SELECT * FROM capmatkul";
                $queryCapmatkul = mysqli_query($conn, $sqlCapmatkul) or die($sqlCapmatkul);

                while ($data = mysqli_fetch_array($queryCapmatkul)) {
                    $kode_capmatkul = $data['kd_capmatkul'];
                    $deskripsi_capmatkul = $data['deskripsi_capmatkul'];
                    $kode_matkul = $data['kd_matkul'];
                ?>
                    <tr>
                        <td><?php echo $kode_capmatkul; ?></td>
                        <td><?php echo $deskripsi_capmatkul; ?></td>
                        <td><?php echo $kode_matkul; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="editCapmatkul('<?= $kode_capmatkul; ?>', '<?= $deskripsi_capmatkul; ?>', '<?= $kode_matkul; ?>')">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deleteCapmatkul('<?= $kode_capmatkul; ?>')">Delete</button>
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
    function editCapmatkul(kode_capmatkul, deskripsi_capmatkul, kode_matkul) {
        document.getElementById('kd_capmatkul').value = kode_capmatkul;
        document.getElementById('deskripsi_capmatkul').value = deskripsi_capmatkul;
        document.getElementById('kd_matkul').value = kode_matkul;

        document.getElementById('button').value = "Update";
    }

    function deleteCapmatkul(kode_capmatkul) {
        window.location.href = "./capmatkulsave.php?kd_capmatkul=" + kode_capmatkul + "&button=Delete";
    }
</script>

</html>