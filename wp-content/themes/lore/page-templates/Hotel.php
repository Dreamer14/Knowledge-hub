<?php /* Template Name: Hotel */?>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
</head>
<style>
   .carousel-caption {
   top: 0;
   bottom: auto;
   }
   .gallery img {
   width: 20%;
   height: auto;
   border-radius: 5px;
   cursor: pointer;
   transition: .3s;
   }
   }
   table {
   border-collapse: collapse;
   width: 100%;
   }
   th {
   text-align: left;
   }
</style>
<script>
   $("[data-fancybox]").fancybox();
</script>
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
                     <div class="" style="position:relative;">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                           <!-- Indicators -->
                           <?php $main_banner_images = acf_photo_gallery('main_banner_images', get_the_ID()); ?>
                           <!-- Wrapper for slides -->
                           <div class="carousel-inner img-align slider img-align" id="details-banner">
                              <?php $i = 1;                 
                                 if (count($main_banner_images)) {
                                     foreach ($main_banner_images as $banner_image) {
                                         if($i== 1)
                                             $is_active = " active";
                                         else
                                             $is_active = "";
                                          $full_banner_url= $banner_image['full_image_url'];
                                       $full_banner_url = acf_photo_gallery_resize_image($full_banner_url, 1920, 740);
                                         ?>
                              <div class="item <?php echo $is_active;?>">
                                 <img src="<?php echo $full_banner_url; ?>" alt="Los Angeles" style="width:100%;">
                              </div>
                              <?php $i++; }
                                 }
                                 ?> 
                           </div>
                        </div>
                     </div>
                     <br>
                     <h3 class="font-weight-light">
                        <?php the_field('resort_title'); ?>
                        <?php $file = get_field('pdf_attachment');
                           if( $file ) {
                           $url = wp_get_attachment_url( $file );
                           ?>
                        <a href="<?php echo $url; ?>" ><span class="glyphicon glyphicon-download-alt"></span></a><?php
                           }
                           ?>
                     </h3>
                     <?php the_field('resort_address'); ?>
                     <p><?php the_field('about_resort'); ?></p>
                  </div>
                  <br>
				  <div class="row">
				 <div class="col-xs-6"style="border:1px solid black;">
				  <h4 style="text-align: center">Resort Location</h4>
				  <?php the_field('map'); ?><br>
				  </div>
				  <div class="col-xs-6"style="border:1px solid black;">
				 <h4 style="text-align: center">Room Type Summary</h4>
				  <?php the_field('room_type_summary'); ?>
				  </div>
				  </div><br>
				  
                  <div class="panel panel-default" style= "padding: 10px"type="button" data-toggle="collapse" data-target="#highlights" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-chevron-down"></span>
                     Highlights
                  </div>
                  <div class="collapse" id="highlights">
                     <?php the_field('highlights'); ?>
                  </div>
                  <div class="panel panel-default" style= "padding: 10px"type="button" data-toggle="collapse" data-target="#facilities" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-chevron-down"></span>
                     Facilities
                  </div>
                  <div class="collapse" id="facilities">
                     <?php the_field('facilities'); ?>
                  </div>
                  <div class="panel panel-default" style= "padding: 10px"type="button" data-toggle="collapse" data-target="#roomtype1" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-chevron-down"></span>
                     Room Types
                  </div>
                   <div class="collapse" id="roomtype1">
                     <div class="container">
                         <?php if( have_rows('type') ): $accordion++; ?>
							<div id="accordion<?php echo $accordion; ?>">
							<?php while ( have_rows('type') ) : the_row(); $collapse++; ?>
							
								<div class="panel-default">
									<div class="panel panel-default" style= "padding: 10px"type="button" data-toggle="collapse" data-target="#collapse<?php echo $collapse; ?>" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-chevron-down"></span>
								<?php the_sub_field("title"); ?>
							</div>
							
									<div id="collapse<?php echo $collapse; ?>" class="collapse" aria-labelledby="heading<?php echo $collapse; ?>" data-parent="#accordion<?php echo $accordion; ?>">
										 <div class="row">
                           <div class="col-xs-6"style="height:400px;overflow-y: fixed;">
                              <span class="border">
                              <?php the_sub_field('room_facilities');
                                 ?></span>
                           </div>
                           <div class="col-xs-6">
                              <div id="gallery-2" align= "center">
                                 <div >
                                    <div style="height:400px;overflow-y: scroll;">
                                       <?php
                                          $images = get_sub_field('images');
                                          if( $images ): ?>
                                       <?php foreach( $images as $image ): ?>
                                       <a class=""href="<?php echo $image['url']; ?>" data-fancybox="gallery-<?php $gallery?>">
                                       <img src="<?php echo $image['url']; ?>" width = "200px" >
                                       </a>
                                       <?php $gallery++ ?>
                                       <?php endforeach; ?>
                                       <?php endif;?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
									</div>
								</div>
							
							<?php endwhile; ?>
							</div>
							<?php endif; ?>
			   </div></div>
				  
				  <h4 style="text-align: left">Things to Do</h4><br>
				  <div class="row">
				  <div class="col-xs-3"style="border:1px solid black;">
				  <h4 style="text-align: center">Attractions</h4>
				  <?php the_field('attractions'); ?><br>
				  </div>
				  <div class="col-xs-9"style="border:1px solid black;">
				 <h4 style="text-align: center">Distance</h4>
				  <?php the_field('distance'); ?>
				  </div>
				  </div><br>
                
                                   <div id="gallery-1"class="row" align= "left">
                                      <h4>Resort Images</h4>
                                      <?php
                                         $gallery_images = acf_photo_gallery('gallery_image', get_the_ID());   
                                           ?>
                                      
                                         <div style="height:300px; padding: 5px 5px 5px 5px;">
                                            <?php
                                               if (count($gallery_images)) {
                                                   foreach ($gallery_images as $gallery_image) {
                                                     $full_image_url= $gallery_image['full_image_url'];
                                                     $full_image_url = acf_photo_gallery_resize_image($full_image_url, 1200, 768);                       
                                                           ?>
                                            <a href="<?php echo $full_image_url; ?>" data-fancybox="gallery">
                                            <img src="<?php echo $full_image_url; ?>" width="200px"/>
                                            </a>
                                            <?php      }
                                               } ?>   
                                         </div>
                                      </div>
                                  
                                
                       
                  
                     <?php the_field('hotel_faq'); ?>
					 
					 
                     </div>
                  </div>
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