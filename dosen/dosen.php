<?php
include '../koneksi.php';

if (isset($_SESSION['message'])) {
    echo "<script>alert('$_SESSION[message]');</script>";

    unset($_SESSION['message']);
}

$queryCount = "SELECT COUNT(*) AS count FROM dosen";
$sqlCount = mysqli_query($conn, $queryCount);
$count = mysqli_fetch_assoc($sqlCount)['count'];

do {
    $num_kode_dosen = str_pad(++$count, 3, "0", STR_PAD_LEFT);
    $kode_dosen = "DOS" . $num_kode_dosen;

    $queryCheck = "SELECT * FROM dosen WHERE kd_dosen = '$kode_dosen'";
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
        <form action="./dosensave.php" method="GET" name="form_dosen">
            <label>Kode Dosen</label>
            <input type="text" name="kd_dosen" id="kd_dosen" value="<?= $kode_dosen; ?>" readonly class="form-control">

            <br>

            <label>Nama Dosen</label>
            <input type="text" name="nm_dosen" id="nm_dosen" class="form-control">

            <br>

            <input type="submit" name="button" value="Add" id="button" class="btn btn-primary">
        </form>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Kode Dosen</th>
                    <th>Nama Dosen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlDosen = "SELECT * FROM dosen";
                $queryDosen = mysqli_query($conn, $sqlDosen) or die($sqlDosen);

                while ($data = mysqli_fetch_array($queryDosen)) {
                    $kode_dosen = $data['kd_dosen'];
                    $nama_dosen = $data['nm_dosen'];
                ?>
                    <tr>
                        <td><?php echo $kode_dosen; ?></td>
                        <td><?php echo $nama_dosen; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="editDosen('<?= $kode_dosen; ?>', '<?= $nama_dosen; ?>')">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deleteDosen('<?= $kode_dosen; ?>')">Delete</button>
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
    function editDosen(kode_dosen, nama_dosen) {
        document.getElementById('kd_dosen').value = kode_dosen;
        document.getElementById('nm_dosen').value = nama_dosen;

        document.getElementById('button').value = "Update";
    }

    function deleteDosen(kode_dosen) {
        window.location.href = "./dosensave.php?kd_dosen=" + kode_dosen + "&button=Delete";
    }
</script>

</html>