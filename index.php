<!-- <!DOCTYPE html>
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
            <form action="index_save.php" method="POST">
                <label>Kode Dosen</label>
                <input type="text" name="kode_dosen" id="kode_dosen" style="margin-left: 40px;">

                <br>

                <label>Prodi</label>
                <input type="text" name="prodi" id="prodi" style="margin-left: 85px;">

                <br>

                <label>Kode Mata Kuliah</label>
                <input type="text" name="kode_mata_kuluiah" id="kode_mata_kuluiah">

                <br><br>

                <button type="submit">Masuk</button>
            </form>
        </div>
    </center>
</body>

</html> -->

<?php
include_once('koneksi.php');

// echo $_POST['login'];
if (isset($_POST['login'])) {
  // $kd_dosen = $_POST['kd_dosen'];
  // $kd_prodi = $_POST['kd_prodi'];
  // $kd_matkul = $_POST['kd_matkul'];

  // $sql = "SELECT * FROM new_frontend WHERE kd_dosen='$kd_dosen'";
  // $result = mysqli_query($conn, $sql);

  // if ($result->num_rows > 0) {
  //   $row = mysqli_fetch_assoc($result);
  //   $_SESSION['kd_dosen'] = $row['kd_dosen'];
  //   $_SESSION['kd_prodi'] = $row['kd_prodi'];
  //   $_SESSION['kd_matkul'] = $row['kd_matkul'];
  // if(){
  // }
  // else {
  //   $loginStatus = false;
  // }
  //   if ($_SESSION['kd_dosen'] == $row['kd_dosen']) {
  //     header("Location: home.php");
  //   }
  // } else {
  //   $loginStatus = false;
  // }
  // $conn->close();
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- <style>
    .bg_img {
      background-image: url('img/logo.png');
      height: 100%;
      width: 100%;
    }
  </style> -->
</head>

<body onload="getDataDosen()">
  <div class="d-flex align-items-center" style="height:100vh;">
    <div class="flex-grow-1 w-50 p-4 flex-sm-grow-0">
      <h3 class="mt-4">Login</h3>
      <form action="index_save.php" method="GET">
        <input type="text" name="kd_dosen" id="kd_dosen" class="form-control mt-4" placeholder="Input your lecturer code here" value="" onkeyup="getDataDosen(this.value)">
        <!-- <input type="text" name="kd_prodi" id="kd_prodi" class="form-control mt-4" placeholder="Input your study program code" value=""> -->
        <!-- make kd prodi as select -->
        <select name="kd_matkul" id="kd_matkul" class="form-control mt-4">

        </select>
        <!-- <a href="student.php" class="btn btn-primary mt-3">Login</a> -->
        <button type="submit" class="btn btn-primary mt-3" value="Login" name="button" id="button">Login</button>
      </form>
      <!-- <p class="mt-4">Don't have an account? <a href="register.php">Register</a> here.</p> -->

      <?php if (isset($_SESSION['loginStatus']) && $_SESSION['loginStatus'] == false) : ?>
        <div class='alert alert-danger mt-3' role='alert'>
          Invalid Credentials!
        </div>
      <?php endif; ?>
      <?php
      unset($_SESSION['loginStatus']);
      ?>
    </div>

    <div class="bg_img flex-shrink-1 d-none d-sm-block">
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

<script>
  function getDataDosen(kd_dosen) {
    fetch(`index_save.php?kd_dosen=${kd_dosen}+&button=getDataDosen`)
      .then(response => response.json())
      .then(data => {
        document.getElementById('kd_matkul').innerHTML = data
      })
  }
</script>