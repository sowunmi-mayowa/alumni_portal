<style>
	#search-output form{
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}
	#search-output input{
		margin: 10px 0px;
		width: 50%;
		padding: 10px 5px;
		border-style: none;
		border-radius: 10px;
	}
	#search-output input[type="submit"]{
		background-color: green;
		color: white;
	}
</style>

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
						<form method="GET" id="details" action="routes/payment.php">
						<h3>FETCHED RESULT</h3>
							<label for="name">Surname</label>
							<input type="text" name="first_name" value="<?php echo $row['first_name']?> " disabled>
							<input type="text" name="middle_name" value="<?php echo $row['middle_name']?> " disabled>
							<input type="text" name="last_name" value="<?php echo $row['last_name']?> " disabled>
							<input type="text" name="matric_number" value="<?php echo $row['matric_number']?> " disabled>
							<input type="text" name="department" value="<?php echo $row['department']?> " disabled>
							<input type="text" name="level" value="<?php echo $row['level']?> " disabled>
							<input type="submit" value="proceed to payment">
						</form>
					<?php
			}
		}
		?>
	</section>