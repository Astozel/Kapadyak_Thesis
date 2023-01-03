function showMenu() {
	document.getElementById("profile").classList.toggle("active");
}

$(".viewpost-header-name").on({
    mouseenter: function () {
        document.getElementById("SendMsg").classList.toggle("active");
      
    },
    click: function () {
        document.getElementById("SendMsg").classList.remove("active");
    },
    mouseleave: function () {
        document.getElementById("SendMsg").classList.remove("active");
    }
});
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
    // document.getElementById("addPost").classList.remove("active");

    if ($('.add-post-form-right-media').contents().length != 0 || 
        $('#post_title').val().length != 0 || 
        $('#post_content').val().length != 0 
        ){
        if (confirm('Post will be discarded. Continue? ')) {
            document.getElementById("addPost").classList.remove("active");
            // $('#post_title').val('');
            // $('#post_content').val('');
            // $('.add-post-form-right').css("display", "none");
            // $('.add-post-form-right-media').remove(); 
            // $('.add-post-form-right-media-hidden').remove(); 
            location.reload();

        } else{

        }
    }else if(
    $('#post_title').val().length == 0 || 
    $('#post_content').val().length == 0 
    ){
        document.getElementById("addPost").classList.remove("active");
    }else if( $('#post_name').val().length != 0){
        if (confirm('Post will be discarded. Continue? ')) {
            document.getElementById("addPost").classList.remove("active");
        } else{
        }
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

