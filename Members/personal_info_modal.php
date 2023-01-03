<?php 
include ('../dbcon.php');
include('../session.php');

$get_id= $_GET['id'];
			$query = $conn->query("select * from members where member_id = '$get_id'");
		 
            
            	while($row = $query->fetch())
                                    {
		?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="ICON" type="image/x-icon" href="../Images/logo.ico">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../Scripts/index.js"></script>
	<script src="../Scripts/passStrength.js"></script>
				
	<title>Update Account</title>
</head>
<body>
<div class="add-post" id="addPost">
		<div class="add-post-form">
		<div class="close-button" onclick="hideAddPost()"><button>&times;</button></div>
		<?php include 'change_profile_picture_modal.php';?>
		</div>
</div>
    <div class="index-container">
		<div class="index-sidenav">
			<?php include '../Includes/Sidebar.php'; ?>
		</div>

		<div class="index-header">
			<?php include '../Includes/Header.php'; ?>
		</div>
		<div class="index-content">

		<form role="form" action="personal_info_save.php" class="login_form" method="post">
		
			<div class="personal-container">
			<div class="personal-title">Edit Personal Information</div>
			<div class="personal-form">
			<div class="personal-profile">
				<div class="personal-profile-popup" onclick="showAddPost()">
					<img src="../Images/change-profile.png">
					<div>Change Profile Picture</div>
				</div>
				<?php include('profile_picture.php'); ?>
			</div>
			<div class="personal-update-button ">
				<a href="personal_info_modal.php?id=<?php echo $id2; ?>">
				<i class="bi bi-pencil"></i> Edit</a>
			</div>
			<div class="personal-details">
				<div class="personal-details-name personal-details-name-input">
						<input name="firstname" value="<?php echo $row['first_name']; ?>" type="text" class="form-control" >
						<input name="middlename" value="<?php echo $row['middle_name']; ?>" type="text" class="form-control" >
						<input name="lastname" value="<?php echo $row['last_name']; ?>" type="text" class="form-control">
				</div>
				
				<div>Username: <input name="username" value="<?php echo $row['username']; ?>" type="text" class="form-control"></div>
				<div>Date of Birth:<label><input name="birth"  id="datefield" min='1900-01-01' max='2000-13-13' value="<?php echo $row['dob']; ?>" type="date" class="form-control" /></label></div>
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
				<div>Contact No:<label><input type="tel" class="form-control" id="contactNumber" placeholder="09XX-XXX-XXXX" name="contact_no" value="<?php echo $row['contact_number']; ?>" onblur="ValidateNumber(this)"; required /></label></div>
				
				<div>Address:<label> <input name="address" value="<?php echo $row['address']; ?>" type="text" class="form-control"></label></div>
				<div>Email Address:<label> <?php echo $row['email_address']; ?></label></div>
				<div>Sex:<label> 
					<select name="sex" class="form-control">
						<option><?php echo $row['sex']; ?></option>
						<option>Male</option>
						<option>Female</option>
					</select></label>
				</div>
			</div>
			<div class="profile-activities">
				<input type="submit" value="Save"><i class="fa fa-save"></i> 
				<input type="button" onclick="location.href='personal_info_panel.php'" value="Cancel"> <i class="fa fa-times"></i>
			</div>
			</div>
			</div>
		</form>
		</div>
		<?php } ?>
</body>
</html>					