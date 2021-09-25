<?php include_once "autoload.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add new student</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

	<?php

	/**
	 * Student form isset
	 */
	if (isset($_POST['add_student'])) {
		// get data 
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];

		$location = $_POST['location'];
		$age = $_POST['age'];
		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		} else {
			$gender = NULL;
		}
		$amount = $_POST['amount'];



		if (empty($name) || empty($email) || empty($cell)) {
			$msg = validate('All fileds are required ');
		} else if (emailCheck($email) == false) {
			$msg = validate('Invalid email address ');
		} else if (cellcheck($cell) == false) {
			$msg = validate('Invalid Cell number');
		} else {

			$file_name = move($_FILES['photo'], 'media/students/');
			create("INSERT INTO students (name, email, cell, photo, location, age, gender, amount) VALUES ('$name','$email','$cell', '$file_name', '$location','$age','$gender','$amount')");
			$msg = validate('Student added successful', 'success');
		}
	}


	?>



	<div class="wrap ">
		<a class="btn btn-sm btn-primary" href="index.php">All students</a>
		<br>
		<br>
		<div class="card shadow">
			<div class="card-body">
				<h2>Add new student</h2>
				<?php
				if (isset($msg)) {
					echo $msg;
				}
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php old('name'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php old('email'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php old('cell'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<select class="form-control" name="location" id="">
							<option value="">-select-</option>
							<option value="Mirpur">Mirpur</option>
							<option value="Gulshan">Gulshan</option>
							<option value="Uttara">Uttara</option>
							<option value="Banani">Banani</option>
							<option value="Dhanmondi">Dhanmondi</option>
							<option value="Gazipur">Gazipur</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" value="<?php old('age'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Gender</label>
						<input name="gender" type="radio" value="Male" id="Male"> <label for="Male">Male</label>
						<input name="gender" type="radio" value="Female" id="Female"> <label for="Female">Female</label>
					</div>
					<div class="form-group">
						<label for="">Amount</label>
						<input name="amount" class="form-control" value="<?php old('amount'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">photo</label>
						<input name="photo" class="" value="<?php old('photo'); ?>" type="file">
					</div>
					<div class="form-group">
						<input name="add_student" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>