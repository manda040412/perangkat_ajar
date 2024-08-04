<?php
include '../koneksi.php';

if (isset($_SESSION['message'])) {
    echo "<script>alert('$_SESSION[message]');</script>";

    unset($_SESSION['message']);
}

$queryCount = "SELECT COUNT(*) AS count FROM bidang_kajian";
$sqlCount = mysqli_query($conn, $queryCount);
$count = mysqli_fetch_assoc($sqlCount)['count'];

do {
    $num_kode_bidang_kajian = str_pad(++$count, 3, "0", STR_PAD_LEFT);
    $kode_bidang_kajian = "BKSBD" . $num_kode_bidang_kajian;

    $queryCheck = "SELECT * FROM bidang_kajian WHERE kd_bk = '$kode_bidang_kajian'";
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
        <form action="./bidang_kajiansave.php" method="GET" name="form_kajian">
            <label>Kode Bidang Kajian</label>
            <input type="text" name="kd_bk" id="kd_bk" value="<?= $kode_bidang_kajian; ?>" readonly class="form-control">

            <br>

            <label>Bidang Kajian</label>
            <input type="text" name="bidang_kajian" id="bidang_kajian" class="form-control">

            <br>

            <label>Kode Mata Kuliah</label>
            <input type="text" name="kd_matkul" id="kd_matkul" class="form-control">

            <br>

            <input type="submit" name="button" value="Add" id="button" class="btn btn-primary">
        </form>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Kode Bidang Kajian</th>
                    <th>Bidang Kajian</th>
                    <th>Kode Mata Kuliah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlbidang_kajian = "SELECT * FROM bidang_kajian";
                $querybidang_kajian = mysqli_query($conn, $sqlbidang_kajian) or die($sqlbidang_kajian);

                while ($data = mysqli_fetch_array($querybidang_kajian)) {
                    $kode_bk = $data['kd_bk'];
                    $bk = $data['bidang_kajian'];
                    $kode_matkul = $data['kd_matkul'];
                ?>
                    <tr>
                        <td><?php echo $kode_bk; ?></td>
                        <td><?php echo $bk; ?></td>
                        <td><?php echo $kode_matkul; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="editKajian('<?= $kode_bk; ?>', '<?= $bk; ?>', '<?= $kode_matkul; ?>')">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deleteKajian('<?= $kode_bk; ?>')">Delete</button>
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
    function editKajian(kode_bk, bk, kode_matkul) {
        document.getElementById('kd_bk').value = kode_bk;
        document.getElementById('bidang_kajian').value = bk;
        document.getElementById('kd_matkul').value = kode_matkul;

        document.getElementById('button').value = "Update";
    }

    function deleteKajian(kode_bk) {
        window.location.href = "./bidang_kajiansave.php?kd_bk=" + kode_bk + "&button=Delete";
    }
</script>

</html>