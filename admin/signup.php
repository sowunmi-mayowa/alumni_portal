<?php
    require("../connection.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $username = $_POST['username'];
       $password = $_POST['password'];
       function randomNum($length){
        $text = "";
        if ($length < 5) {
            $length = 5;
        }
        $len = rand(4, $length);

        for ($i=0; $i < $len; $i++) { 
            $text .= rand(0,9);
        }
        return $text;
    }

       if (!empty($username) && !empty($password) && !is_numeric($username)) {
        

           $user_id = randomNum(20);
           $query = "insert into admin (user_id, username, password) values ('$user_id', '$username', '$password')";

           mysqli_query($conn, $query);
           header("Location: index.php");
           die;
       }
       else{
           echo "please enter some valid information";
       }

       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: white;
            padding: 145px 50px;
            border-radius: 30px;
            height: 200px;
        }
        label{
            text-align: left;
            font-size: 20px;
        }
        input{
            padding: 10px;
            margin-bottom: 10px;
        }
        #button{
            padding: 10px 15px;
            margin-top: 10px;
            background: green;
            border: none;
            color: white;
            border-radius: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
   <div class="test-bg" style="height: 100vh;">
        <?php
            include_once('../routes/navs.php');
        ?>

        <div class="container">
            <form method="POST">
            <h3 style="margin: 10px 0px;text-transform:uppercase;">SignUp Here</h3>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <input type="submit" value="Sign in" id="button">
            </form>
        </div>
   </div>
</body>
</html>