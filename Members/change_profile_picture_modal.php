<?php
 include '../session.php';
 include '../dbcon.php';	 

?>
<div class="add-post-container add-post-container-profile">
	
	<form method="post" action="update_profile_picture.php" enctype="multipart/form-data">
		
	<div class="image-upload" title="Upload FIle">
		<input type="file" id="image1" name="image" accept="image/*" onchange="showImage(event);" required>
		<label for="image1">Upload Image</label>
	<div class="image-preview">
		<img id="image1-preview">
	</div>
	</div>
	<div class="post-button change-btn">
		<button type="submit" name="post">Save</button>
	</div>
	</form>

	<script>
		$('.close-button').on('click', function() {
			var fileList = document.getElementById("image1").files;
			console.log(fileList);
			if(fileList.length > 0){
				if (confirm('Post will be discarded. Continue? ')) {
				document.getElementById("addPost").classList.remove("active");
				$(fileList).val('');
				$("#image1-preview").attr("src"," ");
				$("#image1-preview").css("display","none");
				} else{
				}
			}else{
				document.getElementById("addPost").classList.remove("active");
			}
		});
	</script>
</div>
			