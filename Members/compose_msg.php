<?php
 include('../dbcon.php');
 include('../session.php');

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <script src="../Scripts/index.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>Document</title>
</head>
<body>
  
  <?php
  if(isset($_POST['send-message'])){
    ?>
    <script> 
      showAddPost(); 
    </script> 
    <?php
    $recep_id = $_POST['getid'];
    $query = $conn->query("select * from members where member_id='$recep_id'") or die(mysql_error());
    while ($row = $query->fetch()) 
    {
      $to_id = $row['member_id'];
      $recep_name=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
    }
  }else if(isset($_POST['send-message-admin'])){
    ?>
    <script> 
      showAddPost(); 
    </script> 
    <?php
    $recep_id = $_POST['getid'];  
    $query = $conn->query("select * from user where user_id='$recep_id'") or die(mysql_error());
		while ($row = $query->fetch()) 
        {
			$to_id = $row['user_id'];
			$recep_access= "Admin";
			$recep_name=$row['fname']." ".$row['mname']." ".$row['lname']." - ".$recep_access;
		}
  }
  ?>


<div class="add-post-container">
  <div class="close-button" onclick="hideAddPost()">

    <button>&times;</button>
  </div>
  <div class="add-form-title">COMPOSE MESSAGE</div>
    
<div class="add-post-form-container">
<div class="add-post-form-left">
    <form role="form" class="login_form" method="post" action="send_msg.php?id=<?php echo $to_id; ?>" enctype="multipart/form-data">

    <div class="add-form-subtitles">To</div>
    <div class="add-form-inputs">
      <input name="recep_name" type="text" class="form-control" id="post_name"  value="<?php echo $recep_name; ?>" >
    </div>
    <div class="add-form-subtitles">Subject</div>
    <div class="add-form-inputs">
      <input name="subject" type="text" class="form-control" id="post_title" placeholder="Enter Subject"  required>
    </div>
    <div class="add-form-subtitles">Message</div>
    <div class="add-form-inputs">
      <textarea rows="10" name="msg" class="form-control" id="post_content" spellcheck="true" placeholder="Write your Message here!" required="true"></textarea>       
    </div>
    <div class="add-form-subtitles">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
      </svg> Media
    </div>
        <div class="image-upload" title="Upload FIle">
          <input type="file" id="image1" name="image[]" accept="multiple" onchange="showImage(event);" multiple>
          <label for="image1">Add Photos/Videos</label>
        </div>
      </div>
        <div class="add-post-form-right">
          <div class="add-post-form-right-user">
            <div class="add-post-form-right-user-img"><img src="<?php echo $userpicture;?>" alt="..."/></div>  
            <div class="add-post-form-right-user-name"><?php echo $userfullname; ?></div>
          </div>

          <div class="add-post-form-right-imgvid"></div>

