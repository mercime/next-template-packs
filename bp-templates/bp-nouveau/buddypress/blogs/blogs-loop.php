<?php
/**
 * BuddyPress - Blogs Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter().
 *
 * @package BuddyPress
 * @subpackage bp-nouveau
 */

/**
 * Fires before the start of the blogs loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_blogs_loop' ); ?>

<?php if ( bp_has_blogs( bp_ajax_querystring( 'blogs' ) ) ) : ?>

	<?php bp_pagination( 'top' ); ?>

	<?php

	/**
	 * Fires before the blogs directory list.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_directory_blogs_list' ); ?>

	<ul id="blogs-list" class="item-list">

	<?php while ( bp_blogs() ) : bp_the_blog(); ?>

		<li <?php bp_blog_class() ?>>
			<div class="item-avatar">
				<a href="<?php bp_blog_permalink(); ?>"><?php bp_blog_avatar( 'type=thumb' ); ?></a>
			</div>

			<div class="item">
				<div class="item-title"><a href="<?php bp_blog_permalink(); ?>"><?php bp_blog_name(); ?></a></div>
				<div class="item-meta"><span class="activity"><?php bp_blog_last_active(); ?></span></div>

				<?php

				/**
				 * Fires after the listing of a blog item in the blogs loop.
				 *
				 * @since 1.2.0
				 */
				do_action( 'bp_directory_blogs_item' ); ?>
			</div>

			<div class="action">

				<?php

				/**
				 * Fires inside the blogs action listing area.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_directory_blogs_actions' ); ?>

				<div class="meta">

					<?php bp_blog_latest_post(); ?>

				</div>

			</div>

			<div class="clear"></div>
		</li>

	<?php endwhile; ?>

	</ul>

	<?php

	/**
	 * Fires after the blogs directory list.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_directory_blogs_list' ); ?>

	<?php bp_blog_hidden_fields(); ?>

	<?php bp_pagination( 'bottom' ); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'Sorry, there were no sites found.', 'bp-nouveau' ); ?></p>
	</div>

<?php endif; ?>

<?php

/**
 * Fires after the display of the blogs loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_blogs_loop' ); ?>
