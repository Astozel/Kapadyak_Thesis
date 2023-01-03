<?php  
include '../session.php';
include '../dbcon.php';	 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="ICON" type="image/x-icon" href="../Images/logo.ico">
	<link rel="stylesheet" type="text/css" href="../style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function(){
        $('nav ul li a').click(function(){
            $('ul li a').removeClass("highlight");
            $(this).addClass("highlight");
        })
        });
    </script>
	<title>RENTAL | Kapadyak</title>
</head>
<body>
  <!-- floating add post  -->
	<div class="add-post" id="addPost">
		<div class="add-post-form">
		<?php include 'poster_rental.php';?>
		</div>
	</div>
    <div class="index-container">
		<div class="index-sidenav">
		
    <nav class="navbar">
        <ul class="navbar-nav">
<!-- Logo -->
            <li class="logo noHover noFilter">
                <a href="#" class="nav-link ">
                <span><img src="../Images/logo.png" class="nav-logo"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <g class="fa-group">
                    <path
                        fill="currentColor"
                        fill-rule="evenodd" 
                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"
                    ></path>
                    </g>
                </svg>
                </a>
            </li>
<!-- Newsfeed -->
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Newsfeed</span>
                </a>
            </li>
<!-- Rental -->
<li class="nav-item">
                <a href="feed_rental.php" class="nav-link highlight">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-bicycle" viewBox="0 0 16 16">
                <path />
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057 9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Rental</span>
                </a>
            </li>
<!-- Event -->
<li class="nav-item">
                <a href="feed_events.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Event</span>
                </a>
            </li>
<!-- Pre-loved -->
            <li class="nav-item">
                <a href="feed_pre.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                <path  />
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Pre-loved</span>
                </a>
            </li>
<!-- Profile -->
            <li class="nav-item">
                <a href="personal_info_panel.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        fill-rule="evenodd" 
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Profile</span>
                </a>
            </li>
<!-- Message -->
            <li class="nav-item">
                <a href="inbox.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Message 
                    <?php 
                    $msg_query = $conn->query("SELECT COUNT(member_id) as unreadMessage FROM message WHERE status='Unread' AND member_id='$id2'");
                    $data=$msg_query->fetch();
                    $unreadCount = $data['unreadMessage'];
                    if($unreadCount > 0){ 
                        ?><span class="link-text-badge"><?php echo $unreadCount; ?> </span> <?php
                    }?>  
                </span>
                </a>
            </li>
<!-- Status -->
            <li class="nav-item">
                <a href="member.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
                        class="fa-primary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"
                        class="fa-secondary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Online</span>
                </a>
            </li>
<!-- Gallery -->
            <li class="nav-item">
                <a href="gallery.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                <path />
                <path />
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Gallery</span>
                </a>
            </li>
            </li>
        
        <!-- Manage Member -->
        <li class="nav-item">
<a href="tips.php" class="nav-link ">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
<g class="fa-group">
<path
  fill="currentColor"
  d="M0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5A1.5 1.5 0 0 0 0 1.5z"
  class="fa-secondary"
></path>
<path
  fill="currentColor"
 d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zm6 8.5a1 1 0 0 1 1-1h4.396a.25.25 0 0 1 .177.427l-5.146 5.146a.25.25 0 0 1-.427-.177V10.5z"
  class="fa-primary"
></path>
</g>
</svg>
<span class="link-text"> Tips & Tricks</span>
</a>
</li>
</ul>
</nav>

		</div>

		<div class="index-header">
			<?php include '../Includes/Header.php'; ?>
		</div>

		<div class="index-content">
    <?php  
error_reporting(0);

$conn = new PDO('mysql:host=localhost;dbname=db_kapadyak', 'root', '');
include('../session.php');

?>


<div class="feed-cards">

