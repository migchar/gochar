</div><!--/.main-inner-->
</div><!--/.main-->
</div><!--/.container-inner-->
</div><!--/.container-->

<div class="clear"></div>

<footer id="footer">

    <?php if (get_theme_mod('footer-ads', 'off') == 'on'): ?>
        <div id="footer-ads">
            <?php dynamic_sidebar('footer-ads'); ?>
        </div><!--/#footer-ads-->
    <?php endif; ?>

    <?php // footer widgets
    $total = 4;
    if (get_theme_mod('footer-widgets', '0') != '') {

        $total = get_theme_mod('footer-widgets');
        if ($total == 1) $class = 'one-full';
        if ($total == 2) $class = 'one-half';
        if ($total == 3) $class = 'one-third';
        if ($total == 4) $class = 'one-fourth';
    }

    if ((is_active_sidebar('footer-1') ||
            is_active_sidebar('footer-2') ||
            is_active_sidebar('footer-3') ||
            is_active_sidebar('footer-4')) && $total > 0) { ?>
        <div id="footer-widgets">

            <div class="pad group">
                <?php $i = 0;
                while ($i < $total) {
                    $i++; ?>
                    <?php if (is_active_sidebar('footer-' . $i)) { ?>

                        <div class="footer-widget-<?php echo esc_attr($i); ?> grid <?php echo esc_attr($class); ?> <?php if ($i == $total) {
                            echo 'last';
                        } ?>">
                            <?php dynamic_sidebar('footer-' . $i); ?>
                        </div>

                    <?php } ?>
                <?php } ?>
            </div><!--/.pad-->

        </div><!--/#footer-widgets-->
    <?php } ?>

    <div id="footer-bottom">

        <!--        <a id="back-to-top" href="#"><i class="fas fa-angle-up"></i></a>-->

        <div class="pad group">

            <div class="grid one-full">

                <?php if (get_theme_mod('footer-logo')): ?>
                    <img id="footer-logo" src="<?php echo esc_url(get_theme_mod('footer-logo')); ?>"
                         alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                <?php endif; ?>

                <?php if (get_theme_mod('footer-social', 'on') == 'on'): ?>
                    <?php gridzone_social_links(); ?>
                <?php endif; ?>

                <div id="copyright">
                    <?php if (get_theme_mod('copyright')): ?>
                        <p><?php echo esc_html(get_theme_mod('copyright')); ?></p>
                    <?php else: ?>
                        <p><?php bloginfo(); ?> &copy; <?php echo esc_html(date_i18n(esc_html__('Y', 'gridzone'))); ?>
                            . <?php esc_html_e('All Rights Reserved.', 'gridzone'); ?></p>
                    <?php endif; ?>
                </div><!--/#copyright-->

                <?php if (get_theme_mod('credit', 'on') == 'on'): ?>
                    <div id="credit">
                        <p><?php esc_html_e('Powered by', 'gridzone'); ?>
                            <a href="http://wordpress.org" rel="nofollow"
                               target="_blank">WordPress</a>. <?php esc_html_e('Theme by', 'gridzone'); ?>
                            <a href="https://www.migchar.com" rel="nofollow" target="_blank">migchar</a>.
                            <span style="cursor:pointer;" data-toggle="tooltip" data-placement="right" data-html="true"
                                  title='SQL查询：<?php echo get_num_queries() ?>次<br/>
                                内存占用：<?php echo intval(memory_get_peak_usage() / 1024 / 1024) ?>MB<br/>
                                脚本执行：<?php echo timer_stop(0, 3) ?> 秒'>
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-dashboard"></use>
                        </svg>
                        </span></p>
                    </div><!--/#credit-->
                <?php endif; ?>


            </div>

        </div><!--/.pad-->

    </div><!--/#footer-bottom-->


    <div class="rabbit-box">
        <div class="rabbit">
            <svg viewBox="0 0 24 24" size="24" class="rabbit-view">
                <path d="M16 17.5C15.4476 17.5 15 17.052 15 16.5C15 15.9476 15.4476 15.5 16 15.5C16.552 15.5 17 15.9476 17 16.5C17 17.052 16.552 17.5 16 17.5ZM14.4998 6.52728C14.4998 5.31581 14.6564 3.87247 15.3998 3.87247C15.9296 3.87247 16.4998 4.70301 16.4998 6.52728C16.4998 8.35964 15.979 10.3386 15.6649 11.3675C15.2975 11.1603 14.9081 10.9821 14.4998 10.8367V6.52728ZM9.4998 10.8367C9.09187 10.9821 8.70295 11.1603 8.33549 11.3675C8.02104 10.339 7.5002 8.36085 7.5002 6.52728C7.5002 4.70301 8.07042 3.87247 8.60016 3.87247C9.34359 3.87247 9.4998 5.31581 9.4998 6.52728V10.8367ZM8 17.5C7.44759 17.5 7 17.052 7 16.5C7 15.9476 7.44759 15.5 8 15.5C8.552 15.5 9 15.9476 9 16.5C9 17.052 8.552 17.5 8 17.5ZM18 6.52729C18 3.60465 16.7248 2.375 15.3998 2.375C14.0737 2.375 13 3.34006 13 6.52729V10.4732C12.6722 10.4287 12.3403 10.398 12 10.398C11.6597 10.398 11.3278 10.4287 11 10.4732V6.52729C11 3.34006 9.92635 2.375 8.60016 2.375C7.27519 2.375 6 3.60465 6 6.52729C6 8.89287 6.76002 11.4055 7.05018 12.2764C5.78308 13.4075 5 14.9211 5 16.4533C5 20.5018 8.13395 21.5 12 21.5C15.866 21.5 19 20.5018 19 16.4533C19 14.9211 18.2169 13.4075 16.9502 12.2764C17.2396 11.4051 18 8.89287 18 6.52729Z"
                      transform=""></path>
            </svg>
        </div>
    </div>


</footer><!--/#footer-->

</div><!--/#wrapper-->

<div class="d-flex justify-content-center align-items-center flex-column animated fixed-to-top click-to-top bounceInRight">
    <svg class="icon" aria-hidden="true"><use xlink:href="#icon-angle-double-up"></use></svg>
<!--    <i class="fas fa-angle-double-up"></i>-->
    <span class="animated progress-number" style="display: block;"></span>
</div>


<?php wp_footer(); ?>
</body>
</html>
