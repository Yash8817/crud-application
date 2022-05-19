<?php

use function PHPSTORM_META\elementType;

session_start();
require_once "config.php";
if (!isset($_SESSION['email'])) {
    echo "<script> location.href=' login.php'; </script>";
}

$email = $_SESSION['email'];


if (!isset($_GET['id'])) {
    echo "<script> location.href=' dassboard.php'; </script>";
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
        Update Record
    </div>
    <?php


    $id = $_GET['id'];
    $sql = "select * from student where sid  = '$id'";
    if (mysqli_num_rows($result = mysqli_query($con, $sql)) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {


    ?>
            <table id="main" width="100%" cellspacing="0" cellpadding="10px">
                <div id="container">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="add_form" method="POST">
                        <tr>
                            <td>

                                Enter username :
                            </td>
                            <td>

                                <input type="text" name="username" value="<?php echo $data['username']?>">
                            </td>
                        </tr>

                        <tr>
                            <td>

                                Enter Email :
                            </td>
                            <td>

                                <input type="text" name="useremail" value="<?php echo $data['email']?>">
                            </td>
                        </tr>

                        <tr>
                            <td>

                                Enter password :
                            </td>
                            <td>

                                <input type="text" name="password" id="password" value="<?php echo $data['password']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <button id="save-button" type="submit" name="add" >update</button>
                                <button id="cancel-button" type="submit" name="cancel" ><a href="dassboard.php">cancel</a></button>
                            </td>
                        </tr>
                    </form>
                </div>
            </table>
    <?php
        }
    }
    ?>
</body>





</html>