/*************************************************
 *  米格论文 migchar.com
 *  migchar@foxmail.com
 *  Core JS functions and initialization.
 **************************************************/
/*
 * Application js
 */

var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');

function isNumber(value) {
    var patrn = /^(-)?\d+(\.\d+)?$/;
    if (patrn.exec(value) == null || value == "") {
        return false
    } else {
        return true
    }
}

App = {
    // ~~~ 鼠标事件
    mouseEvent: function () {
        // 显示隐藏访客资料编辑框
        $('#respond .edit-profile').on('click', function () {
            var author_info = $('#respond .author-info'),
                mark = $('.visitor .mark'),
                aria_label = $('.visitor .edit-profile'),
                time = new Date(),
                time = time.toLocaleTimeString();
            if (author_info.hasClass('edit-off')) {
                author_info.removeClass('edit-off').addClass('edit-on');
                mark.hide();
                aria_label.attr('aria-label', time);
            }
            else {
                author_info.removeClass('edit-on').addClass('edit-off');
                mark.show();
                aria_label.attr('aria-label', '修改名片');
            }
        });
        // 滚动
        $('#directory-content a[href*="#"]:not([href="#"])').click(function () {
            if (window.location.hash) {
                var target = $(location.hash);
                $(".entry-content ").scrollTop(target.offset().top - 80); // my nav size is 100px
            }
            if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
                var target = $(this.hash);
                console.log(target);
                target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
                if (target.length) {
                    $("html, body").animate({
                            scrollTop: target.offset().top - 80
                        },
                        500
                    );
                    return false;
                }
            }
        });


    },

    // ~~~ 文章列表分页
    postsPaging: function () {
        $('body').on('click', '.posts-paging a', function () {
            console.log(".posts-paging a click()")
            $(this).hide();
            paging = $('.posts-paging');
            loading_start(paging);
            console.log($(this).attr('href'));
            $.ajax({
                type: 'POST',
                url: $(this).attr('href'),
                success: function (data) {
                    result = $(data).find('#main .post');
                    nextHref = $(data).find('.posts-paging a').attr('href');
                    $('#main #primary').append(result.fadeIn(400));
                    loading_done(paging);
                    if (nextHref != undefined) {
                        $('.posts-paging a').attr('href', nextHref).show();
                    }
                    else {
                        $('.posts-paging').html("<span>Don't have more</span>");
                    }
                    // App.Postmusic();
                    $body.animate({scrollTop: result.offset().top - 58}, 500);
                }
            }); // end ajax

            return false;
        });
    },

    codeLight: function () {
        $('pre code').each(function (i, block) {
            hljs.highlightBlock(block);
        });
    },

    gotop: function () {
        var offset = 400,
            scroll_top_duration = 500,
            $back_to_top = $('.gotop');
        $(window).scroll(function () {
            ($(this).scrollTop() > offset) ? $back_to_top.addClass('show') : $back_to_top.removeClass('show');
        });
        $back_to_top.on('click', function (event) {
            event.preventDefault();
            $('body,html').animate({
                    scrollTop: 0,
                }, scroll_top_duration
            );
        });
    },

    Input: function () {
        POWERMODE.colorful = true; // make power mode colorful
        POWERMODE.shake = false; // turn off shake
        document.body.addEventListener('input', POWERMODE)
    },

    Postindex: function () {
        if ($('#directory-content')[0]) {
            var postDirectory = new Headroom(document.getElementById("directory-content"), {
                tolerance: 0,
                offset: 500,
                classes: {
                    initial: "initial",
                    pinned: "pinned",
                    unpinned: "unpinned"
                }
            });
            postDirectory.init();
        }
    },


}

//////// Executive function /////////
App.gotop();
App.mouseEvent();
App.postsPaging();

$(document).ready(function(){
    //PrismJs代码行数显示
    $("pre[class*='language-'],code[class*='language-']").addClass('line-numbers');
    // 集成fancybox, 为所有img元素添加data-fancybox父元素
    $('.post-content img').each(function () {
        // $(this).attr("data-fancybox", "gallery"); 直接给img添加data-fancybox会导致点击图片后图片消失
        var element = document.createElement("a");
        $(element).attr("data-fancybox", "image");
        $(element).attr("href", $(this).attr("src"));
        $(this).wrap(element);
    });

    $('[data-fancybox]').fancybox({
        arrows:false,
        helpers: {
            overlay: {
                locked: true
            }
        },
        hash: false,
        protect: true,
        // 侧边栏被点击
        clickSlide: 'close',
        // 点击模态框外的背景时 optional: close | false
        clickOutside: false,
        infobar: false,
        touch: {
            vertical: false
        },
        buttons: ["close"],
        animationEffect: "fade",
        transitionEffect: "fade",
        preventCaptionOverlap: false,
        idleTime: false,
        gutter: 0,
    });


});


