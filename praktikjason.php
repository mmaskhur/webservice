<?php
//membaca semua data yang ada di file datamhs.jason
//kedalam bentuk string
$getfile = file_get_contents('datamhs.json');
//menerjemahkan string JSON menjadi variable PHP
$jsonfile = json_decode($getfile);
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" conten="width=device-width", initial-scale="1.0">
    <meta nam="author" content="ElArif">
    <tittle>Web Service - Latihan JSON</tittle>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/latwebservice3.css">
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
         <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar=collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a href="praktikjason.php" class=navbar-brand>
            UNIVERSITAS STIKUBANK SEMARANG
            </a>
            </div>
            <div class="navbar=collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                <li class="clr1 active"><a href="praktikjson.php">Home</a></li>
                <li class="clr2"><a href="">JSON</a></li>
                </ul>
            </div>
        </div>
    </nav>
    </br>
    </br>
    </br>
    <div class="container">
        <div class="jumbotron">
            <h3>Latihan Web Service - JSON</h3>
            <p>Data Mahasiswa Universitas Stikubank</p>
        </div>
    </div>
            <div class="container">
                <div class="btn-toolbar">
                    <a href="insert.php" class="btn btn-primary"><i class="icon-plus">
                    </i> Tambah Data </a>
                    <div class="btn-group"></div>
                </div>
                </div>
                </br>
                </br>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <table class="table table=striped table-bordered table-hover">
                            <tr>
                              <th>No.</th>
                              <th>NIM</th>
                              <th>NAMA</th>
                              <th>PROGDI</th>
                              <th>Action</th>                         
                            </tr>
                        <?php 
                            $no=0; 
                            foreach($jsonfile->records as $index => $obj):
                            $no++; ?>
                        
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $obj->nim; ?></td>
                            <td><?php echo $obj->nama; ?></td>
                            <td><?php echo $obj->progdi; ?></td>
                            <td>
                                <a class ="btn btn-xs btn-primary"
                                href="update.php?id=<?php echo $index; ?>">Edit</a>
                                <a class ="btn btn-xs btn-danger"
                                href="delete.php?id=<?php echo $index; ?>">Delete</a>
                            </td>
                            <?php endforeach; ?>
                            </tr>
                    </table>   
                    </div>
                    </div>
                    </div>
                    </body>
                    </html>

