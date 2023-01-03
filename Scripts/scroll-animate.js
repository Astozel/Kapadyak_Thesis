$(document).ready(function(){
    // $('#chatboxcontent').animate({
    //   scrollTop: $('#chatboxcontent')[0].scrollHeight - $('#chatboxcontent')[0].clientHeight
    // }, 1000);
   
    $('#chatboxcontent').scrollTop($('#chatboxcontent')[0].scrollHeight);
    $('#type-msg').focus();
  });

