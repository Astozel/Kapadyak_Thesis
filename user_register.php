<?php session_start();?>
<?php
    include('connect/connection.php');
    ?>
 
    <?php

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

        $check_query = mysqli_query($connect, "SELECT * FROM members where email_address ='$email'");
        $rowCount = mysqli_num_rows($check_query);

        if(!empty($email) && !empty($password)){
            if($rowCount > 0){
                ?>
                <script>
                    alert("User with email already exist!");
                </script>
                <?php
            }else{
                    $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['confirm_password'] = $confirm_password;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['middle_name'] = $middle_name;
                    $_SESSION['last_name'] = $last_name;
                    $_SESSION['dob'] = $dob;
                    $_SESSION['sex'] = $sex;
                    $_SESSION['contact_number'] = $contact_number;
                    $_SESSION['address'] = $address;
                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username = 'kapadyakofficial2022@gmail.com';
                    $mail->Password = 'rnmezyfbvgexpzht';

                    $mail->setFrom('kapadyakofficial2022@gmail.com', 'Kapadyak');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Email Verification Using OTP";
                    $mail->Body="<p>Thankyou for joining Kapadyak! <br> To finish setting up, we've sent an email to $email.</p><h3><br>Your OTP code is $otp.<br></h3>
                    <br><br>
                    <p>Welcome, $first_name $last_name!</p>
                    <b>The Kapadyak Team</b>";
                    
                            if(!$mail->send()){
                                ?>
                                    <script>
                                        alert("<?php echo "Invalid e-mail, please try again."?>");
                                    </script>
                                <?php
                            }else{
                                ?>
                                <script>
                                    alert("<?php echo "Register successfully, OTP sent to " . $email ."!"?>");
                                    window.onload = function() {
                                    displaySecond();
                                    } 
                                </script>
                                <?php
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
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://kit.fontawesome.com/1c2c2462bf.js" crossorigin="anonymous"></script>

    <title>Sign Up for Kapadyak</title>
</head>
<body>

<div class="register-container">
    <div class="register-header">
        <div class="register-header-logo" id="headerLogo">
            <a href="start.php"><img src="Images/logo.png" >
                <span class="start-header-logo-text">APADYAK</span>
            </a>
        </div>
        <div class="register-HeaderTitle">Create Your Account</div>
    </div>

    <div class="register-content">
            <div id="register-layer1">
               <div class="Layer-Already">Already have an account? <a href="login.php">Sign-in &#8594</a></div>
               <div class="Layer-Title">Step 1 of 3</div>
               <div class="Layer-div1">
               <form action="#" method="POST">
                       <div class="div-input"><input type="email" id="Email" name="email" onblur="ValidateEmail(this)"required><label class="input-label">Email</label></div>
                       <div class="div-input"><input type="text"  id="Username" name="username" required><label class="input-label">Username</label></div>
                       <div class="div-input div-input-pass">
                            <input type="password" id="password" name="password" onfocus="showChecklist();" required>
                            <label class="input-label">Password</label>
                            <span class="show-pass" onclick="showPassword()">
                                <i class="far fa-eye" onclick="myFunction(this)"></i>
                            </span>
                        </div>
                       <div class="div-input div-input-pass">
                            <input type="password" id="confirmPassword" name="confirm_password" onblur="checkPassword();" required>
                            <label class="input-label">Confirm Password</label>
                            <span class="show-pass" onclick="showConfirmPassword()">
                                <i class="far fa-eye" onclick="myFunction(this)"></i>
                            </span>
                        </div>
                       
                       <script src="Scripts/layerDisplay.js" type="text/javascript"> </script>
                       <div class="div-progress-requirements" id="progress-req">
                        <div class="progress">
                                <div id="password-strength" 
                                    class="progress-bar"
                                    style="width:0%">
                                </div>
                        </div>
                        <div class="div-pass-checklist">
                            <ul class="list-unstyled">
                                <li class="">
                                    <span class="low-upper-case">
                                        <i class="fas fa-circle"></i>
                                        &nbsp;Lowercase &amp; Uppercase
                                    </span>
                                </li>
                                <li class="">
                                    <span class="one-number">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Number (0-9)
                                    </span> 
                                </li>
                                <li class="">
                                    <span class="one-special-char">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Special Character (!@#$%^&*)
                                    </span>
                                </li>
                                <li class="">
                                    <span class="eight-character">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Atleast 8 Character
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <script src="Scripts/passStrength.js"> </script>
               <div class="Layer-div2">
                <div class="div-input2 divFname"><input type="text" name="first_name" required> <label class="input-label">First Name</label></div>
                <div class="div-input2 divMname"><input type="text" name="middle_name" required><label class="input-label">Middle Name</label></div>
                <div class="div-input2 divLname"><input type="text" name="last_name" required> <label class="input-label">Last Name</label></div>
                <div class="div-input2 divNumber"><input type="tel" id="contactNumber" name="contact_number" placeholder="09XX-XXX-XXXX" onblur="ValidateNumber(this)" required><label class="input-label">Contact Number</label></div> 
                <div class="div-input2 divAddress"><input type="text" name="address" id="div-address" required><label class="input-label">Address</label></div> 
                <div class="div-input2 divBday"><input type="date" id="datefield" min='1900-01-01' name="dob" title="Birthday" required></div> 
                <script>
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1; //January is 0!
                    var yyyy = today.getFullYear();

                    if (dd < 10) {
                    dd = '0' + dd;
                    }

                    if (mm < 10) {
                    mm = '0' + mm;
                    } 
                        
                    today = yyyy + '-' + mm + '-' + dd;
                    document.getElementById("datefield").setAttribute("max", today);
                </script>
                    <div class="div-input2 divSex" >
                       <select name="sex" required>
                            <option value="" disabled selected hidden> Sex </option> 
                           <option value="male"> Male </option>
                           <option value="female"> Female </option>
                       </select>
                    </div>   
               </div>
            </div>
            <div class="nextBtn" id="btnStep1"><input type="submit" value="Continue &#8594" name="register" class="Next" ></div>
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