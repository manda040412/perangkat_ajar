<?php
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .container {
        margin-top: 100px;
    }
</style>

<body>
    <center>
        <div class="container">
            <form action="matkul_save.php" method="POST">
                <label>Kode Mata Kuliah</label>
                <input type="text" name="kode_dosen" id="kode_dosen" style="margin-left: 40px;">

                <br>

                <label>Nama Mata Kuliah</label>
                <input type="text" name="prodi" id="prodi" style="margin-left: 85px;">

                <br>

                <label>SKS</label>
                <input type="number" name="kode_mata_kuluiah" id="kode_mata_kuluiah">

                <br>

                <label>Nama Dosen</label>
                <select name="dosen" id="dosen">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>

                <br>

                <label>Rubrik Penilaian</label>

                <br><br>

                <input type="submit" value="Add" id="button" name="button">
            </form>
        </div>
    </center>
</body>

</html>