$('.media_full').hide();
$('.comment_full').hide();
$('.hidden_media_full').hide();
$('.poster_full').hide();
$('.poster_hidden').hide();
$('.viewpost-body').ready(function () {
    $('.viewpost-body-images-container img').click(function () {
        var currImg = $(this);
        var numImage = $('.viewpost-body-images').children().length;
        var total = numImage;
        var src = $(this).attr('src');


        $('.media_full').fadeIn(200);
        $('.img_view img').attr('src', src);

        $('.prev').off('click').click(function () {
            if ($(currImg).closest('.viewpost-body-images-container').prev().find('img').length) {
                $(currImg).closest('.viewpost-body-images-container').prev().find('img').trigger('click');
            }
            else{
                $('.viewpost-body-images-container img:last').trigger('click');
            }

        });

        $('.next').off('click').click(function () {
            if ($(currImg).closest('.viewpost-body-images-container').next().find('img').length) {
                $(currImg).closest('.viewpost-body-images-container').next().find('img').trigger('click');
            }
            else{
                $('.viewpost-body-images-container img:first').trigger('click');
            }
        });

    });

    $('.viewpost-body-excesscounter').click(function () {
        $('.hidden_media_full').fadeIn(200);
    });

    $('.usercomment-body').ready(function () {
        $('.usercomment-body-img img').click(function () {
            $('.comment_full').fadeIn(200);
            var src = $(this).attr('src');
            $('.comment_img_view img').attr('src', src);
        });
    });

    $('.view_close').click(function () {
        $('.media_full').fadeOut(200);
    });
     
    $('.hidden_view_close').click(function () {
        $('.hidden_media_full').fadeOut(200);
    });

    $('.comment_view_close').click(function () {
        $('.comment_full').fadeOut(200);
    });

});

$('.add-post-form-right-imgvid').ready(function () {
    $(this).on("click", ".add-post-form-right-media img", function(){
        $('.poster_full').fadeIn(200);
        var src = $(this).attr('src');
        $('.poster_img_view img').attr('src', src);
    });

});
$(document).on("click", ".add-post-form-excesscounter", function(){
    $('.poster_hidden').fadeIn(200);
});
$('.poster_view_close').click(function () {
    $('.poster_full').fadeOut(200);
});

$('.poster_hidden_view_close').click(function () {
    $('.poster_hidden').fadeOut(200);
});