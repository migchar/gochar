<?php get_header(); ?>

    <div class="sidebar s2 group">
        <?php if (get_theme_mod('header-social', 'on') == 'on'): ?>
            <?php gridzone_social_links(); ?>
        <?php endif; ?>
    </div>
    <!-- sidebar s2 group -->

<div class="content">
	
	<?php get_template_part('inc/page-title'); ?>
	
	<?php if ( have_posts() ) : ?>
		
		<div class="masonry" id="masonry">
		<?php while ( have_posts() ): the_post(); ?>
			<?php get_template_part('content'); ?>
		<?php endwhile; ?>
		</div>
		
		<?php get_template_part('inc/pagination'); ?>
		
	<?php endif; ?>
		
</div><!--/.content-->

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>