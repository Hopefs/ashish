<?php


    try {
        
        $db = new mysqli('localhost','root','','hopefs');

    } catch (Exception $exc) {
        echo  $exc->getTraceAsString();
    }


    if (isset($_POST['username0']) && isset($_POST['username1']) && isset($_POST['mob']) && isset($_POST['email']) && isset($_POST['msg'])) 
    {

        $First = $_POST['username0'];
        $Last = $_POST['username1'];
        $Mob = $_POST['mob'];
        $Email = $_POST['email'];
        $Msg = $_POST['msg'];


        $is_insert = $db->query("INSERT INTO `contactus`(`First name`, `Last name`, `Mob. No.`, `Email`, `Message`) VALUES ('$First','$Last','$Mob','$Email','$Msg')");

        if($is_insert == TRUE) {
            echo "<h2>Thanks your request is submited. </h2>";
            exit();
        }
        else{
            echo "<h2>Something Went Wrong. </h2>";
            exit();
        }


    }


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

        <form  enctype="multipart/form-data"  method="post" action="">

            <input type="text" size="256" name="username0" placeholder="FIRST NAME">
            <input type="text" size="256" name="username1" placeholder="LAST NAME">
            <input type="number" size="10" name="mob" placeholder="CONTACT NO.">
            <input type="email" size="256" name="email" placeholder="EMAIL ID">
            <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
            <input type="SUBMIT" name="SUBMIT">
        </form>

    </body>
    </html> -->