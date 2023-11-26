<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>

	<?php
	if (isset($_GET['id'])) {
		include("connect.php");
		$id = $_GET['id'];
		$sql = "SELECT * FROM utilisateur WHERE user_id=$id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

	}
	?>
	<form method="post" action="edit.php">
		<div class="container mt-5">
			<div class="modal-header">
				<h4 class="modal-title">View User</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="nom" required
						value="<?php echo isset($row["nom"]) ? $row["nom"] : ''; ?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" required
						value="<?php echo isset($row["email"]) ? $row["email"] : ''; ?>">
				</div>

			</div>
			<div class="modal-footer">
				<a href="index.php"><input type="button" class="btn btn-default" data-dismiss="modal" value="Back"></a>
				<input type="submit" class="btn btn-info" value="Save" disabled>
			</div>
		</div>
	</form>
</body>

</html>