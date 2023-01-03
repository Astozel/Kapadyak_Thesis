<?php
 date_default_timezone_set('Asia/Manila'); 
include '../dbcon.php';	 
include '../session.php';

$msg_id=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="ICON" type="image/x-icon" href="../Images/logo.ico">
	<link rel="stylesheet" type="text/css" href="../style.css">
  <script src="../Script/index.js"></script>
	<title>Messages | Kapadyak</title>
</head>
<body>
      <!-- floating message post  -->
      <div class="add-post" id="addPost">
		<div class="add-post-form">
        <?php include 'compose_msg.php';?>
		</div>
	</div>

  <div class="message-container">
		<div class="index-sidenav">
			<?php include '../Includes/Sidebar.php'; ?>
		</div>

		<div class="index-header">
			<?php include '../Includes/Header.php'; ?>
		</div>

		<div class="message-content">
    <div class="chatbox-message">

    <?php

      $conn->query("update message set status='Read' where message_id='$msg_id'");
      $query = $conn->query("select * from message where message_id='$msg_id'") or die(mysql_error());
        while ($row = $query->fetch()) 
        {
          $message_to=$row['member_id'];
          $message_from=$row['sender_id'];
          $message_subject=$row['subject'];
          $recep_access=$row['access'];
        }
        if($recep_access=="Admin")
        {
          $pics = "../images/logo_forum.png";
          $query = $conn->query("select * from user where user_id='$message_from'") or die(mysql_error());
          while ($row = $query->fetch()) 
          {
            
            $name= $row['fname']." ".$row['mname']." ".$row['lname']." ( ADMIN )";
          }  
        }
          else
        {
          $query = $conn->query("select * from members where member_id='$message_from'") or die(mysql_error());
          while ($row = $query->fetch()) 
          {
            if($row['image'] == ""){
              $pics = "../Images/default-profile.png";
            } else{
              $pics = $row['image'];
            }
            $onlinestatus = $row['online_status'];
            $name= $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
          }  
        }
        ?>
          <div class="chatbox-message-header">
            <div class="message-header-img"><img src="<?php echo $pics; ?>"></div>
            <div class="message-header-text">
              <div class="message-header-name"><?php echo $name; ?></div>
              <div class="message-header-onlinestatus">
                <?php 
                if($onlinestatus == 'active'){
                  echo 'Online'; 
                  ?><img src="../Images/active.png"><?php
                }else if($onlinestatus == 'inactive'){
                  echo 'Offline'; 
                  ?><img src="../Images/inactive.png"><?php
                }?>
              </div>
            </div>
          </div>
          <div class="chatbox-message-content" id="chatboxcontent">
          <script src="../Scripts/scroll-animate.js" defer></script>
        <?php
        $msg_query = $conn->query("select * from message where member_id='$message_to' and sender_id='$message_from' and subject='$message_subject' or member_id='$message_from' and sender_id='$message_to' and subject='$message_subject' order by message_id ASC") or die(mysql_error());
        while ($msg_row = $msg_query->fetch()) 
        {
          $message_content=$msg_row['message_content'];
          $message_image=$msg_row['message_image'];
          $message_tox=$msg_row['member_id'];
          $message_fromx=$msg_row['sender_id'];
          $message_subjectx=$msg_row['subject'];
          $message_date=$msg_row['date_messaged'];
          $accessx=$msg_row['access'];
         
      
    ?>
        <?php
        if($message_tox == $id2){
        ?>
          <div class="msg-row-sender">
              <div class="msg-img-sender"><img src="<?php echo $pics; ?>"></div>
              <div class="msg-text-sender">
                  <div class="msg-text-sender-content"><?php echo $message_content;?></div>
              </div>
              <div class="msg-text-sender-imgvid-content">
            <?php 

                    if($message_image!=""){  
                        $i="";
                        $res=$msg_row['message_image'];
                        $res=explode(" ",$res);
                        $count=count($res)-1;    
   
                                $imgcounter=0;  $imgcount=0;  $vidcounter=0; 
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
                                    
                                    if($mediaType == "image"){
                                        $imgcount++;
                                    }
                                }
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
                                if($mediaType == "video"){
                                    $vidcounter++; 
                                  
                                        ?>
                                        <div class="msg-text-sender-imgvid">
                                        <video controls autoplay muted>
                                            <source src="../message_videos/<?= $res[$i]?>">
                                        </video>
                                        </div>
                                        <?php
                                    
                                }   
                            }


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
                                        $imgcounter++; 
                                        break;
                                }

                                if($mediaType == "image"){
                                        ?>
                                        <div class="msg-text-sender-imgvid" id="images-container">
                                        <img src="../message_images/<?= $res[$i]?>"/>
                                        <?php
                                        ?></div> <?php
                                    }

                                }
                        } 
                    ?>
                
                </div>
                <div class="msg-text-sender-date">
                  <?php 
                    include_once 'function_timeformat.php';
                    echo formatTimeString($message_date); 
                  ?>
                </div>
                </div>
    <?php    
		} else{
      ?>
      <div class="msg-row-from">
              <div class="msg-text-from">
                  <div class="msg-text-sender-content"><?php echo $message_content; ?></div>
              </div>
              <div class="msg-text-from-imgvid-content">
            <?php 

                    if($message_image!=""){  
                        $i="";
                        $res=$msg_row['message_image'];
                        $res=explode(" ",$res);
                        $count=count($res)-1;    
   
                                $imgcounter=0;  $imgcount=0;  $vidcounter=0; 
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
                                    
                                    if($mediaType == "image"){
                                        $imgcount++;
                                    }
                                }
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
                                if($mediaType == "video"){
                                    $vidcounter++; 
                                  
                                        ?>
                                        <div class="msg-text-sender-imgvid">
                                        <video controls autoplay muted>
                                            <source src="../message_videos/<?= $res[$i]?>">
                                        </video>
                                        </div>
                                        <?php
                                    
                                }   
                            }


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
                                        $imgcounter++; 
                                        break;
                                }

                                if($mediaType == "image"){
                                        ?>
                                        <div class="msg-text-sender-imgvid" id="images-container">
                                        <img src="../message_images/<?= $res[$i]?>"/>
                                        <?php
                                        ?></div> <?php
                                    }

                                }
                        } 
                    ?>
                
                </div>
                <div class="msg-text-from-date">
                  <?php 
                    include_once 'function_timeformat.php';
                    echo formatTimeString($message_date); 
                  ?>
                </div>
                </div>
      <?php
    }
  }
    ?> 




    </div> <!--content close-->
    
      <form role="form" method="post" action="send_reply.php?id=<?php echo  $message_from; ?>" enctype="multipart/form-data">
        <input name="msg_id" type="hidden"   value="<?php echo $msg_id; ?>"/>
        <input name="subject" type="hidden"  value="<?php echo $message_subject; ?>"/>
        
        <div class="msg-controls">
         
              <div class="msg-input-type">
                <input type="text" name="msg" id="type-msg" placeholder="Type your message here.." required>
              </div>
              <div class="msg-input-file">
                  <label for="message-image-upload">
                    <!-- Add Photos/ Videos -->
                    <span id="message-span-text"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                      <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                    </svg>
                    
                  </label>
                  <input type="file" name="image[]" id="message-image-upload" multiple/>
              </div>   
              <script src="../Scripts/fileshow.js"></script>

          
          <div class="msg-input-buttons">
            <button type="submit" name="sendreply">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
              <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
            </svg>
            </button>
            <!-- <input type="button" value="Cancel" onclick="javascript:location.href='inbox.php'"> -->
          </div>
        </div>
      </form>
      </div>
		</div> 
<div class="right-nav">	
      <?php include('member_online.php')?>
  </div>

</body>
</html>