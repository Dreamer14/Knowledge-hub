<?php /* Template Name: Home */?>
<?php get_header(); ?>

<!-- CORE COLUMNS : begin -->
<div class="core__columns">
	<div class="core__columns-inner">
		<div class="lsvr-container">
			<div class="core__columns-bg">

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
								
								<?php
									
									// check if the repeater field has rows of data
									if( have_rows('faq') ):
									
										// loop through the rows of data
										while ( have_rows('faq') ) : the_row();
									
											?>
											<div class="row" style="margin-bottom:20px;">
											  <div class="col-sm" ><?php the_sub_field('resort_faq'); ?></div>
											  <div class="col-sm" ><?php the_sub_field('resort_faq1'); ?></div>
											  <div class="col-sm" ><?php the_sub_field('resort_faq2'); ?></div>
											</div>
								<?php
										endwhile;
									
									else :
									
										// no rows found
									
									endif;
									
									?>
								
								


							</div>

						<?php endwhile; endif; ?>

					</div>
				</main>
				<!-- MAIN : end -->

			</div>
		</div>
	</div>
</div>
<!-- CORE COLUMNS : end -->

<?php get_footer(); ?>