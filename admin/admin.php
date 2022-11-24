<<<<<<< HEAD
<?php
    session_start();
    require("../connection.php");
    $user_data = checkLogin($conn);

    function checkLogin($conn){
        if(isset($_SESSION['user_id'])){
            $id  = $_SESSION['user_id'];
            $query = "select * from admin where user_id = '$id' limit 1";

            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        header("location: index.php");
        die;
    }
    $query = " SELECT `id`, `payment_id`, `amount_paid`, `name`, `matric_number`, `email`, `number`, `date`, `reference` FROM `records` ";
    $run = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin| AlumniFee | Federal Polytechnic Ilaro</title>
    <style>
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        table{
            background: white;
        }
        h1{
            text-transform: uppercase;
            color: white;
            margin: 20px 0;
        }
        @media (max-width: 425px){
            .container{
                overflow-x:auto;
            }
            h1{
                text-align: center;
                font-size: 20px
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="test-bg" style="height: 100vh;">
    <div id="navigation">
		<nav>
			<div class="name">
                <img src="https://federalpolyilaro.edu.ng/images/header-logo.png" alt="poly logo" style="max-width: 300px;">
            </div>
			<div>
				<ul class="navs">
					<li>Home</li>
					<li><a href="logout.php">logout</a></li>
				</ul>
				<div class="mob-icon">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" 	stroke="currentColor" stroke-width="2">
					  <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
					</svg>
				</div>
			</div>
		</nav>
        <div class="container">
            <h1 class="text-center">students records</h1>
            <form action="export.php" method="POST">
                <input type="submit" value="Download CSV" name="export" class="btn btn-success px-4 py-2 my-4">
            </form>
            <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>payment id</th>
                    <th>amount paid</th>
                    <th>name</th>
                    <th>matric number</th>
                    <th>email</th>
                    <th>number</th>
                    <th>date</th>
                    <th>reference</th>
                </tr>
                <?php
                        if ($run) {
                            while ($row = mysqli_fetch_array($run)) {
                                $name = $row['name'];
                                $id = $row['id'];
                                $payment_id = $row['payment_id'];
                                $amount_paid = $row['amount_paid'];
                                $matric_number = $row['matric_number'];
                                $email = $row['email'];
                                $number = $row['number'];
                                $date = $row['date'];
                                $reference = $row['reference'];
                                echo "
                                <tr>
                                    <td>  $id</td>
                                    <td>$payment_id</td>
                                    <td> $amount_paid </td>
                                    <td> $name </td>
                                    <td> $matric_number </td>
                                    <td> $email </td>
                                    <td> $number </td>
                                    <td> $date </td>
                                    <td> $reference </td>
                            </tr>";
                            }
                        }
                        else{
                            echo mysqli_error($conn);
                        }
                ?>
            </table>
            </div>
        </div>
    </div>
</body>
=======
<?php
    session_start();
    require("../connection.php");
    $user_data = checkLogin($conn);

    function checkLogin($conn){
        if(isset($_SESSION['user_id'])){
            $id  = $_SESSION['user_id'];
            $query = "select * from admin where user_id = '$id' limit 1";

            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        header("location: index.php");
        die;
    }
    $query = " SELECT `id`, `payment_id`, `amount_paid`, `name`, `matric_number`, `email`, `number`, `date`, `reference` FROM `records` ";
    $run = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin| AlumniFee | Federal Polytechnic Ilaro</title>
    <style>
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        table{
            background: white;
        }
        h1{
            text-transform: uppercase;
            color: white;
            margin: 20px 0;
        }
        @media (max-width: 425px){
            .container{
                overflow-x:auto;
            }
            h1{
                text-align: center;
                font-size: 20px
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="test-bg" style="height: 100vh;">
    <div id="navigation">
		<nav>
			<div class="name">
                <img src="../bgs/header-logo.png" alt="poly logo" style="max-width: 300px;">
            </div>
			<div>
				<ul class="navs">
					<li>Home</li>
					<li><a href="logout.php">logout</a></li>
				</ul>
				<div class="mob-icon">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" 	stroke="currentColor" stroke-width="2">
					  <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
					</svg>
				</div>
			</div>
		</nav>
        <div class="container">
            <h1 class="text-center">students records</h1>
            <form action="export.php" method="POST">
                <input type="submit" value="Download CSV" name="export" class="btn btn-success px-4 py-2 my-4">
            </form>
            <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>payment id</th>
                    <th>amount paid</th>
                    <th>name</th>
                    <th>matric number</th>
                    <th>email</th>
                    <th>number</th>
                    <th>date</th>
                    <th>reference</th>
                </tr>
                <?php
                        if ($run) {
                            while ($row = mysqli_fetch_array($run)) {
                                $name = $row['name'];
                                $id = $row['id'];
                                $payment_id = $row['payment_id'];
                                $amount_paid = $row['amount_paid'];
                                $matric_number = $row['matric_number'];
                                $email = $row['email'];
                                $number = $row['number'];
                                $date = $row['date'];
                                $reference = $row['reference'];
                                echo "
                                <tr>
                                    <td>  $id</td>
                                    <td>$payment_id</td>
                                    <td> $amount_paid </td>
                                    <td> $name </td>
                                    <td> $matric_number </td>
                                    <td> $email </td>
                                    <td> $number </td>
                                    <td> $date </td>
                                    <td> $reference </td>
                            </tr>";
                            }
                        }
                        else{
                            echo mysqli_error($conn);
                        }
                ?>
            </table>
            </div>
        </div>
    </div>
</body>
>>>>>>> 775f3a45befd8d341cf6a08477463986ae2de806
</html>