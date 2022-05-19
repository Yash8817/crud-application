<?php

use function PHPSTORM_META\elementType;

session_start();
require_once "config.php";
if (!isset($_SESSION['email'])) {
    echo "<script> location.href=' login.php'; </script>";
}

$email = $_SESSION['email'];


if (isset($_POST['add'])) {
    $uname = $_POST['username'];
    $email = $_POST['useremail'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if ($uname != "" && $email != "" && $pass != "" && $cpass != "") {

        $check_email = "select * from student where email like '$email'";
        $result = mysqli_query($con, $check_email);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('email already exist....');</script>";
        }
        elseif(strlen($pass)< 8 )
        {
            echo "<script>alert('password must be 8 character....');</script>";
        }
        elseif($pass != $cpass)
        {
            echo "<script>alert('confirm password not mathced....');</script>";
        }else {
            $sql = "INSERT INTO student(sid,username,email,password) VALUES ('','$uname','$email','$pass')";
            if (mysqli_query($con, $sql)) {
                echo "<script> location.href='dassboard.php'; </script>";
            } else {
                echo "<script>alert('error in adding data');</script>";
            }
        }
    } else {
        echo "<script> alert('all fiels are required') </script>";
    }
}else
if (isset($_POST['cancel'])) {
    echo "<script> location.href='dassboard.php'; </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #main input {
            width: 180px;
            height: 25px;
            font-size: 18px;
            padding: 3px 10px;
            border-radius: 4px;
            border: 1px solid green;
        }

        #save-button {
            background: #2c3e50;
            color: #fff;
            border: 0;
            padding: 8px 30px;
            margin-left: 7px;
            border-radius: 3px;
            cursor: pointer;
        }

        #header {
            text-align: center;
            font-size: 45px;
            font-family: Calibri, Helvetica, sans-serif;
        }

        #container {
            text-align: center;
            margin: 25px;
            display: block;
            /* background-color: blue; */
            padding: 20px;
        }
    </style>
    <meta charset="UTF-8">
    <title>Student Application</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="header">
        Add New Data
    </div>
    <table id="main" width="100%" cellspacing="0" cellpadding="10px">
        <div id="container">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="add_form" method="POST">
                <tr>
                    <td>

                        Enter username :
                    </td>
                    <td>

                        <input type="text" name="username">
                    </td>
                </tr>

                <tr>
                    <td>

                        Enter Email :
                    </td>
                    <td>

                        <input type="text" name="useremail">
                    </td>
                </tr>

                <tr>
                    <td>

                        Enter password :
                    </td>
                    <td>

                        <input type="password" name="password" id="password">
                    </td>
                </tr>

                <tr>
                    <td>

                        Enter confirm password :
                    </td>
                    <td>

                        <input type="password" name="cpassword">
                    </td>
                </tr>
                <tr>
                    <td>

                        <button id="save-button" type="submit" name="add">Add</button>
                        <button id="cancel-button" type="submit" name="cancel">cancel</button>
                    </td>
                </tr>

            </form>
        </div>
    </table>
</body>





</html>