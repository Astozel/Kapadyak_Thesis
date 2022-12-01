function showMenu() {
	document.getElementById("profile").classList.toggle("active");
}

function showreply(){
    document.getElementById("reply-form").classList.toggle("active");
}

function showImage(event){
    if(event.target.files.length > 0){
        console.log(event.target.files[0]);
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("image1-preview");
        preview.src = src;
        preview.style.display = "block";

    } 
}
function showAddPost() {
	document.getElementById("addPost").classList.toggle("active");
}
function hideAddPost() {
    if ($('.add-post-form-right-media').contents().length != 0){
        if (confirm('Post will be discarded. Continue? ')) {
            document.getElementById("addPost").classList.remove("active");
            $('.add-post-form-right').css("display", "none");
            $('.add-post-form-right-media').remove(); 
            $('.add-post-form-right-media-hidden').remove(); 
        } else{

        }
    }else{
       
    }
   
}

function showEditPost() {
	document.getElementById("editPost").classList.toggle("active");
}
function hideEditPost() {
    // window.location.href= '#';
	document.getElementById("editPost").classList.remove("active");
}
function showDeletePost() {
	document.getElementById("deletePost").classList.toggle("active");
}
function hideDeletePost() {
    // window.location.href= '#';
	document.getElementById("deletePost").classList.remove("active");

}

         $("input[type=file]").on("change", function () {
          if(this.files[0].size > 52428800) {
            alert("Please upload file less than 50MB.");
            $(this).val('');
          }
          });