if ($('.no-asynchronous')[0]) {
    $(document).pjax('a[target!=_top]', '#container', {
        fragment: '#container',
        timeout: 8000,
    }).on('pjax:send', function () {
        NProgress.start();
    }).on('pjax:complete', function () {
        NProgress.done();
        App.mouseEvent();
        App.commentPush();
        App.codeLight();
        App.Postindex();
        App.Postmusic();
        $('#fixedbar.no').FixedBar('fix');

        if ($('#primary').hasClass('content'))
            $body.animate({scrollTop: $('#appbar').offset().top + 1}, 600);

    }).on('submit', '.searchform', function (e) {
        e.preventDefault();
        $.pjax.submit(e, '#container', {
            fragment: '#container',
            timeout: 8000,
        });
        $('.searchform input').val('');
        $body.animate({scrollTop: $('#appbar').offset().top + 1}, 900);
    });

    window.addEventListener('popstate', function (e) {
        App.mouseEvent();
        App.commentPush();
        App.codeLight();
        $('#fixedbar.no').FixedBar('fix');
    }, false);
}

$('body').on('click', '.preview .post', function (e) {
    var tags = 'a,li,span', targetObj = e.srcElement ? e.srcElement : e.target; // 排除某些标签
    if (!$(targetObj).parents().andSelf().is(tags)) {
        set_obj($(this), 'post', function () {
            App.mouseEvent();
            App.commentPush();
            App.codeLight();
            App.Postmusic();
        });
    }
});

$.fn.FixedBar = function (name) {
    var that = $(this);
    if (that[0]) {
        var tooltip = $('.master-info-small .titletip'),
            avatar = $('.master-info .sns-avatar'),
            offsetTop = that.offset().top,
            scrollTop;

        function fix() {
            scrollTop = $(document).scrollTop();
            if (scrollTop > offsetTop) {
                that.addClass(name);
                tooltip.css({'margin-top': '0px'});
                avatar.css({'margin-bottom': '90px'});
            }
            else {
                that.removeClass(name);
                tooltip.css({'margin-top': '55px'});
                avatar.css({'margin-bottom': '0px'});
            }
        }

        fix();
        $(window).scroll(fix);
    }
}
$('#fixedbar.no').FixedBar('fix');


$('#mobilebar .switch').on('click', function () {
    var mobile = $('#overlay.mobile');
    mobile.fadeIn(200);
    var item = $('.mobile .menu-item');
    mobile.click(function (e) {
        if (e.target.id == 'overlay') {
            mobile.fadeOut(200);
        }
    });
    item.click(function () {
        mobile.fadeOut(200);
    });
});

(function ($) {
    $.smoothScroll({
        //滑动到的位置的偏移量
        offset: 0,
        //滑动的方向，可取 'top' 或 'left'
        direction: 'top',
        // 只有当你想重写默认行为的时候才会用到
        scrollTarget: null,
        // 滑动开始前的回调函数。`this` 代表正在被滚动的元素
        beforeScroll: function () {
        },
        //滑动完成后的回调函数。 `this` 代表触发滑动的元素
        afterScroll: function () {
        },
        //缓动效果
        easing: 'swing',
        //滑动的速度
        speed: 700,
        // "自动" 加速的系数
        autoCoefficent: 2
    });


    // Bind the hashchange event listener
    $(window).bind('hashchange', function (event) {
        $.smoothScroll({
            // Replace '#/' with '#' to go to the correct target
            offset: $("body").attr("data-offset") ? -$("body").attr("data-offset") : 0,
            // offset: -30,
            scrollTarget: decodeURI(location.hash.replace(/^\#\/?/, '#'))

        });
    });

    // $(".smooth-scroll").on('click', "a", function() {
    $('a[href*="#"]')
        .bind('click', function (event) {
            // Remove '#' from the hash.
            var hash = this.hash.replace(/^#/, '')
            if (this.pathname === location.pathname && hash) {
                event.preventDefault();
                // Change '#' (removed above) to '#/' so it doesn't jump without the smooth scrolling
                location.hash = '#/' + hash;
            }
        });

    // Trigger hashchange event on page load if there is a hash in the URL.
    if (location.hash) {
        $(window).trigger('hashchange');
    }


    /* ---------------------------------------------------------------------------
   * On window loaded.
   * --------------------------------------------------------------------------- */
    $(window).on('load', function () {
        // On search icon click toggle search dialog.
        $('.js-search').click(function (e) {
            e.preventDefault();
            toggleSearchDialog();
        });
        $(document).on('keydown', function (e) {
            if (e.which == 27) {
                // `Esc` key pressed.
                if ($('body').hasClass('searching')) {
                    toggleSearchDialog();
                }
            } else if (e.which == 191 && e.shiftKey == false && !$('input,textarea').is(':focus')) {
                // `/` key pressed outside of text input.
                e.preventDefault();
                toggleSearchDialog();
            }
        });
    });
})(jQuery);

//~~~ 判断移动端
function isMobile() {
    return window.screen.width < 767 && this.hasMobileUA();
}

function hasMobileUA() {
    var nav = window.navigator;
    var ua = nav.userAgent;
    var pa = /iPad|iPad Pro|iPhone|Android|Opera Mini|BlackBerry|webOS|UCWEB|Blazer|PSP|IEMobile|Symbian/g;
    return pa.test(ua);
}
