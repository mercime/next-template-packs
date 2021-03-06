<?php
/**
 * BuddyPress - Activity Loop
 *
 * @package BuddyPress
 * @subpackage bp-nouveau
 */

bp_nouveau_before_loop(); ?>

<?php if ( bp_has_activities( bp_ajax_querystring( 'activity' ) ) ) : ?>

	<?php while ( bp_activities() ) : bp_the_activity(); ?>

		<?php bp_get_template_part( 'activity/entry' ); ?>

	<?php endwhile; ?>

	<?php if ( bp_activity_has_more_items() ) : ?>

		<li class="load-more">
			<a href="<?php bp_activity_load_more_link() ?>"><?php _e( 'Load More', 'bp-nouveau' ); ?></a>
		</li>

	<?php endif; ?>

<?php else : ?>

	<li id="activity-stream-message" class="bp-messages info">
		<?php bp_nouveau_user_feedback( 'activity-loop-none' ) ;?>
	</li>

<?php endif; ?>

<?php bp_nouveau_after_loop(); ?>
