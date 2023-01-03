
	<?php
  include('../dbcon.php');       
  include('../session.php'); 
  date_default_timezone_set('Asia/Manila');
    $recep_id=$_GET['id'];
      
    if (isset($_POST['sendreply'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
  
    if(empty($errors)==true) {
      $file='';
      $file_tmp='';
      $image_location="../message_images/";
      $video_location="../message_videos/";
      $data='';
     
      foreach($_FILES['image']['name'] as $key=>$val)
     {

  
      $file=$_FILES['image']['name'][$key];
      $file = str_replace(' ', '_', $file);
      $file_tmp=$_FILES['image']['tmp_name'][$key];
      $tmp = explode('.', $file);
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
        move_uploaded_file($file_tmp,$video_location.$file);
      } else{
        move_uploaded_file($file_tmp,$image_location.$file);
      }
      
      $data .=$file." ";
      if($data == " "){
          $data = "";
      }

  }
    
  	  $subject = $_POST['subject'];
      $msg = $_POST['msg'];
	  $msg_id = $_POST['msg_id'];
      $access = "Member";
      $status =  "Unread";
      // $date_posted = date('M'.' '.'d'.', '.'Y')." | ".date("h:i:s A");
      $date_posted = time();
	    
	  $conn->query("insert into message (message_content,status,date_messaged,message_image,subject,member_id,sender_id) 
	  values('$msg','$status','$date_posted','$data','$subject','$recep_id','$id2')");
?>

<script>
                                // alert('Message sent!');
							 window.location = 'read_msg.php?id=<?php echo $msg_id;?>';
							</script>	
						 <?php
						       }} 