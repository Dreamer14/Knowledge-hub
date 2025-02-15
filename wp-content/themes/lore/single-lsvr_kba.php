<?php get_header(); ?>

<?php // Main begin
get_template_part( 'template-parts/main-begin' ); ?>

<!-- POST SINGLE : begin -->
<div class="lsvr_kba-post-page post-single lsvr_kba-post-single">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<!-- POST : begin -->
		<article <?php post_class( 'post' ); ?>>
			<div class="post__inner">

				<!-- MAIN HEADER : begin -->
				<header class="main__header">
					<div class="main__header-inner">

						<?php // Breadcrumbs
						get_template_part( 'template-parts/breadcrumbs' ); ?>

						<h1 class="main__header-title">
							<?php the_title(); ?>
						</h1>

					</div>
				</header>
				<!-- MAIN HEADER : end -->

				<?php if ( has_post_thumbnail() ) : ?>

					<!-- POST THUMBNAIL : begin -->
					<p class="post__thumbnail">
						<?php the_post_thumbnail(); ?>
					</p>
					<!-- POST THUMBNAIL : end -->

				<?php endif; ?>

				<!-- POST CONTENT : begin -->
				<div class="post__content">
					<?php the_content(); ?>
				</div>
				<!-- POST CONTENT : end -->

				<?php // Post attachments
				get_template_part( 'template-parts/lsvr_kba/single-attachments' ); ?>

				<?php // Add custom code before post footer
				do_action( 'lsvr_lore_kba_single_footer_before' ); ?>

				<!-- POST FOOTER : begin -->
				<footer class="post__footer">

					<!-- POST DATE : begin -->
					<p class="post__date">

						<span class="post__date-published-wrapper">

							<time class="post__date-published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
								<?php echo get_the_date(); ?>
							</time>

							<?php if ( true === get_theme_mod( 'lsvr_kba_single_author_name_enable', true ) ) : ?>
								<span class="post__date-author">
									<?php echo sprintf( esc_html__( 'by %s', 'lore' ), '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" class="post__date-author-link" rel="author">' . get_the_author() . '</a>' ); ?>
								</span>
							<?php endif; ?>

						</span>

						<?php if ( true === get_theme_mod( 'lsvr_kba_single_last_update_enable', false ) && get_the_date() !== get_the_modified_date() ) : ?>
							<span class="post__date-updated">
								<?php echo sprintf( esc_html__( 'Updated: %s', 'lore' ), esc_html( get_the_modified_date() ) ); ?>
							</span>
						<?php endif; ?>

					</p>
					<!-- POST DATE : end -->

					<?php if ( lsvr_lore_has_post_terms( get_the_ID(), 'lsvr_kba_cat' ) ||
						lsvr_lore_has_post_terms( get_the_ID(), 'lsvr_kba_tag' ) ) : ?>

						<!-- POST META : begin -->
						<p class="post__meta">

							<?php if ( lsvr_lore_has_post_terms( get_the_ID(), 'lsvr_kba_cat' ) ) : ?>
								<span class="post__meta-item post__meta-item--categories">
									<?php lsvr_lore_the_post_terms( get_the_ID(), 'lsvr_kba_cat', '%s', ', ' ); ?>
								</span>
							<?php endif; ?>

							<?php if ( lsvr_lore_has_post_terms( get_the_ID(), 'lsvr_kba_tag' ) ) : ?>
								<span class="post__meta-item post__meta-item--tags">
									<?php lsvr_lore_the_post_terms( get_the_ID(), 'lsvr_kba_tag', '%s', ', ' ); ?>
								</span>
							<?php endif; ?>

						</p>
						<!-- POST META : end -->

					<?php endif; ?>

				</footer>
				<!-- POST FOOTER : end -->

				<?php // Add custom code after post footer
				do_action( 'lsvr_lore_kba_single_footer_after' ); ?>

				<?php // Post rating
				get_template_part( 'template-parts/lsvr_kba/single-rating' ); ?>

				<?php // Post author bio
				get_template_part( 'template-parts/single-author' ); ?>

				<?php // Post navigation
				get_template_part( 'template-parts/single-navigation' ); ?>

				<?php // Add custom code at post bottom
				do_action( 'lsvr_lore_kba_single_bottom' ); ?>

			</div>
		</article>
		<!-- POST : end -->

		<?php // Post related
		get_template_part( 'template-parts/lsvr_kba/single-related' ); ?>

	    <?php // Post comments
	    comments_template(); ?>

	<?php endwhile; endif; ?>

</div>
<!-- POST SINGLE : end -->

<?php // Main end
get_template_part( 'template-parts/main-end' ); ?>

<?php get_footer(); ?>