<?php
include '../koneksi.php';

if (isset($_SESSION['message'])) {
    echo "<script>alert('$_SESSION[message]');</script>";

    unset($_SESSION['message']);
}
$queryCount = "SELECT COUNT(*) AS count FROM pelaporan";
$sqlCount = mysqli_query($conn, $queryCount);
$count = mysqli_fetch_assoc($sqlCount)['count'];

do {
    $num_kode_pelaporan = str_pad(++$count, 3, "0", STR_PAD_LEFT);
    $kode_kode_pelaporan = "PEL" . $num_kode_pelaporan;

    $queryCheck = "SELECT * FROM pelaporan WHERE kd_pelaporan = '$kode_kode_pelaporan'";
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
        <form action="./pelaporansave.php" method="GET" name="form_pelaporan">
            <label>Kode Pelaporan</label>
            <input type="text" name="kd_pelaporan" id="kd_pelaporan" value="<?= $kode_kode_pelaporan; ?>" readonly class="form-control">

            <br>

            <label>Isi Pelaporan</label>
            <input type="text" name="isi_pelaporan" id="isi_pelaporan" class="form-control">

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
                    <th>Kode Pelaporan</th>
                    <th>Isi Pelaporan</th>
                    <th>Kode Dosen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlPelaporan = "SELECT * FROM pelaporan";
                $queryPelaporan = mysqli_query($conn, $sqlPelaporan) or die($sqlPelaporan);

                while ($data = mysqli_fetch_array($queryPelaporan)) {
                    $kode_pelaporan = $data['kd_pelaporan'];
                    $isi_pelaporan = $data['isi_pelaporan'];
                    $kd_dosen = $data['kd_dosen'];
                ?>
                    <tr>
                        <td><?php echo $kode_pelaporan; ?></td>
                        <td><?php echo $isi_pelaporan; ?></td>
                        <td><?php echo $kd_dosen; ?></td>
                        <td>
                            <!-- <button type="button" class="btn btn-warning" onclick="editPelaporan('<?= $kode_pelaporan; ?>', '<?= $isi_pelaporan; ?>', '<?= $kd_dosen; ?>')">Edit</button> -->
                            <!-- <button type="button" class="btn btn-danger" onclick="deletePelaporan('<?= $kode_pelaporan; ?>')">Delete</button> -->
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
    function editPelaporan(kode_pelaporan, isi_pelaporan, kd_dosen) {
        document.getElementById('kd_pelaporan').value = kode_pelaporan;
        document.getElementById('isi_pelaporan').value = isi_pelaporan;
        document.getElementById('kd_dosen').value = kd_dosen;

        document.getElementById('button').value = "Update";
    }

    function deletePelaporan(kode_pelaporan) {
        window.location.href = "./pelaporansave.php?kd_pelaporan=" + kode_pelaporan + "&button=Delete";
    }
</script>

</html>