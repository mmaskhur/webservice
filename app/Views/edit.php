<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-8">
			<h2 class="my-3">Form Edit</h2>
			<?php $data = json_decode($akun, true) ?>
			<form action="/update/<?= $data['id']; ?>" method="post" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="row mb-3">
					<label for="username" class="col-sm-2 col-form-label">Username</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="username" name="username" value="<?= (old('username')) ? old('username') : $data['username'] ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="firstname" name="firstname" value="<?= (old('firstname')) ? old('firstname') : $data['firstname'] ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="lastname" name="lastname" value="<?= (old('lastname')) ? old('lastname') : $data['lastname'] ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="address" class="col-sm-2 col-form-label">Address</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="age" name="address" value="<?= (old('address')) ? old('address') : $data['address'] ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="age" class="col-sm-2 col-form-label">Age</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="age" name="age" value="<?= (old('age')) ? old('age') : $data['age'] ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="password" name="password" value="">
					</div>
				</div>
				<div class=" form-groupt row">
					<div class="col-sl-10">
						<button type="submit" class="btn btn-primary">Tambah Data</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>