<style>
	#search-output form{
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}
	#search-output input{
		margin: 10px 0px;
		width: 30%;
		padding: 10px 5px;
		border-style: none;
		border-radius: 10px;
		background: white;
    box-shadow: -1px 1px 4px 0px #00000085;
	}
	#search-output input[type="submit"]{
		background-color: green;
		color: white;
		cursor: pointer;
	}
</style>

<?php
	require 'connection.php';

	if (isset($_POST['submit'])) {

		session_start();
		$matric = $_POST['matric_number'];
		$query = " SELECT * FROM students WHERE matric_number = '$matric' ";
		$query_run = mysqli_query($conn, $query);
	}
?>

<section id="search-output">
		<?php
			if(isset($_POST['submit'])){
				while ($row = mysqli_fetch_array($query_run)) {
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['middle_name'] = $row['middle_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['matric_number'] = $row['matric_number'];
					$_SESSION['department'] = $row['department'];
					$_SESSION['level'] = $row['level'];
					$_SESSION['phone_number'] = $row['phone_number'];
					$_SESSION['email'] = htmlspecialchars($row['email']);
					?>
						<form method="POST" id="details" action="routes/payment.php">
						<h3 style="color: #fff; text-shadow: -1px 1px 5px black">FETCHED RESULT</h3>
							<input type="text" name="first_name" value="<?php echo $row['first_name']?> " disabled>
							<input type="text" name="middle_name" value="<?php echo $row['middle_name']?> " disabled>
							<input type="text" name="last_name" value="<?php echo $row['last_name']?> " disabled>
							<input type="text" name="matric_number" value="<?php echo $row['matric_number']?> " disabled>
							<input type="text" name="department" value="<?php echo $row['department']?> " disabled>
							<input type="text" name="level" value="<?php echo $row['level']?> " disabled>
							<input type="email" name="email" value="<?php echo $row['email']?> " disabled>
							<input type="phone_number" name="phone_number" value="<?php echo $row['phone_number']?> " disabled>
							<input type="submit" id="fetch" value="proceed to payment">
						</form>
					<?php
			}
		}
		?>
	</section>