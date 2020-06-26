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

    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+91 7874777471", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>

</body>
</html> -->
