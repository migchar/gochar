<?php $related_cat = gridzone_related_posts_by_category();
$related_tag = gridzone_related_posts();
$cat_id = get_the_category()[0]->cat_ID;
$cat_name = get_cat_name($cat_id);
$cat_url = get_category_link($cat_id)
?>
<?php if ($related_cat->have_posts() or $related_tag->have_posts()): ?>

    <!--related posts-->
    <aside class="post-read-more">

        <div class="row read-next-feed">


            <div class="col-md-6 px-0 px-sm-2 px-xl-3 d-flex min-h-300 post-read-more-item">
                <article class="read-next-card"
                         style="background-image: url(https://pic.migchar.com/bg/bg-math.jpg)">
                    <header class="read-next-card-header">
                        <small class="read-next-card-header-sitetitle">— <?php bloginfo('name') ?> —</small>
                        <h3 class="read-next-card-header-title">
                            <a href="<?php echo $cat_url ?>"><?php echo $cat_name ?></a>
                        </h3>
                    </header>
                    <div class="read-next-divider">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M13 14.5s2 3 5 3 5.5-2.463 5.5-5.5S21 6.5 18 6.5c-5 0-7 11-12 11C2.962 17.5.5 15.037.5 12S3 6.5 6 6.5s4.5 3.5 4.5 3.5"></path>
                        </svg>
                    </div>
                    <div class="read-next-card-content">
                        <ul>
                            <?php while ($related_cat->have_posts()) : $related_cat->the_post(); ?>
                                <li><a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>"
                                       rel="bookmark"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <footer class="read-next-card-footer">
                        <a href="<?php echo $cat_url ?>">查看更多文章 →</a>
                    </footer>

                </article>
            </div>

            <?php while ($related_tag->have_posts()) : $related_tag->the_post(); ?>

                <div class="col-md-6 px-0 px-sm-2 px-xl-3 d-flex min-h-300 post-read-more-item">
                    <article id="post-<?php the_ID(); ?>" class="post-read-next">
                        <a class="post-read-image-link post-read-next-image-link" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('gridzone-large-h'); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/thumb-medium.png"
                                     alt="<?php the_title_attribute(); ?>"/>
                            <?php endif; ?>
                        </a>
                        <div class="post-read-next-content">
                            <a class="post-read-next-content-link" href="<?php the_permalink(); ?>">
                                <header class="post-read-next-header">
                                    <span class="post-read-next-tags"></span>
                                    <h2 class="post-read-next-title"><?php the_title(); ?></h2>
                                </header>
                                <section class="post-read-next-excerpt">
                                    <?php the_excerpt(); ?>

                                </section>
                            </a>
                            <footer class="post-read-next-meta">

                                <p class="post-tags">
                                    <?php the_tags('', '', ''); ?>
                                </p>
                                <span class="reading-time"></span>
                            </footer>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </aside>
    <!--/ .related posts-->
<?php endif; ?>
<?php wp_reset_postdata(); ?>
