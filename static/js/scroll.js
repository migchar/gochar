if (!isMobile()) {
    // 创建 Headroom 对象并传入要控制的页面元素
    var headroom = new Headroom($('.site-nav')[0], {
        "tolerance": 5,
        "offset": 205,
        "classes": {
            // // 初始化后所设置的 css class
            // "initial": "head-animated",
            // // 向上滚动时设置的 css class
            // "pinned": "slideDown",
            // // 向下滚动时所设置的 css class
            // "unpinned": "slideUp"
            "initial": "animated",
            "pinned": "swingInX",
            "unpinned": "swingOutX"
        }
    });
    // 初始化
    // headroom.init();

    // 利用 data-scroll 属性，滚动到任意 dom 元素
    $.scrollto = function (scrolldom, scrolltime) {
        $(scrolldom).click(function () {
            $(this).addClass("active").siblings().removeClass("active");
            $('html, body').animate({
                scrollTop: $('body').offset().top
            }, scrolltime);
            return false;
        });
    };
    // back-to-top 按钮出现的时机
    var backTo = $(".back-to-top");
    var backHeight = $(window).height() - 1080 + 'px';
    $(window).scroll(function () {
        if ($(window).scrollTop() > window.innerHeight
            && backTo.css('top') === '-900px') {
            // 隐藏 back-to-top 按钮
            backTo.css('top', backHeight);
        } else if ($(window).scrollTop() <= window.innerHeight
            && backTo.css('top') !== '-900px') {
            // 显示 back-to-top 按钮
            backTo.css('top', '-900px');
        }
    });

    // 启用 back-to-top
    $.scrollto(".back-to-top", 800);
}
