<?php
include '../koneksi.php';

if (isset($_SESSION['message'])) {
    echo "<script>alert('$_SESSION[message]');</script>";

    unset($_SESSION['message']);
}

$queryCount = "SELECT COUNT(*) AS count FROM prolus";
$sqlCount = mysqli_query($conn, $queryCount);
$count = mysqli_fetch_assoc($sqlCount)['count'];

do {
    $num_kode_prolus = str_pad(++$count, 3, "0", STR_PAD_LEFT);
    $kode_kode_prolus = "PRSI" . $num_kode_prolus;

    $queryCheck = "SELECT * FROM prolus WHERE kd_prolus = '$kode_kode_prolus'";
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
        <form action="./prolussave.php" method="GET" name="form_prolus">
            <label>Kode Profil Lulusan</label>
            <input type="text" name="kd_prolus" id="kd_prolus" value="<?= $kode_kode_prolus; ?>" readonly class="form-control">

            <br>

            <label>Profil Lulusan</label>
            <input type="text" name="profil_lulusan" id="profil_lulusan" class="form-control">

            <br>

            <label>Deskripsi Profil Lulusan</label>
            <input type="text" name="deskripsi_prolus" id="deskripsi_prolus" class="form-control">

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
                    <th>Kode Profil Lulusan</th>
                    <th>Profil Lulusan</th>
                    <th>Deskripsi Profil Lulusan</th>
                    <th>Kode Prodi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlProlus = "SELECT * FROM prolus";
                $queryProlus = mysqli_query($conn, $sqlProlus) or die($sqlProlus);

                while ($data = mysqli_fetch_array($queryProlus)) {
                    $kode_prolus = $data['kd_prolus'];
                    $prolus = $data['profil_lulusan'];
                    $deskripsi_prolus = $data['deskripsi_prolus'];
                    $kode_prodi = $data['kd_prodi'];
                ?>
                    <tr>
                        <td><?php echo $kode_prolus; ?></td>
                        <td><?php echo $prolus; ?></td>
                        <td><?php echo $deskripsi_prolus; ?></td>
                        <td><?php echo $kode_prodi; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="editProlus('<?= $kode_prolus; ?>', '<?= $prolus; ?>', '<?= $deskripsi_prolus; ?>', '<?= $kode_prodi; ?>')">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deleteProlus('<?= $kode_prolus; ?>')">Delete</button>
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
    function editProlus(kode_prolus, prolus, deskripsi_prolus, kode_prodi) {
        document.getElementById('kd_prolus').value = kode_prolus;
        document.getElementById('profil_lulusan').value = prolus;
        document.getElementById('deskripsi_prolus').value = deskripsi_prolus;
        document.getElementById('kd_prodi').value = kode_prodi;

        document.getElementById('button').value = "Update";
    }

    function deleteProlus(kode_prolus) {
        window.location.href = "./prolussave.php?kd_prolus=" + kode_prolus + "&button=Delete";
    }
</script>

</html>