<?php
    if (!empty($_POST)){
        $nim= $_POST['nim'];
        $nama= $_POST['nama'];
        $progdi= $_POST['progdi'];
       

        $file = file_get_contents('datamhs.json');
        $data = json_decode($file, true);

        unset($_POST['add']);

        $data['records'] = array_values($data['records']);
        array_push($data['records'], $_POST);
        file_put_contents("datamhs.json", json_encode($data));

        header("Location: praktikjason.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap">
    <meta name="author" content="MASKHUR">
    <title>Web Service - Latihan JSON [INSERT]</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style type="text/css">
        .navbar-default {
            background-color: #3b5998;
            font-size: 18px;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h4>UNIVERSITAS STIKUBANK SEMARANG</h4>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar"></div>
        </div>
    </nav>
    <!-- /.navbar -->
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
                <h3>Tambah Pengguna Baru</h3>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="inputnim">NIM</label>
                        <input type="text" class="form-control" required="required" id="inputnim" name="nim" placeholder="Nim">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputnama">Nama</label>
                        <input type="text" class="form-control" required="required" id="inputnama" name="nama" placeholder="Nama">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputprogdi">Progdi</label>
                        <input type="text" class="form-control" required="required" id="inputprogdi" name="progdi" placeholder="Progdi">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-success" type="submit"> T A M B A H </button>
                        <a href="praktikjason.php" class="btn btn-default">B A C K</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
                    