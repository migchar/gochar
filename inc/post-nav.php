<?php if ( is_single() ): ?>
	<ul class="post-nav group">
		<li class="next"><?php next_post_link('%link', '<svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg><strong>'.esc_html__('Next', 'gridzone').'</strong> <span>%title</span>'); ?></li>
		<li class="previous"><?php previous_post_link('%link', '<svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-left"></use></svg><strong>'.esc_html__('Previous', 'gridzone').'</strong> <span>%title</span>'); ?></li>
	</ul>
<?php endif; ?>