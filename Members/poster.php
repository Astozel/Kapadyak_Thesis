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
    
<div class="close-button" onclick="hideAddPost()">
  <button>&times;</button>
</div>
<div class="add-form-title">CREATE POST</div>
<form method="post" enctype="multipart/form-data">

    <select name="topic" hidden>
        <?php  
          $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
          if($curPageName == "index.php"){
            ?><option>FEED</option><?php
          }elseif($curPageName == "feed_rental.php"){
            ?><option>RENTAL</option><?php
          }elseif($curPageName == "feed_events.php"){
            ?><option>EVENT</option><?php
          }elseif($curPageName == "feed_pre.php"){
            ?><option>PRE LOVED</option><?php
          }elseif($curPageName == "gallery.php"){
            ?><option>GALLERY</option><?php
          }
        ?>  
    </select>

    <div class="add-form-subtitles">Title</div>
    <div class="add-form-inputs">
      <input type="text" name="post_title" required>
    </div>
    <div class="add-form-subtitles">Description</div>
    <div class="add-form-inputs">
      <textarea name="post_content" required></textarea>
    </div>
        <input type="text" id="lat" name="lat" placeholder="Your lat.." hidden>    
        <input type="text" id="lng" name="lng" placeholder="Your lng.." hidden>
        <input type="text" id="loc" name="loc" placeholder="Your Loc.." hidden>

    <div class="add-form-subtitles">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
      </svg> Location
    </div>

        <div class="add-form-location" id="addloc">Add Location</div>

    <div class="add-form-subtitles">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
      </svg> Media
    </div>
        <div class="image-upload" title="Upload FIle">
          <input type="file" id="image1" name="image[]" accept="multiple" onchange="showImage(event);" multiple>
          <label for="image1">Add Photos/Videos</label>
      <!-- <script>
        $('#image1').on('change', function() {
          if(this.files.length > 0){
            var length = this.files.length;
            <?php
                $res=$data['post_image'];
                $res=explode(" ",$res);
                $count=count($res)-1;    

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
                    ?>
                    <div class="viewpost-body-container-vid">
                    <video controls autoplay muted>
                        <source src="../post_videos/<?= $res[$i]?>">
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
                    break;
                }
                if($mediaType == "image"){   
                    ?>
                    <span class="viewpost-body-container">
                    <img src="../post_images/<?= $res[$i]?>"/>
                    </span>
                    <?php
                }
            } 
            
                ?>

          }
          console.log(this.files[0].name);
          
        });   
      </script> -->
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
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
        $address = $_POST['loc'];
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
                              
        $connect->query("insert into post (member_id,date_posted,post_content,post_title,post_image,topic,access,lat,lng,loc) values('$id2','$date_posted','$post_content','$post_title','$data','$topic','Member','$lat','$lng','$address')");
        if($topic=="FEED")
        {

        ?>
        <script>
        window.location = 'index.php';
        </script>

        <?php  
        }
                                      
                                     
        }} 
  ?>
                                   
<?php
include_once 'header_map.php';
include 'locations-modal.php';
//get_unconfirmed_locations();exit;
?>

</div>
    <div class="add-location-popup">
      <div class="add-location-container">
        <button class="map-btn" type="button">&times;</button>
        <div id="geocoder"></div>
        <div id="map"></div>
      </div>
    </div>

    <script>
          $('.add-location-popup').hide();
          $('.map-btn').click(function () {
            $('.add-location-popup').fadeOut(200);
          });
          $('.add-form-location').click(function () {
            $('.add-location-popup').fadeIn(200);
          });
    </script>


    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

    <script>

        var saved_markers = <?= get_saved_locations() ?>;
        var user_location = [120.445174,14.861665];
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/satellite-streets-v11',
            center: user_location,
            zoom: 11  
        });
        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            marker: {
            color: 'orange'
          },
        mapboxgl: mapboxgl
            // limit results to Australia
            //country: 'IN',
        });

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
              // alert("aaaaa");
              // document.getElementById('loc').value = ev.result.place_name;
              // console.log(ev.result);
            });
        });
        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;
            $.get(
              "https://api.mapbox.com/geocoding/v5/mapbox.places/" + e.lngLat.lng + "," + e.lngLat.lat + ".json?&access_token=pk.eyJ1IjoianNjYXN0cm8iLCJhIjoiY2s2YzB6Z25kMDVhejNrbXNpcmtjNGtpbiJ9.28ynPf1Y5Q8EyB_moOHylw",
              function(data) {
                // console.log(data.features[0].place_name);
                document.getElementById('loc').value = data.features[0].place_name;
                document.getElementById('addloc').innerHTML = data.features[0].place_name;
              }
            ).fail(function(jqXHR, textStatus, errorThrown) {
              alert("There was an error while geocoding: " + errorThrown);
            });
        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                    .setLngLat(marker)
                
            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

     

                    map.addControl(
            new mapboxgl.GeolocateControl({
            positionOptions: {
            enableHighAccuracy: true
            },
            // When active the map will receive updates to the device's location as it changes.
            trackUserLocation: true,
            // Draw an arrow next to the location dot to indicate which direction the device is heading.
            showUserHeading: true
            })
        );
        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
    </script>


