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
	<div class="test-bg">
		<?php
			include_once('routes/navs.php')
		?>
		<section id="search-id">
			<div class="search-content">
				<h1>Fetch Details</h1>
				<form method="POST">
					<input type="text" id="matric-number" name="matric_number" placeholder="enter your matric number" required>
					<input type="submit" name="submit" id="submit" value="confirm" style="padding: 10px 20px; border-radius: 20px; border-width: inherit;">
				</form>
			</div>
		</section>

		<?php
			include_once('routes/fetch.php');
		?>
	</div>

	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>