
<?php
  require '../connect/connection.php';
  include('../session.php');
?>
<?php 

if (!isset($_SESSION['SessionEmail'])) {
 header("location:../login.php?=Error");
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="ICON" type="image/x-icon" href="../Images/logo.ico">
	<script src="../Scripts/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function(){
        $('nav ul li a').click(function(){
            $('ul li a').removeClass("highlight");
            $(this).addClass("highlight");
        })
        });
    </script>
    
	<link rel="stylesheet" type="text/css" href="../style.css">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
        rel="stylesheet"
    />
	<title>Home | Kapadyak</title>
</head>
<body>
    <script type="text/javascript">
            var auto_refresh = setInterval(
            function ()
            {
            $('.index-content').load('feed.php') ;
            
            }, 20000); //refresh div every 20000 milliseconds or 20 seconds
    </script>

    <!-- floating add post  -->
	<div class="add-post" id="addPost">
		<div class="add-post-form">
		<?php include 'poster.php';?>
		</div>
	</div>

    <!-- floating edit post  -->
	<div class="edit-post" id="editPost">
		<div class="add-post-form">
		<?php include 'post_editor.php';?>
		</div>
	</div>

    <!-- floating Delete post  -->
	<div class="delete-post" id="deletePost">
		<div class="add-post-form">
		<?php include 'delete_post.php';?>
		</div>
	</div>



    <div class="index-container">
		<div class="index-sidenav">
            <?php include '../Includes/Sidebar.php';?>
	    </div>

		<div class="index-header">
			<?php include '../Includes/Header.php'; ?>
		</div>

		<div class="index-content">
			<?php include 'feed.php';?>	
        </div>

	    <div class="add-post-button" onclick="showAddPost()"></div>
	</div>
		
	</div>	

</body>
</html>