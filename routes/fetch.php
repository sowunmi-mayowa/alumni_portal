<?php
	require 'connection.php';


	if (isset($_POST['submit'])) {
		$matric = $_POST['matric_number'];
		$query = " SELECT * FROM students WHERE matric_number = '$matric' ";
		$query_run = mysqli_query($conn, $query);
	}
?>

<section id="search-output">
		<?php
			if(isset($_POST['submit'])){
				while ($row = mysqli_fetch_array($query_run)) {
					?>
						<form method="POST" id="details">
							<input type="text" name="first_name" value="<?php echo $row['first_name']?> ">
							<input type="text" name="middle_name" value="<?php echo $row['middle_name']?> ">
							<input type="text" name="last_name" value="<?php echo $row['last_name']?> ">
							<input type="text" name="matric_number" value="<?php echo $row['matric_number']?> ">
							<input type="text" name="department" value="<?php echo $row['department']?> ">
							<input type="text" name="level" value="<?php echo $row['level']?> ">
						</form>
                        <form action="routes/payment.php" method="GET">
                            <input type="submit" value="proceed to payment">
                        </form>
					<?php
			}
		}
		?>
	</section>