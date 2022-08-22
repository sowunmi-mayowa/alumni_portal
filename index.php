<?php
	require 'connection.php';


	if (isset($_POST['submit'])) {
		$query = " SELECT * FROM students WHERE matric_number = '$matric' ";
		$query_run = mysqli_query($conn, $query);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Alumni</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,400;0,700;1,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="navigation">
		<nav>
			<div class="name">the federal polytechnic ilaro</div>
			<div>
				<ul class="navs">
					<li>Home</li>
					<li>Portal</li>
					<li>Contact</li>
				</ul>
				<div class="mob-icon">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" 	stroke="currentColor" stroke-width="2">
					  <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
					</svg>
				</div>
			</div>
		</nav> 
		<div class="mob-nav">
			<ul style="padding-top: 80px;">
				<li>Home</li>
				<li>Portal</li>
				<li>Contact</li>
			</ul>
		</div>
	</div>

	<section id="search-id">
		<div class="search-content">
			<h1>Fetch Details</h1>
			<form method="POST">
				<input type="text" id="matric-number" name="matric_number" placeholder="enter your matric number">
				<input type="submit" name="submit" id="submit" value="confirm">
			</form>
		</div>
	</section>

	<section id="search-output">
		<?php
			if(isset($_POST['submit'])){
				while ($row = mysqli_fetch_assoc($query_run)) {
					?>
						<form method="POST">
							<input type="text" name="first_name" value="<?php echo $row['first_name']?> ">
							<input type="text" name="middle_name" value="<?php echo $row['middle_name']?> ">
							<input type="text" name="last_name" value="<?php echo $row['last_name']?> ">
							<input type="text" name="matric_number" value="<?php echo $row['matric_number']?> ">
							<input type="text" name="department" value="<?php echo $row['department']?> ">
							<input type="text" name="level" value="<?php echo $row['level']?> ">
						</form>
					<?php
			}
		}
		?>
	</section>

	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>