<?php $cat_id = get_the_category()[0]->cat_ID;
$cat_name = get_cat_name($cat_id);
$cat_url = get_category_link($cat_id)
?>

<?php get_header(); ?>

<div class="content single-content">

    <?php while (have_posts()): the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="post-wrapper group">

                <nav class="d-none d-md-block pl-0 post-content-main-breadcrumb" aria-label="breadcrumb">
                    <ol class="px-md-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url() ?>"><?php bloginfo('name') ?></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo $cat_url ?>">     <?php echo $cat_name ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                    </ol>
                </nav>

                <div class="entry-content">
                    <div class="entry themeform">
                        <?php the_content(); ?>
                        <?php wp_link_pages(array('before' => '<div class="post-pages">' . esc_html__('Pages:', 'gridzone'), 'after' => '</div>')); ?>
                        <div class="clear"></div>
                    </div><!--/.entry-->
                </div>
                <div class="entry-footer group">

                    <?php the_tags('<p class="post-tags"><span>' . esc_html__('Tags:', 'gridzone') . '</span> ', '', '</p>'); ?>

                    <div class="clear"></div>

                    <?php if ((get_theme_mod('author-bio', 'on') == 'on') && get_the_author_meta('description')): ?>
                        <div class="author-bio">

                            <?php if (get_theme_mod('profile-image')): ?>
                                <div class="bio-avatar"><img src="<?php echo get_theme_mod('profile-image'); ?>"
                                                             alt=""/>
                                </div>
                            <?php endif; ?>

                            <p class="bio-name"><?php the_author_meta('display_name'); ?></p>
                            <p class="bio-desc"><?php the_author_meta('description'); ?></p>
                            <div class="clear"></div>
                        </div>
                    <?php endif; ?>

                    <?php do_action('alx_ext_sharrre'); ?>

                    <?php if (get_theme_mod('post-nav', 'content') == 'content') {
                        get_template_part('inc/post-nav');
                    } ?>

                    <?php if (comments_open() || get_comments_number()) : comments_template('/comments.php', true); endif; ?>

                </div>
            </div>

        </article><!--/.post-->

        <?php if (get_theme_mod('related-posts', 'categories') != 'disable') {
            get_template_part('inc/related-posts');
        } ?>
    <?php endwhile; ?>

</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>