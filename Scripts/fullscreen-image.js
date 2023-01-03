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
$('.gallery-body').ready(function () {
    $('.gallery-body-imgvid img').click(function () {
        $('.img_view img').show();
        $('.img_view video').hide();
        var currImg = $(this);
        var numImage = $('.gallery-body-content').children().length;
        var total = numImage;
        var src = $(this).attr('src');
        var mediatitle = $(this).attr('post-title');
        var mediadate = $(this).attr('post-date');

        $('.media_full').fadeIn(200);
        $('.img_view img').attr('src', src);
        
        $('.media-title').text(mediatitle);
        $('.media-date').text(mediadate);

        $('.prev').off('click').click(function () {

            if ($(currImg).closest('.gallery-body-imgvid').prev().find('img').length) {
                $(currImg).closest('.gallery-body-imgvid').prev().find('img').trigger('click');
            }else if ($(currImg).closest('.gallery-body-imgvid').prev().find('video').length) {
                $(currImg).closest('.gallery-body-imgvid').prev().find('video').trigger('click');
            }
            else{
                $('.gallery-body-imgvid img:last').trigger('click');
            }

        });

        $('.next').off('click').click(function () {
            var posttitle = $('#getimgvidtitle').val();
            var postdate = $('#getimgviddate').val();
            $('.media-title').text(posttitle);
            $('.media-date').text(postdate);
            if ($(currImg).closest('.gallery-body-imgvid').next().find('img').length) {
                $(currImg).closest('.gallery-body-imgvid').next().find('img').trigger('click');
            }else if ($(currImg).closest('.gallery-body-imgvid').next().find('video').length) {
                $(currImg).closest('.gallery-body-imgvid').next().find('video').trigger('click');
            }
            else{
                $('.gallery-body-imgvid img:first').trigger('click');
            }
        });

    });
    $('.gallery-body-imgvid video').click(function () {
        $('.img_view img').hide();
        $('.img_view video').show();
        
        var currVid = $(this);
        var src = $(this).attr('src');
        var mediatitle = $(currVid).attr('post-title');
        var mediadate = $(currVid).attr('post-date');

        $('.media_full').fadeIn(200);
        $('.img_view video').attr('src', src);
        
        $('.media-title').text(mediatitle);
        $('.media-date').text(mediadate);


        $('.prev').off('click').click(function () {

            var media = $('#gallery-vid').get(0);
            media.pause();
            media.currentTime = 0;
            if ($(currVid).closest('.gallery-body-imgvid').prev().find('img').length) {
                $(currVid).closest('.gallery-body-imgvid').prev().find('img').trigger('click');
            }else if ($(currVid).closest('.gallery-body-imgvid').prev().find('video').length) {
                $(currVid).closest('.gallery-body-imgvid').prev().find('video').trigger('click');
            }
            else{
                $('.gallery-body-imgvid img:last').trigger('click');
            }

        });

        $('.next').off('click').click(function () {
            var media = $('#gallery-vid').get(0);
            media.pause();
            media.currentTime = 0;
            if ($(currVid).closest('.gallery-body-imgvid').next().find('img').length) {
                $(currVid).closest('.gallery-body-imgvid').next().find('img').trigger('click');
            }else if ($(currVid).closest('.gallery-body-imgvid').next().find('video').length) {
                $(currVid).closest('.gallery-body-imgvid').next().find('video').trigger('click');
            }
            else{
                $('.gallery-body-imgvid img:first').trigger('click');
            }
        });

    });
   
    $('.view_close').click(function () {
        $('.media_full').fadeOut(200);
        var media = $('#gallery-vid').get(0);
        media.pause();
        media.currentTime = 0;
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