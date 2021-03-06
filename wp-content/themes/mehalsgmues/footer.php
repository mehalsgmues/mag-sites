<?php
/**
 * The footer for our theme.
 * This template is used to generate the footer for the theme.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<?php if ( ! is_single() ) { ?>

<!-- END .twelve columns -->
</div>

<?php } ?>

<!-- END #panel .container -->
</main>

<!-- BEGIN .footer -->
<div class="footer">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .footer-information -->
		<div class="footer-information">

			<div
			<?php
			if ( has_nav_menu( 'footer-menu' ) ) {
				?>
				class="address"
				<?php
			} else {
				?>
				class="address"
				<?php
			}
				?>>

				meh als gmües - Reckenholzstrasse 150, 8046 Zürich

			</div>
			
			<div class="social">
				<?php if ( function_exists('cn_social_icon') ) echo cn_social_icon(); ?>
			</div>

			<?php if ( has_nav_menu( 'footer-menu' ) ) { ?>

			<div class="menu">

				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'footer-menu',
						'title_li'        => '',
						'depth'           => 1,
						'container_class' => 'footer-menu',
					)
				);
				?>

			</div>

			<?php } ?>

		<!-- END .footer-information -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .footer -->
</div>

<!-- END #wrapper -->
</div>

<?php wp_footer(); ?>

</body>
</html>
