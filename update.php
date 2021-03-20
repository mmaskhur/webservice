<?php
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $getfile = file_get_contents('datamhs.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $getfile = file_get_contents('datamhs.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post['nim'] = isset($_POST['nim']) ? $_POST['nim'] : "";
    $post['nama'] = isset($_POST['nama']) ? $_POST['nama'] : "";
    $post['progdi'] = isset($_POST['progdi']) ? $_POST['progdi'] : "";
    

    if ($jsonfile) {
        unset($all['records'][$id]);
        $all['records'][$id] = $post;
        $all['records'] = array_values($all['records']);
        file_put_contents("praktikjason.json", json_encode($all));
    }

    header("Location: praktikjason.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap">
    <meta name="author" content="EL Arif">
    <title>Web Service : Latihan JSON [UPDATE]</title>
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
            <div class="row">
                <h1>UBAH PENGGUNA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <?php if (isset($_GET['id'])) : ?>
                <form method="POST" action="update.php">
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <div class="form-group">
                        <label for="inputnim">NIM</label>
                        <input type="text" class="form-control" required="required" id="inputnim" value="<?php echo $jsonfile['nim']; ?>" name="fnim" placeholder="NIM">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputnama">Nama</label>
                        <input type="text" class="form-control" required="required" id="inputnama" value="<?php echo $jsonfile['nama']; ?>" name="nama" placeholder="Nama">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputprogdi">Progdi</label>
                        <input type="text" class="form-control" required="required" id="inputprogdi" value="<?php echo $jsonfile['progdi']; ?>" name="progdi" placeholder="Progdi">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-success" type="submit"> UBAH DATA </button>
                        <a href="praktikjason.php" class="btn btn-default">KEMBALI</a>
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>