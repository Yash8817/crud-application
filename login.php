<?php
session_start();
require_once "config.php";

if (isset($_POST['submit'])) {
    $email = $_POST['useremail'];
    $pass = $_POST['password'];

    $sql = "select * from student where email like '$email'";
    if ($res = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            $sdata = mysqli_fetch_assoc($res);
            if ($sdata['password'] == $pass) {
                $_SESSION['email'] = $email;
                echo "<script> location.href='dassboard.php'; </script>";
            } else {
                echo "<script>alert('password not matched');</script>";
            }
        }
        else
        {
            echo "<script>alert('invalid useremail');</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title> Login Page </title>
    <style>
        Body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: pink;
        }

        button {
            background-color: green;
            width: 100%;
            color: white;
            padding: 15px;
            margin: 10px 0px;
            border: none;
            cursor: pointer;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            margin: 8px 0;
            padding: 12px 20px;
            display: inline-block;
            border: 2px solid green;
            box-sizing: border-box;
        }

        button:hover {
            opacity: 0.7;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            margin: 10px 5px;
        }


        .container {
            padding: 25px;
            margin: 20px;
            background-color: lightblue;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#first_form').submit(function() {
                var uname = $("#uname").val();
                var pass = $("#pass").val();
                if (uname == "" && pass == "") {
                    alert("please fill all the fields")
                }
            });
        });
    </script>


</head>

<body>
    <center>
        <h1> Student Login Form </h1>
    </center>
    <form id="first_form" method="POST">
        <div class="container">
            <label>Email : </label>
            <input id="uname" type="text" placeholder="Enter email" name="useremail">
            <label>Password : </label>
            <input id="pass" type="password" placeholder="Enter Password" name="password">
            <button type="submit" name="submit">Login</button>
        </div>
    </form>
</body>

</html>