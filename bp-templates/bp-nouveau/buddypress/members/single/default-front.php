<?php
/**
 * BP Nouveau Default user's front template.
 *
 * @since 1.0.0
 *
 * @package BP Nouveau
 */
?>

<div class="member-front-page">

	<?php if ( ! is_customize_preview() && bp_current_user_can( 'bp_moderate' ) ) : ?>

		<div class="bp-feedback info">
			<strong><?php esc_html_e( 'Manage the members default front page', 'bp-nouveau' ) ;?></strong> <a href="#" title="close" data-bp-close="remove"><span class="dashicons dashicons-dismiss"></span></a><br/>
			<?php printf(
				esc_html__( 'You can set the preferences of the %s or add %s to it.', 'bp-nouveau' ),
				bp_nouveau_members_get_customizer_option_link(),
				bp_nouveau_members_get_customizer_widgets_link()
			); ?>
		</div>

	<?php endif; ?>

	<?php if ( bp_nouveau_members_wp_bio_info() ) : ?>

		<div class="member-description">

			<?php if ( get_the_author_meta( 'description', bp_displayed_user_id() ) ) : ?>
				<blockquote class="member-bio">
					<?php bp_nouveau_member_description( bp_displayed_user_id() ); ?>
				</blockquote><!-- .member-bio -->
			<?php endif ; ?>

			<?php if ( bp_is_my_profile() || bp_current_user_can( 'bp_moderate' ) ) :

				bp_nouveau_member_description_edit_link();

			endif ; ?>

		</div><!-- .member-description -->

	<?php endif ; ?>

	<?php if ( is_active_sidebar( 'sidebar-buddypress-members' )  ) : ?>

		<div id="member-front-widgets" class="bp-sidebar bp-widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-buddypress-members' ); ?>
		</div><!-- .bp-sidebar.bp-widget-area -->

	<?php endif ; ?>

</div>
