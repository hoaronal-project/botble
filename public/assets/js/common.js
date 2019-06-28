var Sw_Slide = {
    slideHome: function () {
        if (jQuery('#feature_news_section').length) {
            var swiper = new Swiper('.swiper-container.swiper-home', {
                autoplay: true,
                delay: 2000,
                autoHeight: true,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '">' + (index + 1) + '</span>';
                    },
                },
            });
        }
    },
    videoSlide: function () {
        if (jQuery('.video-section').length) {
            var swiper = new Swiper('.swiper-container.swiper-video', {
                navigation: {
                    nextEl: '.swiper-video .swiper-button-next',
                    prevEl: '.swiper-video .swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-video .swiper-pagination',
                    dynamicBullets: true,
                    clickable: true,
                },
            });
        }
    }
};
var Facebook = {
    sharePost: function (href, redirect_uri) {
        try {
            window.location.href = 'https://www.facebook.com/dialog/share?' +
                'app_id=2036745356633161' +
                '&display=popup' +
                '&href=' + href +
                '&redirect_uri=' + redirect_uri;
        }
        catch (e) {
            console.log(e, e.message);
        }
    }
};

jQuery(document).ready(function () {
    // Swiper
    Sw_Slide.slideHome();
    Sw_Slide.videoSlide();
});
window.onload = function () {

};
