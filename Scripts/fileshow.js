$('#comment-image-upload').on('change', function() {
  if(this.files[0].size > 524288) {
    alert("Please upload file less than 50MB.");
    $(this).val('');
  }else{
    var fileName = $('#comment-image-upload').val().split('\\').pop();
    var _size = this.files[0].size;
    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
    i=0;while(_size>900){_size/=1024;i++;}
    var exactSize = (Math.round(_size*100)/100)+' '+fSExt[i];
    console.log('FILE SIZE = ',exactSize);
    $("#comment-image-upload").click();
    $('#span-text').text(fileName + " - " + exactSize);
  }
});   

var comment;
$("#comment-image-upload").change(function(event) {
  if(this.files[0].size > 524288) {
    alert("Please upload file less than 50MB.");
    $(this).val('');
  }else{
  console.log('change')
  if (!comment) {
    document.getElementById('span-text').classList.add("chosen");
  } else {
    document.getElementById('span-text').classList.remove("chosen");
  }
  }

});

$('#reply-image-upload').on('change', function() {
  if(this.files[0].size > 524288) {
    alert("Please upload file less than 50MB.");
    $(this).val('');
  }else{
    var fileName = $('#reply-image-upload').val().split('\\').pop();
    var _size = this.files[0].size;
    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
    i=0;while(_size>900){_size/=1024;i++;}
    var exactSize = (Math.round(_size*100)/100)+' '+fSExt[i];
    console.log('FILE SIZE = ',exactSize);
    $("#reply-image-upload").click();
    $('#span-text-reply').text(fileName + " - " + exactSize);
  }
});   

var reply;
$("#reply-image-upload").change(function(event) {
  if(this.files[0].size > 524288) {
    alert("Please upload file less than 50MB.");
    $(this).val('');
  }else{
  console.log('change')
  if (!reply) {
    document.getElementById('span-text-reply').classList.add("chosen");
  } else {
    document.getElementById('span-text-reply').classList.remove("chosen");
  }
  }

});

$('#message-image-upload').on('change', function() {

  if(this.files[0].size > 524288) {
    alert("Please upload file less than 50MB.");
    $(this).val('');
  }else{
    var fileName = $('#message-image-upload').val().split('\\').pop();
    var _size = this.files[0].size;
    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
    i=0;while(_size>900){_size/=1024;i++;}
    var exactSize = (Math.round(_size*100)/100)+' '+fSExt[i];
    console.log('FILE SIZE = ',exactSize);
    $("#message-image-upload").click();
    if(this.files.length > 1) {
    $('#message-span-text').text("Multiple files selected");
    } else{
    $('#message-span-text').text(fileName + " - " + exactSize);
    }
  }
});   
