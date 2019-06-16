		</div>
	</div>
	<!-- CORE : end -->

	<?php // Add custom code before Footer
	do_action( 'lsvr_lore_footer_before' ); ?>

	<!-- FOOTER : begin -->
	<footer id="footer" <?php lsvr_lore_the_footer_class(); ?>>
		<div class="footer__inner">

			<?php // Add custom code at the top of the Footer
			do_action( 'lsvr_lore_footer_top' ); ?>

			<?php if ( has_nav_menu( 'lsvr-lore-footer-menu' ) || true === lsvr_lore_has_footer_social_links() ) : ?>

				<div class="footer-top">
					<div class="lsvr-container">
						<div class="footer-top__inner">

							<?php // Footer menu
							get_template_part( 'template-parts/footer-menu' ); ?>

							<?php // Footer social links
							get_template_part( 'template-parts/footer-social-links' ); ?>

						</div>
					</div>
				</div>

			<?php endif; ?>

			<?php // Add custom code before footer widgets
			do_action( 'lsvr_lore_footer_widgets_before' ); ?>

			<?php // Footer widgets
			get_sidebar( 'footer-widgets' ); // Load sidebar-footer-widgets.php template ?>

			<?php // Add custom code after footer widgets
			do_action( 'lsvr_lore_footer_widgets_after' ); ?>

			<?php // Footer bottom
			get_template_part( 'template-parts/footer-bottom' ); ?>

			<?php // Add custom code at the bottom of the Footer
			do_action( 'lsvr_lore_footer_bottom' ); ?>

		</div>
	</footer>
	<!-- FOOTER : end -->

	<?php // Add custom code after Footer
	do_action( 'lsvr_lore_footer_after' ); ?>

</div>
<!-- WRAPPER : end -->

<?php wp_footer(); ?>

</body>
</html>