<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitoring Suhu dan Kelembaban</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1 class="h1" align="center">SISTEM MONITORING SUHU DAN KELEMBABAN UDARA</h1>
<p class="h1" align="center"></p>

<?php
    include "koneksi.php";

    $query = mysqli_query($koneksi, "SELECT * FROM tbmonitor ORDER BY id DESC LIMIT 1");
    while ($data = mysqli_fetch_array($query)) {
?>

<div class="kontainer">
    <div class="kotak">
        <h2 class="h2">SUHU</h2>
        <div class="nilai">
            <?php echo $data['suhu'] ?>°C
        </div>
    </div>
    <div class="kotak">
        <h2 class="h2">KELEMBABAN</h2>
        <div class="nilai">
            <?php echo $data['kelembaban'] ?>%
        </div>
    </div>
</div>

<?php } ?>
</body>
</html>
