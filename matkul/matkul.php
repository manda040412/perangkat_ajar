<?php
include '../koneksi.php';

if (isset($_SESSION['message'])) {
    echo "<script>alert('$_SESSION[message]');</script>";

    unset($_SESSION['message']);
}

$queryCount = "SELECT COUNT(*) AS count FROM matkul";
$sqlCount = mysqli_query($conn, $queryCount);
$count = mysqli_fetch_assoc($sqlCount)['count'];

do {
    $num_kode_matkul = str_pad(++$count, 3, "0", STR_PAD_LEFT);
    $kode_matkul = "MKSI" . $num_kode_matkul;

    $queryCheck = "SELECT * FROM matkul WHERE kd_matkul = '$kode_matkul'";
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
        <form action="./matkulsave.php" method="GET" name="form_matkul">
            <label>Kode Mata Kuliah</label>
            <input type="text" name="kd_matkul" id="kd_matkul" value="<?= $kode_matkul; ?>" readonly class="form-control">

            <br>

            <label>Nama Mata Kuliah</label>
            <input type="text" name="nm_matkul" id="nm_matkul" class="form-control">

            <br>

            <label>SKS</label>
            <input type="text" name="sks" id="sks" class="form-control">

            <br>

            <label>Nama Dosen</label>
            <select id="kd_dosen" name="kd_dosen" class="form-control">
                <option value="" selected disabled>Pilih Dosen</option>
                <?php
                $sqlDosen = "SELECT * FROM dosen";
                $queryDosen = mysqli_query($conn, $sqlDosen) or die($sqlDosen);

                while ($data = mysqli_fetch_array($queryDosen)) {
                    $kode_dosen = $data['kd_dosen'];
                    $nama_dosen = $data['nm_dosen'];
                ?>
                    <option value="<?php echo $kode_dosen; ?>"><?php echo $nama_dosen; ?></option>
                <?php
                }
                ?>
            </select>

            <!-- <br>

            <label>Rubrik Penilaian</label>
            <select id="kd_rubrik" name="kd_rubrik" class="form-control">
                <option value="" selected disabled>Pilih Rubrik</option>
                <?php
                $sqlRubrikPenilaian = "SELECT * FROM rubrik_penilaian";
                $queryRubrikPenilaian = mysqli_query($conn, $sqlRubrikPenilaian) or die($sqlRubrikPenilaian);

                while ($data = mysqli_fetch_array($queryRubrikPenilaian)) {
                    $kode_rubrik = $data['kd_rubrik'];
                    $nama_rubrik = $data['grade'];
                ?>
                    <option value="<?php echo $kode_rubrik; ?>"><?php echo $nama_rubrik; ?></option>
                <?php
                }
                ?>
            </select> -->

            <br>

            <label>Prodi</label>
            <select id="kd_prodi" name="kd_prodi" class="form-control">
                <option value="" selected disabled>Pilih Prodi</option>
                <?php
                $sqlProdi = "SELECT * FROM prodi";
                $queryProdi = mysqli_query($conn, $sqlProdi) or die($sqlProdi);

                while ($data = mysqli_fetch_array($queryProdi)) {
                    $kode_prodi = $data['kd_prodi'];
                    $nama_prodi = $data['nama_prodi'];
                ?>
                    <option value="<?php echo $kode_prodi; ?>"><?php echo $nama_prodi; ?></option>
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
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nama Dosen</th>
                    <!-- <th>Kode Rubrik Penilaian</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlDosen = "SELECT * FROM matkul LEFT JOIN dosen ON matkul.kd_dosen = dosen.kd_dosen";
                $queryDosen = mysqli_query($conn, $sqlDosen) or die($sqlDosen);

                while ($data = mysqli_fetch_array($queryDosen)) {
                    $kode_matkul = $data['kd_matkul'];
                    $nama_matkul = $data['nm_matkul'];
                    $sks = $data['sks'];
                    $kode_dosen = $data['kd_dosen'];
                    // $kode_rubrik = $data['kd_rubrik'];
                    $nama_dosen = $data['nm_dosen'];
                    $kode_prodi = $data['kd_prodi'];
                    // $grade = $data['grade'];
                ?>
                    <tr>
                        <td><?php echo $kode_matkul; ?></td>
                        <td><?php echo $nama_matkul; ?></td>
                        <td><?php echo $sks; ?></td>
                        <td><?php echo $nama_dosen; ?></td>
                        <!-- <td><?php echo $kode_rubrik; ?></td> -->
                        <td>
                            <button type="button" class="btn btn-warning" onclick="editMatkul('<?= $kode_matkul; ?>', '<?= $nama_matkul; ?>', '<?= $sks; ?>', '<?= $kode_dosen; ?>', '<?= $kode_prodi; ?>')">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deleteMatkul('<?= $kode_matkul; ?>')">Delete</button>
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
    function editMatkul(kode_matkul, nama_matkul, sks, kode_dosen, kode_prodi) {
        document.getElementById('kd_matkul').value = kode_matkul;
        document.getElementById('nm_matkul').value = nama_matkul
        document.getElementById('sks').value = sks;
        document.getElementById('kd_dosen').value = kode_dosen;
        document.getElementById('kd_prodi').value = kode_prodi;
        // document.getElementById('kd_rubrik').value = kode_rubrik;

        document.getElementById('button').value = "Update";
    }

    function deleteMatkul(kode_matkul) {
        window.location.href = "./matkulsave.php?kd_matkul=" + kode_matkul + "&button=Delete";
    }
</script>

</html>