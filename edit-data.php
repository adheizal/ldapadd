<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<?php
		include("navbar.php");
	?>
</head>
<body>
	<?php
		$id = $_GET['id'];
		include("koneksi.php");

	?>
	<div class="container">
	<h1>Tambah Data</h1></br>
		<div class="row">
			<div class="col-md-6 col-lg-6 col-xs-12">
				<form action="edit-data-proses.php" method="POST">
				<input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
				<tr>
					<td>User Name</td>
					<td>:</td>
					<td><input type="text" name="user_name" class="form-control" required=""></td>
				</tr>
				<tr>
					<td><input type="submit" name="rubah" value="Save"></td>
				</tr>
					<!--<?php 
					
					echo "
					<table class='table table-striped'>
						<tr>
							<td>User Name</td>
							<td>:</td>
							<td><input type='text' name='user_name' class='form-control' value=''></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input type='Password' name='sandi' class='form-control'></td>
						</tr>
						<tr>
							<td><input type='submit' name='tambah' value='tambah'></td>
						</tr>
					</table>";
					
					?>-->
				</form>
			</div>
		</div>
	</div>
</body>
</html>