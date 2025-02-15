<?php /* Template Name: Sidebar on the Left */
esc_html__( 'Sidebar on the Left', 'lore' ); ?>

<?php get_header(); ?>

<!-- CORE COLUMNS : begin -->
<div class="core__columns">
	<div class="core__columns-inner">
		<div class="lsvr-container">
			<div class="core__columns-bg">

				<div class="lsvr-grid">
					<div class="core__columns-main core__columns-main--right lsvr-grid__col lsvr-grid__col--span-8 lsvr-grid__col--push-4">

						<!-- MAIN : begin -->
						<main id="main">
							<div class="main__inner">

								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

									<div <?php post_class(); ?>>

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
										<!-- MAIN HEADER : begin -->

										<?php get_template_part( 'template-parts/page', 'content' ); ?>

									</div>

								<?php endwhile; endif; ?>

							</div>
						</main>
						<!-- MAIN : end -->

					</div>
					<div class="core__columns-sidebar core__columns-sidebar--left lsvr-grid__col lsvr-grid__col--span-4 lsvr-grid__col--pull-8">

						<?php // Sidebar
						get_sidebar(); ?>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- CORE COLUMNS : end -->

<?php get_footer(); ?>