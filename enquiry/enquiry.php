<?php


    $nameErr = $emailErr = $phoneErr = "";
    $name = $email = $phone = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }


        if (empty($_POST["phone"])) {
            $phoneErr = "Phone is required";
        } else {
            $phone = test_input($_POST["phone"]);
        }

    }


    try {
        
        $db = new mysqli('localhost','root','','hopefs');

    } catch (Exception $exc) {
        echo  $exc->getTraceAsString();
    }


    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['option']) && isset($_POST['msg'])) 
    {

        $First = $_POST['name'];
        $Mob = $_POST['phone'];
        $Email = $_POST['email'];
        $Package = $_POST['option'];
        $Msg = $_POST['msg'];


        $is_insert = $db->query("INSERT INTO `enquiry`(`First name`, `Phone`, `Email`, `Package`, `Message`) VALUES ('$First','$Mob','$Email','$Package','$Msg')");

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


<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Contact Hope Financial Solutuion
    </title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Hope Financial Solution" />
    <meta name="description" content=" Equiry page Hope Financial Solution" />
    
    <link rel="stylesheet" href="style.css">

</head>
<body>


    <header class="head">

        <h1 class="form_heading">
            Tell Us in Breif About Yourself
        </h1>


        <form enctype="multipart/form-data" method="post">

            <div class="box" data-validate="Please Type Your Name">
            <span class="label-input100">FULL NAME *</span>
            <input class="input100" type="text" name="name" placeholder="Enter Your Name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameErr;?></span>
            </div>

            
            <div class="box" data-validate="Please Type Your Name">
            <span class="label-input100">PHONE *</span>
            <input class="input100" type="phone" name="phone" placeholder="Don't forget to write correct one" value="<?php echo $phone;?>">
            <span class="error">* <?php echo $phoneErr;?></span>
            </div>
            
            <div class="box" data-validate="Please Type Your Name">
            <span class="label-input100">EMAIL *</span>
            <input class="input100" type="email" name="email" placeholder="Enter Your Email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr;?></span>
            </div>
            
            <div class="box">
                <span class="label-input100">Needed Package *</span>
                    <select  name="option">
                        <option>Please choose one</option>
                        <option value="gold">Gold Membership</option>
                        <option value="platinum">Platinum Membership</option>
                        <option value="diamond">Diamond Membership</option>
                    </select>
            </div>


            <div class="box">
                <span class="label-input100">Message</span>
                <textarea class="input100" name="msg" placeholder="Your Confusions here..."></textarea>
            </div>

            <input type="submit" value="SUBMIT">

        </form>


    </header>







<!-- whatsapp io widget -->


    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+91 7581954135", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>

    <!-- Whats io widget -->

</body>
</html>