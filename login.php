<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body{
    padding:50px;
}
.container{
    max-width: 600px;
    margin:0 auto;
    padding:50px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.form-group{
    margin-bottom:30px;
}
</style>
<body>
    <div class="container" style="text-align: center;">
    <h5>Selamat Datang Di Monitoring Suhu dan Kelembapan</h5>
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <img src="upin/logo.png" style="width: 300px; margin-bottom: 50px; margin-top: 40px">
      <form action="login.php" method="post">
        <div class="form-group" style="text-align: left;">
            <h6>Masukkan Email :</h6>
            <input type="email" placeholder="Email" name="email" class="form-control">
        </div>
        <div class="form-group" style="text-align: left;">
            <h6>Masukkan Password :</h6>
            <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <div class="row">
        <div class="col">
        <div class="form-check" style="text-align: left;">
            <input type="checkbox" class="form-check-input" id="cek1">
            <label class="form-check-label" for="cek1">Ingat Saya</label>
        </div>
        </div>
        <div class="col" style="text-align: right;">
        <div><p>Belum memiliki Akun? <a href="registration.php">Daftar</a></p></div>
        </div>
        </div>
        <div class="form-btn">
            <input type="submit" value="Masuk" name="login" class="btn btn-primary">
        </div>
      </form>
    </div>
</body>
</html>