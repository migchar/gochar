<?php
/* ------------------------------------------------------------------------- *
 *  Dynamic styles
/* ------------------------------------------------------------------------- */

/*  Convert hexadecimal to rgb
/* ------------------------------------ */
if (!function_exists('gridzone_hex2rgb')) {

    function gridzone_hex2rgb($hex, $array = false)
    {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }

        $rgb = array($r, $g, $b);
        if (!$array) {
            $rgb = implode(",", $rgb);
        }
        return $rgb;
    }

}


/*  Dynamic css output
/* ------------------------------------ */
if (!function_exists('gridzone_dynamic_css')) {

    function gridzone_dynamic_css()
    {
        if (get_theme_mod('dynamic-styles', 'on') == 'on') {

            // rgb values
            $color_1 = get_theme_mod('color-1');
            $color_1_rgb = gridzone_hex2rgb($color_1);

            // start output
            $styles = '';


            // content max-width
            if (get_theme_mod('content-width', '740') != '740') {
                $styles .= '
.entry-header,
.entry-content,
.entry-footer,
.pagination,
.page-title,
.page-title-inner,
.front-widgets { max-width: ' . esc_attr(get_theme_mod('content-width')) . 'px; }
				' . "\n";
            }
            // single box max-width
            if (get_theme_mod('single-box-width', '940') != '940') {
                $styles .= '
.single .post-wrapper { max-width: ' . esc_attr(get_theme_mod('single-box-width')) . 'px; }
				' . "\n";
            }
            // single content max-width
            if (get_theme_mod('single-content-width', '740') != '740') {
                $styles .= '
.single .entry-header,
.single .entry-footer,
.single .entry > *:not(.alignfull) { max-width: ' . esc_attr(get_theme_mod('single-content-width')) . 'px; }
				' . "\n";
            }
            // page box max-width
            if (get_theme_mod('page-box-width', '940') != '940') {
                $styles .= '
.page .post-wrapper { max-width: ' . esc_attr(get_theme_mod('page-box-width')) . 'px; }
				' . "\n";
            }
            // page content max-width
            if (get_theme_mod('page-content-width', '740') != '740') {
                $styles .= '
.page .entry-header,
.page .entry-footer,
.page .entry > *:not(.alignfull) { max-width: ' . esc_attr(get_theme_mod('page-content-width')) . 'px; }
				' . "\n";
            }
            // header color
            if (get_theme_mod('color-header', '#ffffff') != '#ffffff') {
                $styles .= '
#header { background: ' . esc_attr(get_theme_mod('color-header')) . '; border-bottom: 0; }
#wrapper { border-top-color: ' . esc_attr(get_theme_mod('color-header')) . ';  }
.navbar { background: transparent;  }
.top-nav-collapse { background-color: ' . esc_attr(get_theme_mod('color-header')) . ';  }
.site-title a { color: #fff; }
.site-description { color: rgba(255,255,255,0.6); }
@media only screen and (max-width: 719px) {
	.site-title { border-bottom-color: rgba(255,255,255,0.15)!important; }
}
.nav-menu:not(.mobile) a { color: rgba(255,255,255,0.7); }
.nav-menu:not(.mobile) a:hover { color: #fff; }
.nav-menu:not(.mobile) li.current_page_item > span > a, 
.nav-menu:not(.mobile) li.current-menu-item > span > a, 
.nav-menu:not(.mobile) li.current-menu-ancestor > span > a, 
.nav-menu:not(.mobile) li.current-post-parent > span > a { color: #fff; }
.nav-menu:not(.mobile) button .svg-icon { fill: rgba(255,255,255,0.7); }
.toggle-search .svg-icon { fill: #fff; }
.menu-toggle-icon span { background: #fff; }
.nav-menu.mobile ul li a { color: #fff; }
.nav-menu .svg-icon { fill: #fff; }
.nav-menu:not(.mobile) button.active { background: rgba(0,0,0,0.1); }
.nav-menu.mobile button.active .svg-icon { fill: #fff; }
.nav-menu.mobile ul ul { background: rgba(0,0,0,0.05); }
.nav-menu.mobile ul li .menu-item-wrapper,
.nav-menu.mobile ul ul li .menu-item-wrapper { border-bottom-color: rgba(255,255,255,0.15); }
.nav-menu.mobile > div > ul > li:first-child .menu-item-wrapper { border-top-color: rgba(255,255,255,0.15); }
.nav-menu.mobile ul button,
.nav-menu.mobile ul ul button { border-left-color: rgba(255,255,255,0.15); }
				' . "\n";
            }
            // social sidebar color
            if (get_theme_mod('color-social-sidebar', '#ffffff') != '#ffffff') {
                $styles .= '
@media only screen and (min-width: 720px) {
	.s2,
	.toggle-search,
	.toggle-search.active,
	.search-expand { background: ' . esc_attr(get_theme_mod('color-social-sidebar')) . '; }
	.search-expand { border: 1px solid rgba(255,255,255,0.2); border-left: 0; left: 69px; padding-top: 12px; padding-bottom: 12px; }
	.s2 .social-links .social-tooltip { color: rgba(255,255,255,0.75); }
	.s2 .social-links .social-tooltip:hover { color: #fff; }
	.toggle-search { border-color: rgba(255,255,255,0.2); color: #fff; }
	.toggle-search:hover, 
	.toggle-search.active { color: rgba(255,255,255,0.75); }
	.s2 .social-links li:before { background: rgba(255,255,255,0.15); }
	.toggle-search .svg-icon { fill: #fff; }
}
				' . "\n";
            }
            // post item color
            if (get_theme_mod('color-post-item', '#ffffff') != '#ffffff') {
                $styles .= '
.masonry-item .masonry-inner { background: ' . esc_attr(get_theme_mod('color-post-item')) . '; }
.masonry-item .entry-title a { color: rgba(255,255,255,1); }
.masonry-item .entry-meta,
.masonry-item .entry-meta li a { color: rgba(255,255,255,0.6); }
				' . "\n";
            }
            // link color
            if (get_theme_mod('color-link', '#000000') != '#000000') {
                $styles .= '
.entry a { color: ' . esc_attr(get_theme_mod('color-link')) . '; }
				' . "\n";
            }
            // background color
            if (get_theme_mod('color-background', '#f1f1f1') != '#f1f1f1') {
                $styles .= '
body { background: ' . esc_attr(get_theme_mod('color-background')) . '; }
				' . "\n";
            }
            // border radius
            if (get_theme_mod('border-radius', '10') != '10') {
                $styles .= '
.toggle-search,
#profile-image img,
.masonry-item .masonry-inner,
.masonry-item .entry-category a,
.pagination ul li a,
.post-wrapper,
.author-bio,
.sharrre-container,
.post-nav,
.comment-tabs li a,
#commentform,
.alx-tab img,
.alx-posts img,
.infinite-scroll #infinite-handle span { border-radius: ' . esc_attr(get_theme_mod('border-radius')) . 'px; }
.masonry-item img { border-radius: ' . esc_attr(get_theme_mod('border-radius')) . 'px ' . esc_attr(get_theme_mod('border-radius')) . 'px 0 0; }
.toggle-search.active,
.col-2cl .sidebar .widget { border-radius:  ' . esc_attr(get_theme_mod('border-radius')) . 'px 0 0 ' . esc_attr(get_theme_mod('border-radius')) . 'px; }
.search-expand,
.col-2cr .sidebar .widget { border-radius:  0 ' . esc_attr(get_theme_mod('border-radius')) . 'px ' . esc_attr(get_theme_mod('border-radius')) . 'px 0; }
#footer-bottom #back-to-top { border-radius: 0 0 ' . esc_attr(get_theme_mod('border-radius')) . 'px ' . esc_attr(get_theme_mod('border-radius')) . 'px; }
				' . "\n";
            }
            // header logo max-height
            if (get_theme_mod('logo-max-height', '60') != '60') {
                $styles .= '.site-title a img { max-height: ' . esc_attr(get_theme_mod('logo-max-height')) . 'px; }' . "\n";
            }
            // header text color
            if (get_theme_mod('header_textcolor') != '') {
                $styles .= '.site-title a, .site-description { color: #' . esc_attr(get_theme_mod('header_textcolor')) . '; }' . "\n";
            }
            if (get_theme_mod('dark', 'off') == 'on') {
                wp_add_inline_style('gridzone-dark', $styles);
            } else {
                wp_add_inline_style('gridzone-style', $styles);
            }
        }
    }

}
add_action('wp_enqueue_scripts', 'gridzone_dynamic_css');
