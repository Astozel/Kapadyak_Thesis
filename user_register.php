<?php session_start(); ?>
<?php
    include('connect/connection.php');
    if(isset($_POST["register"])){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $first_name = $_POST["first_name"];
        $middle_name = $_POST["middle_name"];
        $last_name = $_POST["last_name"];
        $dob = $_POST["dob"];
        $sex = $_POST["sex"];
        $contact_number = $_POST["contact_number"];
        $address = $_POST["address"];

        $check_query = mysqli_query($connect, "SELECT * FROM useraccount where email_address ='$email'");
        $rowCount = mysqli_num_rows($check_query);

        if(!empty($email) && !empty($password)){
            if($rowCount > 0){
                ?>
                <script>
                    alert("User with email already exist!");
                </script>
                <?php
            }else{
                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                $result = mysqli_query($connect, "INSERT INTO useraccount (email_address, username, password, confirm_password, first_name, middle_name, last_name, dob, sex, contact_number, address, email_status) VALUES ('$email', '$username', '$password_hash', '$confirm_password', '$first_name', '$middle_name', '$last_name', '$dob', '$sex', '$contact_number', '$address', 0)");    
                if($result){
                    $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;
                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='kapadyakofficial2022@gmail.com';
                    $mail->Password='werghdvqduyeudax';
    
                    $mail->setFrom('kapadyakofficial2022@gmail.com', 'OTP Verification');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your verify code";
                    $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>";
    
                            if(!$mail->send()){
                                ?>
                                    <script>
                                        alert("<?php echo "Register Failed, Invalid Email "?>");
                                    </script>
                                <?php
                            }else{
                                ?>
                                    <script src="Scripts/layerDisplay.js" type="text/javascript"> </script>
                                <script>
                                    alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                                    window.onload = function() {
                                    displaySecond();
                                    }
                                    
                                </script>
                                
                                <?php
                            }
                }
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="ICON" type="image/x-icon" href="Images/logo.ico">
    <link rel="stylesheet" href="Style.css" type="text/css">
    <script src="Scripts/layerDisplay.js" type="text/javascript"> </script>
    <title>Sign Up for Kapadyak</title>
</head>
<body>

<div class="register-container">
        <div class="register-header">
            <div class="register-HeaderTitle">Create Your Account</div>
        </div>

    <div class="register-content">
            
            <div id="register-layer1">
               <div class="Layer-Already">Already have an account? <a href="login.php">Sign-in &#8594</a></div>
               <div class="Layer-Title">Step 1 of 3</div>
               <div class="Layer-div1">
               <form action="#" method="POST">
                       <div class="div-input"><input type="email" id="Email" name="email" placeholder="Email" required></div>
                       <div class="div-input"><input type="text"  id="Username" name="username" placeholder="Username"required></div>
                       <div class="div-input"><input type="password" id="Password" name="password" placeholder="Password" required></div>
                       <div class="div-input"><input type="password" id="ConfirmPassword" name="confirm_password" placeholder="Confirm Password" required></div>
                </div>
   
               <div class="Layer-div2">
                   <div class="div-input2">
                       <input type="text" name="first_name" id="Fname" placeholder="First Name" required> 
                       <input type="text" name="middle_name" id="Mname" placeholder="Middle Name"required>
                       <input type="text" name="last_name" id="Lname" placeholder="Last Name" required></div> 
                    <div class="div-input2">
                       <input type="text" name="contact_number" placeholder="Contact Number">
                       <input type="text" name="address" placeholder="Address"></div> 
                    <div class="div-input2">
                       <input type="date" name="dob" placeholder="Birthday" title="Birthday">
                       <select name="sex">
                           <option value="" disabled selected hidden> GENDER </option> 
                           <option value="male"> Male </option>
                           <option value="female"> Female </option>
                       </select>
                    </div>                
               </div>
            </div>
            <div class="nextBtn" id="btnStep1"><input type="submit" value="Continue &#8594" name="register" class="Next"></div>
        </form> 
            <div id="register-layer2">
                <div class="Layer-Already">Already have an account? <a href="login.php">Sign-in &#8594</a></div>
                <div class="Layer-Title">Step 2 of 3</div>
                <div class="layer2-title">Enter the OTP Code</div>
                    <div class="layer2-form">
                        <form action="#" method="POST" name="verify">
                        <div class="layer2-text"><label for="email_address" >Kindly check your email to redeem your code. The code is 6 numbers long.</label></div>  
                        <div><input type="text" id="" class="layer2-otp" name="otp_code" required></div>
                        
                    </div>
                    <?php include('email_verification.php'); ?>    
            </div>
            <div class="nextBtn" id="btnStep2"><input type="submit" value="Validate &#8594" name="verify" class="Next"></div>
            </form>
           
            <div id="register-layer3">
                <div class="Layer-Already">Already have an account? <a href="login.php">Sign-in &#8594</a></div>
                <div class="Layer-Title">Step 3 of 3</div>
                <div class="layer3-title">By signing up, you agree to the Terms of Service and Privacy Policy</div>
                    <div class="layer3-text">I agree to the collection and use of the data that I have provided to Kapadyak 
                    through this registration form for the use of this website. <br/>
                    I hereby give my explicit permission to the collection and use of this data, which may include personal 
                    information and sensitive personal information, shall be in accordance with the 
                    Data Privacy Act of 2012 and the Privacy Policy of Kapadyak. <br/>
                    I hereby give my persmission to contact me via email or other means with any notifications, reminders, 
                    information related to the app.
                    <form action="login.php" onsubmit="success()">
                    <div><input type="checkbox" id="checkboxAccept" required>
                        <label for="checkboxAccept">Accept Terms and Condition</label>
                    </div>
                    </div>
            </div>
            <div class="nextBtn" id="btnStep3"><input type="submit" value="Sign Up" class="Next"></div>
        </form>
        </div>
</div>

</body>
</html>