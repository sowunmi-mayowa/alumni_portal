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
            text-align: center;
            background: white;
            padding: 20px 10px;
            border-radius: 30px;
            box-shadow: -1px -2px 16px 3px #00000085;
            margin: 0px 30px;
        }
        th,td{
            border: 1px solid black;
            border-radius: 5px;
        }
        th,td{
            padding: 5px;
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
</head>
<body>
    <div class="test-bg" style="height: 100vh;">
        <?php
            include_once("../routes/navs.php")
        ?>
        <div class="container">
            <h1>students records</h1>
            <table>
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
</body>
</html>