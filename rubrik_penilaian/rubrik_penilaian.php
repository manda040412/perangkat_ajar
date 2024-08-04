<?php
include '../koneksi.php';

if (isset($_SESSION['message'])) {
    echo "<script>alert('$_SESSION[message]');</script>";

    unset($_SESSION['message']);
}

$queryCount = "SELECT COUNT(*) AS count FROM rubrik_penilaian";
$sqlCount = mysqli_query($conn, $queryCount);
$count = mysqli_fetch_assoc($sqlCount)['count'];

do {
    $num_kode_rubrik = str_pad(++$count, 3, "0", STR_PAD_LEFT);
    $kode_kode_rubrik = "RPSI" . $num_kode_rubrik;

    $queryCheck = "SELECT * FROM rubrik_penilaian WHERE kd_rubrik = '$kode_kode_rubrik'";
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

<body>
    <!-- <center> -->
    <div class="container">
        <form action="./rubrik_penilaiansave.php" method="GET" name="form_rubrik">
            <label>Kode Rubrik Penilaian</label>
            <input type="text" name="kd_rubrik" id="kd_rubrik" value="<?= $kode_kode_rubrik; ?>" readonly class="form-control">

            <br>

            <label>Grade</label>
            <input type="text" name="grade" id="grade" class="form-control">

            <br>

            <label>Skor</label>
            <input type="text" name="skor" id="skor" class="form-control">

            <br>

            <label>Kriteria Penilaian</label>
            <input type="text" name="kriteria_penilaian" id="kriteria_penilaian" class="form-control">

            <br>

            <input type="submit" name="button" value="Add" id="button" class="btn btn-primary">
        </form>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Kode Rubrik Penilaian</th>
                    <th>Grade</th>
                    <th>Skor</th>
                    <th>Kriteria Penilaian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlRubrik = "SELECT * FROM rubrik_penilaian";
                $queryRubrik = mysqli_query($conn, $sqlRubrik) or die($sqlRubrik);

                while ($data = mysqli_fetch_array($queryRubrik)) {
                    $kode_rubrik = $data['kd_rubrik'];
                    $grade = $data['grade'];
                    $skor = $data['skor'];
                    $kriteria_penilaian = $data['kriteria_penilaian'];
                ?>
                    <tr>
                        <td><?php echo $kode_rubrik; ?></td>
                        <td><?php echo $grade; ?></td>
                        <td><?php echo $skor; ?></td>
                        <td><?php echo $kriteria_penilaian; ?></td>
                        <td>
                            <button type="button" onclick="editRubrik('<?= $kode_rubrik; ?>', '<?= $grade; ?>', '<?= $skor; ?>', '<?= $kriteria_penilaian; ?>')" class="btn btn-warning">Edit</button>
                            <button type="button" onclick="deleteRubrik('<?= $kode_rubrik; ?>')" class="btn btn-danger">Delete</button>
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
    function editRubrik(kode_rubrik, grade, skor, kriteria_penilaian) {
        document.getElementById('kd_rubrik').value = kode_rubrik;
        document.getElementById('grade').value = grade;
        document.getElementById('skor').value = skor;
        document.getElementById('kriteria_penilaian').value = kriteria_penilaian;

        document.getElementById('button').value = "Update";
    }

    function deleteRubrik(kode_rubrik) {
        window.location.href = "./rubrik_penilaiansave.php?kd_rubrik=" + kode_rubrik + "&button=Delete";
    }
</script>

</html>