<?php  
    $post_query = $conn->query("select * from post LEFT JOIN members on post.member_id = members.member_id where topic='RENTAL' order by post_id DESC");
    while($post_row = $post_query->fetch()){

    $ppppp=$post_row['post_id'];

    $access_query = $conn->query("select * from post where post_id='$ppppp'");
    while($access_row = $access_query->fetch())
    {
    $access=$access_row['access'];
    $user_idx=$access_row['member_id'];
    }
?>
  <div class="feed-card">
    
    <div class="feed-card-heading">
      <table border="0">
      <tr>
        <th rowspan="2"> 
          <img src="
            <?php if($access=="Admin"){echo  "../images/logo_forum.png";}else{
            $getImage = $post_row['image'];
            if($getImage == ""){
              echo "../Images/default-profile.png";
            } else{
              echo $post_row['image'];
            }
          }
            ?>
          " class="img-square"> </th>
        
        <td class="card-heading-name">
          <?php 

          if($access=="Admin")
          { 
          $name_query = $conn->query("select * from user where user_id='$user_idx'");
          while($name_row = $name_query->fetch())
          {
          echo $name_row['lname']." ".$name_row['fname']." ".$name_row['mname']." - Admin";
          }

          }
          else
          {  
          echo $post_row['first_name']." ".$post_row['middle_name']." ".$post_row['last_name'];
          }


          ?>
        </td>
        <?php if($post_row['member_id']==$id2){ ?>
        <td class="card-heading-buttons">
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="getid" value="<?php echo $ppppp; ?>">
        <button type="submit" name="edit-post" class="edit-delete-button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
        </svg>
        Edit</button>
        </form> 
        
   
        </td>
        <?php } ?>  

      </tr>  
      <tr>
        <td class="card-heading-datetime"> <?php echo $post_row['date_posted'];?>  </td>
        <?php if($post_row['member_id']==$id2){ ?>
          <td class="card-heading-buttons">
          <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="getid" value="<?php echo $ppppp; ?>">
          <button type="submit" name="delete-post" class="edit-delete-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
            </svg>
            Delete</button>
            </form> 
          </td>
        <?php  } ?>  
      </tr>
     
      </table>
    </div>
   
    <div class="feed-card-body">
   
          <div class="card-body-header"> 
                <ul> 
                  <li>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                      <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"
                            class="fa-tertiary"
                        ></path>
                        <path
                        ></path>
                      </g>
                    </svg>
                    <span>
                      (<font color="red"><?php  echo $post_row['threads']; ?></font>)
                    </span>
                  </li>
                  <li>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                      <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"
                            class="fa-tertiary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"
                            class="fa-tertiary"
                        ></path>
                      </g>
                    </svg>
                  <span>
                    (<font color="orange"><?php  echo $post_row['views']; ?></font>)
                  </span>
                  </li>
                  
                  <li>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                      <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"
                            class="fa-tertiary"
                        ></path>
                      </g>
                    </svg>
                  <span>(<font color="blue"><?php echo $post_row['replies']; ?></font>)</span>
                  </li>

                </ul>
          </div>

            <div class="card-body-content">  
              <?php 
              $i="";
              $iquery=mysqli_query($connect,"select post_image from post where post_id = '$ppppp'");
              $data=mysqli_fetch_array($iquery);
              $res=$data['post_image'];
              $res=explode(" ",$res);
              $count=count($res)-1;     

              if($post_row['post_image'] != "" && $count > 1){ 
                 
                for($i=0;$i<$count;$i++)
                {
                    $tmp = explode('.', $res[$i]);
                    $file_ext = end($tmp);
                    $mediaType = "";

                    switch ($file_ext) {
                        case "mp4":
                        case "mkv":
                        case "mov":
                        case "ogg":
                        case "webm":
                            $mediaType = "video";
                            break;
                        case "jpg":
                        case "jpeg":
                        case "gif":
                        case "png":

                        default:
                            $mediaType = "image";
                            break;
                    }
                    ?>
                    <div class="card-body-background">
                    <?php
                    if($mediaType == "video"){
                        ?>
                        <video src="../post_videos/<?= $res[$i]?>"></video>
                        <?php
                    } else if($mediaType == "image"){
                        ?>
                        <img src="../post_images/<?= $res[$i]?>"/>
                        <?php
                    }
                    ?>
                    </div>
                    <?php
              } ?>

                <div class="card-title-float">
                  <?php echo $post_row['post_title']; ?>
                </div><?php 

              } else if($post_row['post_image'] != "" && $count == 1){ 
                for($i=0;$i<$count;$i++)
                {
                    $tmp = explode('.', $res[$i]);
                    $file_ext = end($tmp);
                    $mediaType = "";

                    switch ($file_ext) {
                        case "mp4":
                        case "mkv":
                        case "mov":
                        case "ogg":
                        case "webm":
                            $mediaType = "video";
                            break;
                        case "jpg":
                        case "jpeg":
                        case "gif":
                        case "png":

                        default:
                            $mediaType = "image";
                            break;
                    }
                    ?>
                    <div class="card-body-background-single">
                    <?php
                    if($mediaType == "video"){
                        ?>
                        <video src="../post_videos/<?= $res[$i]?>"></video>
                        <?php
                    } else if($mediaType == "image"){
                        ?>
                        <img src="../post_images/<?= $res[$i]?>"/>
                        <?php
                    }
                    ?>
                    </div>
                    <div class="card-title-float">
                      <?php echo $post_row['post_title']; ?>
                    </div>
                    <?php
                    
              } 
              }
              else{?>
                <div class="card-title-float-blank">
                  <?php echo $post_row['post_title']; ?>
                </div><?php
              }
              ?>
              
              </div>
              <div class="card-popup">
              <a href="add_views.php?id=<?php echo $ppppp ?>">View Post</a>
              </div>
              
            </div>
              
  </div>
  
  <?php } ?> 

</div>
      <div class="add-post-button" onclick="showAddPost()"></div>
		</div>
    <div class="footer">
        <?php include_once('Includes/Footer.php')?>
    </div>
	</div>	

</body>
</html>