<script>
$('#image1').on('change', function() {
  var fileList = document.getElementById("image1").files;
  console.log(fileList);
  if(fileList.length > 0){
    $('.add-post-form-right').css("display", "block");
    $('.add-post-form-right-media').remove(); 
    $('.add-post-form-right-media-hidden').remove(); 

    var vidcounter = 0;
    var imgcounter = 0;
    var counter = 0;

    for(var i = 0 ; i < fileList.length ; i++){
      var fileName = this.files[i].name;
      var file_ext = fileName.split('.').pop();
      var mediaType = "";
      switch(file_ext) {
      case "mp4":
      case "mkv":
      case "mov":
      case "ogg":
      case "webm":
          mediaType = "video";
          break;
      case "jpg":
      case "jpeg":
      case "gif":
      case "png":

      default:
          mediaType = "image";
          break;
      }
      
       if(mediaType == "video"){
        counter = imgcounter + vidcounter;
        var div = document.createElement('div');
        Object.assign(div, {
        className: 'add-post-form-right-vid add-post-form-right-media',
        });
        if(vidcounter >= 6){
          div.classList.remove("add-post-form-right-media");
          div.classList.add("add-post-form-right-media-hidden");
          document.getElementsByClassName("poster_hidden")[0].appendChild(div);
          var vid = document.createElement('video');
          vid.src = URL.createObjectURL(this.files[counter]);
          vid.setAttribute("controls","");
          document.getElementsByClassName('add-post-form-right-vid')[vidcounter+1].appendChild(vid);
        }else{
          //excess background
          if(vidcounter == 6){
            document.getElementsByClassName("add-post-form-right-imgvid")[0].appendChild(div);
            var vid = document.createElement('video');
            vid.src = URL.createObjectURL(this.files[counter]);
            vid.setAttribute("controls","");
            document.getElementsByClassName('add-post-form-right-vid')[vidcounter].appendChild(vid);
          //excess background - loop again to throw it in hidden
            var div2 = document.createElement('div');
            Object.assign(div2, {
            className: 'add-post-form-right-vid add-post-form-right-media',
            });
            div2.classList.remove("add-post-form-right-media");
            div2.classList.add("add-post-form-right-media-hidden");
            document.getElementsByClassName("poster_hidden")[0].appendChild(div2);
            var vid2 = document.createElement('video');
            vid2.src = URL.createObjectURL(this.files[counter]);
            vid2.setAttribute("controls","");
            document.getElementsByClassName('add-post-form-right-vid')[vidcounter+1].appendChild(vid2);
          }else{
            document.getElementsByClassName("add-post-form-right-imgvid")[0].appendChild(div);
            var vid = document.createElement('video');
            vid.src = URL.createObjectURL(this.files[counter]);
            vid.setAttribute("controls","");
            document.getElementsByClassName('add-post-form-right-vid')[vidcounter].appendChild(vid);
          }

        }
        vidcounter++;
        console.log("vid: "+vidcounter);

      } else if(mediaType == "image"){
        imgcounter++;
        console.log("img: " + imgcounter);
      }
    }

    var vidcounter2 = 0;
    var imgcounter2 = 0;
    var counter2 = 0;

      for(var i = 0 ; i < fileList.length ; i++){
      var fileName = this.files[i].name;
      var file_ext = fileName.split('.').pop();
      var mediaType = "";
      switch(file_ext) {
      case "mp4":
      case "mkv":
      case "mov":
      case "ogg":
      case "webm":
          mediaType = "video";
          break;
      case "jpg":
      case "jpeg":
      case "gif":
      case "png":

      default:
          mediaType = "image";
          break;
      }
      
       if(mediaType == "image"){
        counter2 = imgcounter2 + vidcounter2;
        var div = document.createElement('div');
        Object.assign(div, {
        className: 'add-post-form-right-img add-post-form-right-media',
        });
        if(counter2 >= 6){
          div.classList.remove("add-post-form-right-media");
          div.classList.add("add-post-form-right-media-hidden");
          document.getElementsByClassName("poster_hidden")[0].appendChild(div);
          var img = document.createElement('img');
          img.src = URL.createObjectURL(this.files[counter2]);
          document.getElementsByClassName('add-post-form-right-img')[imgcounter2+1].appendChild(img);
        }else{
          //excess background
          if(counter2 == 5){
            document.getElementsByClassName("add-post-form-right-imgvid")[0].appendChild(div);
            var img = document.createElement('img');
            img.src = URL.createObjectURL(this.files[counter2]);
            document.getElementsByClassName('add-post-form-right-img')[imgcounter2].appendChild(img);

          //excess background - loop again to throw it in hidden
            var div2 = document.createElement('div');
            Object.assign(div2, {
            className: 'add-post-form-right-img add-post-form-right-media',
            });
            div2.classList.remove("add-post-form-right-media");
            div2.classList.add("add-post-form-right-media-hidden");
            document.getElementsByClassName("poster_hidden")[0].appendChild(div2);
            var img2 = document.createElement('img');
            img2.src = URL.createObjectURL(this.files[counter2]);
            document.getElementsByClassName('add-post-form-right-img')[imgcounter2+1].appendChild(img2);
          }else{
            document.getElementsByClassName("add-post-form-right-imgvid")[0].appendChild(div);
            var img = document.createElement('img');
            img.src = URL.createObjectURL(this.files[counter2]);
            document.getElementsByClassName('add-post-form-right-img')[imgcounter2].appendChild(img);
          }
        }
        imgcounter2++;
        console.log("img: " + imgcounter2);
        
      } else if(mediaType == "video"){
        vidcounter2++;
        console.log("vid: "+vidcounter2);
      }
        //excess counter
        if (i == 5) {
        counter = (imgcounter + vidcounter)-5;
        var excess = document.createElement('div');
        Object.assign(excess, {
        className: 'add-post-form-excesscounter',
        })
        document.getElementsByClassName("add-post-form-right-imgvid")[0].appendChild(div);
        excess.appendChild(document.createTextNode("+" + counter));
        document.getElementsByClassName('add-post-form-right-media')[i].appendChild(excess);
        }  
    }
  
  }
  });   

</script>

      <div class="poster_full">
          <div class="poster_img_view">
            <img id="img" src="" alt="" />
          </div>
          <button class="poster_view_close" type="button">&times;</button>
      </div>
      <div class="poster_hidden">
        <button class="poster_hidden_view_close view_close" type="button">&times;</button>
      </div>

      <script src="../Scripts/fullscreen-image.js"></script>
        </div>

    </div>
    <div class="post-button">
      <button type="submit" name="post">Send</button>
    </div>

  </form>
</div>
</body>
</html>    