$('.media_full').hide();
$('.hidden_media_full').hide();
$('.comment-body').ready(function () {
    $('.comment-body-images-container img').click(function () {
        var currImg = $(this);
        var numImage = $('.comment-body-images').children().length;
        var total = numImage;
        var src = $(this).attr('src');


        $('.media_full').fadeIn(200);
        $('.img_view img').attr('src', src);

        $('.prev').off('click').click(function () {
            if ($(currImg).closest('.comment-body-images-container').prev().find('img').length) {
                $(currImg).closest('.comment-body-images-container').prev().find('img').trigger('click');
            }
            else{
                $('.comment-body-images-container img:last').trigger('click');
            }

        });

        $('.next').off('click').click(function () {
            if ($(currImg).closest('.comment-body-images-container').next().find('img').length) {
                $(currImg).closest('.comment-body-images-container').next().find('img').trigger('click');
            }
            else{
                $('.comment-body-images-container img:first').trigger('click');
            }
        });

    });

    $('.comment-body-excesscounter').click(function () {


        $('.hidden_media_full').fadeIn(200);

    });

    $('.view_close').click(function () {
        $('.media_full').fadeOut(200);
    });
     
    $('.hidden_view_close').click(function () {
        $('.hidden_media_full').fadeOut(200);
    });
});

