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
          <option>TIPS</option>
        </select>
    </div>
    <div class="add-form-subtitles">Title: </div>
        <input type="text" name="post_title" class="form-control" required>
    <div class="add-form-subtitles">Description:</div>
        <textarea name="post_content" class="form-control" rows="12" required></textarea>

      
    <div class="post-button">

    <button type="submit" name="post">Post</button>
    </div>
  </form>

    <?php
      if (isset($_POST['post'])){

        $topic = $_POST['topic'];
        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $date_posted = date('m'.'/'.'d'.'/'.'Y')." | ".date("h:i:sa");
 
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
        window.location = 'tips.php';
        </script>
        <?php

        }
        } ?>
            
    </div>             
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
