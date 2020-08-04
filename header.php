<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php if (is_single()): ?> onhashchange="fix_the_nav();" <?php endif; ?> >

<?php if (function_exists('wp_body_open')) {
    wp_body_open();
} ?>

<svg class="hidden">
    <defs>
        <symbol id="icon-arrow" viewBox="0 0 24 24">
            <title>arrow</title>
            <polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
        </symbol>
        <symbol id="icon-drop" viewBox="0 0 24 24">
            <title>drop</title>
            <path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/>
            <path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
        </symbol>
        <symbol id="icon-search" viewBox="0 0 24 24">
            <title>search</title>
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
        </symbol>
        <symbol id="icon-cross" viewBox="0 0 24 24">
            <title>cross</title>
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
        </symbol>
    </defs>
</svg>

<a class="skip-link screen-reader-text" href="#page"><?php _e('Skip to content', 'gridzone'); ?></a>

<?php get_search_form(); ?>
<div id="wrapper" class="main-wrap">

    <header <?php if (is_home()): ?>style="height: 100vh;"
            <?php else: ?>style="height: 60vh;"<?php endif; ?> >
        <nav id="navbar"
             class="navbar fixed-top navbar-expand-lg scrolling-navbar navbar-custom navbar-dark top-nav-collapse">
            <div class="container">
                <?php echo gridzone_site_title(); ?>
                <?php if (has_nav_menu('header')): ?>
                    <?php \AlxMedia\Nav::nav_menu(array('theme_location' => 'header', 'menu_id' => 'nav-header', 'fallback_cb' => false)); ?>
                <?php endif; ?>
                <!--移动端菜单-->
                <?php if (has_nav_menu('mobile')): ?>
                    <?php \AlxMedia\Nav::nav_menu(array('theme_location' => 'mobile', 'menu_id' => 'nav-mobile', 'fallback_cb' => false)); ?>
                <?php endif; ?>

            </div>
        </nav>


        <div class="banner intro-2" id="background" parallax="true"
             style="background: url(&quot;https://rmt.dogedoge.com/fetch/fluid/storage/bg/vdysjx.png?w=1920&amp;fmt=webp&quot;) center center / cover no-repeat; transform: translate3d(0px, 0px, 0px);">
            <div class="full-bg-img">
                <div class="mask flex-center" style="background-color: rgba(0, 0, 0, 0.3)">
                    <div class="container text-center white-text fade-in-up">

                        <span class="h3" id="subtitle">
                            <?php if (display_header_text() == true && is_home()): ?>
                                <?php bloginfo('description'); ?>
                            <?php elseif (is_search()): ?><?php echo esc_html__('Search', 'gridzone') ?>
                            <?php elseif ( is_archive() ) : ?>
                                <div class="text-center main-hero-content-title"><?php echo single_cat_title('', false); ?></div>
                                <div class="text-center main-hero-content-description"><?php echo the_archive_description(); ?></div>
                            <?php else: ?><?php the_title(); ?>

                            <?php endif; ?>
                        </span>

                        <span class="typed-cursor h2 typed-cursor--blink">_</span>

                        <?php if (is_single()): ?>
                            <div class="mt-3 entry-meta">
                                <span class="entry-author">
                                    <svg class="icon" aria-hidden="true"><use xlink:href="#icon-user"></use></svg>
                                   <?php the_author(); ?>
                                </span>
                                <time class="entry-date">
                                    <svg class="icon" aria-hidden="true">
                                        <use xlink:href="#icon-date"></use>
                                    </svg>
                                    <?php the_time(get_option('date_format')); ?>
                                </time>
                            </div><!-- entry-meta-->
                        <?php endif; ?>

                    </div>


                    <?php if (is_home()): ?>
                        <div class="scroll-down-bar">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-duble-arrow-down"></use>
                            </svg>
                            <!--                            <i class="icon icon-duble-arrow-down"></i>-->
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </header>


    <div <?php if (is_home() || is_archive() || is_search()|| is_single()): ?>class="container-fluid"
         <?php else: ?>class="container-xl"<?php endif; ?> >
        <div class="container-inner">
            <div class="main pt-2" id="board">
                <div class="main-inner group">