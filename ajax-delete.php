<?php

require "config.php";

if(isset($_POST["studentid"]))
{
    
    $sid  =  $_POST["studentid"];
    echo $sid;

    $sql = "delete from student_application where sid = $sid";
    die($sql);

    if(mysqli_query($con,$sql))
    {
        echo 1;
    }else
    {
        echo 0;
    }

}

?>