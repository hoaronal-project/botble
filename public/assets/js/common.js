var Sw_Slide = {
    slideHome: function () {
        if (jQuery('#feature_news_section').length) {
            var swiper = new Swiper('.swiper-container.swiper-home', {
                autoplay: true,
                delay: 2000,
                autoHeight: true,
                loop:true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '">' + (index + 1) + '</span>';
                    },
                },
            });
        }
    }
};

jQuery(document).ready(function () {
    // Swiper
    Sw_Slide.slideHome();
});
window.onload = function () {

};
