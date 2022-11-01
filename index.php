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
				<input type="text" id="matric-number" name="matric_number" placeholder="enter your matric number">
				<input type="submit" name="submit" id="submit" value="confirm" style="padding: 10px 20px; border-radius: 20px; border-width: inherit;">
			</form>
		</div>
	</section>

	<?php
		include_once('routes/fetch.php');
	?>
	</div>
	<!-- <button id="print">jlm</button>
	<script>
	
	
	const prints = document.querySelector("#print");
	prints.addEventListener("click", () => {
		window.print();
	})
	</script> -->

	<footer id="contact">
		<div class="container">
			<div>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, saepe officiis? Ipsa est quam, nihil nam unde, eligendi accusantium accusamus eius incidunt voluptatum iste dolores, enim officia odit esse in. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis sapiente aliquid asperiores quas, cupiditate suscipit tempore magni repellendus ut facere accusamus beatae ipsam mollitia enim laboriosam in corporis eos voluptates.
			</div>
			<div>
				Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit porro voluptatum tempora placeat. Eaque accusamus voluptatum facere reprehenderit, harum suscipit voluptatem eligendi ea accusantium, tempora, natus ab molestias doloremque vel! lore
			</div>
			<div>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto voluptas ipsam molestiae voluptatibus quis, sunt illum saepe dignissimos voluptates ab blanditiis cupiditate adipisci, harum sit exercitationem, magni dicta ad necessitatibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptatem delectus explicabo blanditiis nemo totam fugiat reprehenderit eaque! Fugiat possimus voluptatibus cum explicabo nostrum, minima quaerat corporis enim labore molestias!
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>