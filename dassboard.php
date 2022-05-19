<?php
session_start();
require_once "config.php";
if (!isset($_SESSION['email'])) {
    echo "<script> location.href=' login.php'; </script>";
}

if(isset($_GET["delete_id"]))
{
    
    $sid  =  $_GET["delete_id"];
    

    $sql = "delete from student where sid = '$sid'";
    if(mysqli_query($con, $sql))
    {
        echo "<script> location.href='dassboard.php'; </script>";

    }
    else
    {
        echo "<script>alert('error in deleting the record...');</script>";
    }

}


$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Application</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table id="main" border="1" width="100%" cellspacing="0" cellpadding="10px">

        <tr>
            <td id="header" colspan="4">
                <h1>Student Details</h1>
            </td>
            <td>
                <div id="save-button"><a href="new_data.php">Add data</a></div>
            </td>
        </tr>
        <tr>
            <th width="60px">Id</th>
            <th>Name</th>
            <th>Email</th>
            <th width="90px"> Edit</th>
            <th width="90px">Delete</th>
        </tr>

        <?php
        $sql = "select * from student ";
        $res  = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($data = mysqli_fetch_assoc($res)) {

        ?>
                <tr>
                    <td align='center'><?php echo $data['sid'] ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td align='center'><button class='edit-btn'><a href="edit.php?id=<?php echo $data['sid'] ?>"> Edit</a></button></td>
                    <td align='center'><button Class='delete-btn' ><a href="dassboard.php?delete_id=<?php echo $data['sid'] ?>"">  Delete</button></td>
                </tr>
        <?php
            }
        } ?>
    </table>

    <div id="error-message"></div>
    <div id="success-message"></div>

    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <table cellpadding="10px" width="100%">
            </table>
            <div id="close-btn">X</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script>
        // $(document).ready(function() {

        //     // $(document).on("click",".delete-btn",function(){
        //     //     if(confirm("are you sure, you want to delete the record?"))
        //     //     {
        //     //         var studentid =  $(this).data("sid");
        //     //         var element = this;

        //     //         $.ajax({
        //     //             url: "delete.php",
        //     //             type: "GET", 
        //     //             data : {
        //     //                 studentid: studentid
        //     //     },
        //     //             success : function(data)
        //     //             {
        //     //                 if(data == 1)
        //     //                 {
        //     //                     $(element).closest("tr").fadeOut();
        //     //                 }else
        //     //                 {
        //     //                     // $("#error-message").html("can't delete the record!!").slideDown();
        //     //                     $("#error-message").html(data).slideDown();
        //     //                     $("#success-message").slideUp;
        //     //                 }
        //     //             }
        //     //         });
        //     //     }
        //     // });


        //     // $(document).on("click", ".delete-btn", function() {
        //     //     // if (confirm("Do you really want to delete this record ?")) {
        //     //         var studentid = $(this).data("sid");
        //     //         var element = this;

        //     //         $.ajax({
        //     //             url: "ajax-delete.php",
        //     //             type: "POST",
        //     //             data: {
        //     //                 studentid: studentid
        //     //             },
        //     //             success: function(data) {
        //     //                 if (data == 1) {
        //     //                     $(element).closest("tr").fadeOut();
        //     //                 } else {
        //     //                     $("#error-message").html(data).slideDown();
        //     //                     $("#success-message").slideUp();
        //     //                 }
        //     //             }
        //     //         });
        //     //     // }
        //     // });



        // });
    </script>

</body>

</html>