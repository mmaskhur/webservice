<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Rest Web Services</title>

	<body>

		<?php
		if (isset ($_POST['nim'])) {
			$url = 'http://localhost/tugasjson/jsonmhsw.php';
		//$data = "[{\"nim\":\".$_POST['nim'].\",\"nama\":\".$_POST['nama'].\",\"prodi\":\".$_POST['progdi'].\"}]";//
			$data="{\"nim\":\"".$_POST['nim']."\",\"nama\":\"".$_POST['nama']."\",\"prodi\":\"".$_POST['progdi']."\"}";
			// echo "datanya ".$data;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($ch);
			// echo "response ";
			// echo $response;
			curl_close($ch);

			if($response == 'berhasil' ){
				echo '
				<div class="alert alert-success" role="alert">
				Data Berhasil Ditambahkan !
				</div>
				';
			}

		}
		?>

		.<div></div>
		<form method="POST" action="index.php">
			<div class="form-group row">
				<label for="nim" class="col-sm-1 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nim" name='nim' placeholder="NIM">
				</div>
			</div>
			<div class="form-group row">
				<label for="nama" class="col-sm-1 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama" name='nama' placeholder="Nama">
				</div>
			</div>
			<div class="form-group row">
				<label for="progdi" class="col-sm-1 col-form-label">Progdi</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="progdi" name='progdi' placeholder="Progdi">
				</div>
			</div>
			<button type="submit" name='submit' id='submit' class="btn btn-primary">Tambah</button>		
		</form>


		<table class="table">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">NIM</th>
					<th scope="col">NAMA</th>
					<th scope="col">PROGDI</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$link = mysqli_connect('localhost', 'root', '', 'akademik');
				$query = 'SELECT * FROM mahasiswa';
				$result = mysqli_query($link,$query);

				if($result-> num_rows > 0){
					$i = 1;
					while ($row = $result-> fetch_assoc()) {
						echo '<tr><th scope="row" >'.$i."</th><td>".$row['nim']."</td><td>".$row['nama']."</td><td>".$row['progdi']."<td></tr>";
						$i++;
					}
					echo "</table>";
				}else {
					echo "0 daftar";
				}

				mysqli_close($link);
				?>
			</tbody>
		</table>



		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
	</html>