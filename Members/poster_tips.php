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
<div class="add-post-container">
  <div class="close-button" onclick="hideAddPost()">
    <button>&times;</button>
  </div>
  <div class="add-form-title">CREATE POST</div>
<div class="add-post-form-container">
<div class="add-post-form-left">
  <form method="post" enctype="multipart/form-data">

    <select name="topic" hidden>
      <option>TIPS</option>
     
    </select>

    <div class="add-form-subtitles">Title</div>
    <div class="add-form-inputs">
      <input type="text" name="post_title" id="post_title" required>
    </div>
    <div class="add-form-subtitles">Description</div>
    <div class="add-form-inputs">
      <textarea name="post_content" id="post_content" required></textarea>
    </div>
        <input type="text" id="lat" name="lat" placeholder="Your lat.." hidden>    
        <input type="text" id="lng" name="lng" placeholder="Your lng.." hidden>
        <input type="text" id="loc" name="loc" placeholder="Your Loc.." hidden>

    <div class="add-form-subtitles">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
      </svg> Location
    </div>

        <div class="add-form-location disabled-btn" id="addloc">Add Location</div>

    <div class="add-form-subtitles">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
      </svg> Media
    </div>
        <div class="image-upload disabled-btn" title="Upload FIle">
          <input type="file" id="image1" name="image[]" accept="multiple" onchange="showImage(event);" multiple disabled>
          <label for="image1" class="disabled-btn">Add Photos/Videos</label>
        </div>
      </div>
        <div class="add-post-form-right">
          <div class="add-post-form-right-user">
            <div class="add-post-form-right-user-img"><img src="<?php echo $userpicture;?>" alt="..."/></div>  
            <div class="add-post-form-right-user-name"><?php echo $userfullname; ?></div>
          </div>

          <div class="add-post-form-right-imgvid"></div>

        </div>

    </div>
    <div class="post-button">
      <button type="submit" name="post">Post</button>
    </div>

  </form>
</div>
    
    
<?php
      if (isset($_POST['post'])){

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
                              
        $connect->query("insert into post (member_id,date_posted,post_content,post_title,topic,access) values('$id2','$date_posted','$post_content','$post_title','$topic','Member')");
        if($topic=="TIPS")
        {

        ?>
        <script>
        window.location = 'feed_tips.php';
        </script>
        <?php

        }
        } ?>