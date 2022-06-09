<?php 
    include('connect/connection.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];
        
        if($otp != $otp_code){
        ?>
       <script>
            alert("Invalid OTP code!");
            window.onload = function() {
                displaySecond();
            }
        </script>
        <?php
        } else{
        mysqli_query($connect, "UPDATE useraccount SET email_status = 1 WHERE email_address = '$email'");
        ?>
        <script src="Scripts/layerDisplay.js" type="text/javascript"></script>
        <script>
            alert("<?php echo "You have successfully verified your account."?>");
            window.onload = function() {
                displayThird();
            }
        </script>
        <?php
        }
    }

?>