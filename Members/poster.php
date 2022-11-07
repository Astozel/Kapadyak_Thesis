<?php
  require '../connect/connection.php';
  include('../session.php');
?>

<?php 
if (!isset($_SESSION['SessionEmail'])) {
 header("location:../login.php?=Error");
 }

?>
  <?php  date_default_timezone_set('Asia/Manila'); include('../dbcon.php') ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <script src="../Scripts/index.js"></script>
  <title>Create Post</title>
</head>
<body>
<div class="close-button" onclick="hideAddPost()"><button>&times;</button></div>
<div class="add-form-title">CREATE POST</div>
<form method="post" enctype="multipart/form-data">
  <div class="add-form-subtitles">Category:</div>
    <div> 
        <select name="topic" class="form-control">
          <option>FEED</option>
          <!-- <option>PRE LOVED</option>
          <option>RENTAL</option>
          <option>EVENTS</option> -->
        </select>
    </div>
    <div class="add-form-subtitles">Title: </div>
        <input type="text" name="post_title" class="form-control" required>
    <div class="add-form-subtitles">Description:</div>
        <textarea name="post_content" class="form-control" rows="12" required></textarea>

            <div class="image-upload" title="Upload FIle">
                <input type="file" id="image1" name="image[]" accept="multiple" onchange="showImage(event);" multiple>
                <label for="image1">Add Photos/Videos</label><br>

              <div class="image-preview">
                <img id="image1-preview">
              </div>
            </div>
    <div class="post-button">

    <button type="submit" name="post">Post</button>
    </div>
  </form>

    <?php
      if (isset($_POST['post'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
    
      if(empty($errors)==true) {
        $file='';
        $file_tmp='';
        $image_location="../post_images/";
        $video_location="../post_videos/";
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
        $topic = $_POST['topic'];
        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $date_posted = date('M'.' '.'d'.', '.'Y')." | ".date("h:i:s A");
 
        $query_topic_ctr = $conn->query("select * from members where member_id='$id2'") or die(mysql_error());
		    while ($row_query_topic_ctr = $query_topic_ctr->fetch()) 
        {
            $ctr_topic=$row_query_topic_ctr['topic_ctr']+1;
            $conn->query("update members set topic_ctr='$ctr_topic' where member_id='$id2'");
        }
                              
        $connect->query("insert into post (member_id,date_posted,post_content,post_title,post_image,topic,access) values('$id2','$date_posted','$post_content','$post_title','$data','$topic','Member')");
        if($topic=="FEED")
        {

        ?>
        <script>
        </script>

        <?php
        }
       
        {
        
          ?>
          <?php
              include('../connect/connection.php');
          
          
                              require "../Mail/phpmailer/PHPMailerAutoload.php";
                              $mail = new PHPMailer;
              
                              $mail->isSMTP();
                              $mail->Host='smtp.gmail.com';
                              $mail->Port=587;
                              $mail->SMTPAuth=true;
                              $mail->SMTPSecure='tls';
              
                              $mail->Username = 'teamkapadyak2022@gmail.com';
                              $mail->Password = 'hsqqhqktekjzabfj';
          
                              $mail->setFrom('teamkapadyak2022@gmail.com', 'Kapadyak');
                              $check_query = mysqli_query($connect, "SELECT * FROM members where email_status = '1'");
                              $rowCount = mysqli_num_rows($check_query);
                              if($rowCount>0){
                              
                                      while($x=mysqli_fetch_assoc($check_query)){
          
                                          $mail->addBCC($x['email_address']);
          
                                      }
                                  $mail->isHTML(true);
                                  $mail->Subject="New Event is Upcoming";
                                  $mail->Body="<p>Kindly check out the new post on your event page.<br></h3>
                                  <br><br>
                                  <b>The Kapadyak Team</b>";
                                  if($mail->send()){
                                      echo "Success";
                                  }
                                  else 
                                  echo "failed";
                              }
                              else{
                                  echo "no data found";
                              }
                              ?>
                        <script>
                        </script>	
                        
                        <?php  
                                  }
                                      
                                       } else {
                                        print_r($errors);
                                       } }?>
            
            </div>
            
               
          </div>