<?php

add_shortcode('hrf_faqs', 'fn_hrf_faqs');

function fn_hrf_faqs($attr)

{
   
   $is_new_install_hrf = get_option('hrf_installed_status');
   
   $faq_params = shortcode_atts( array(
        'category' => '',
        'title' => '',
    ), $attr );
    
   $html = '<div class="hrf-faq-list">';
   $is_faq = true;
   
   if( $faq_params['title'] != ''){
   $html .= '<h2 class="frq-main-title">'.$faq_params['title'].'</h2>';
   
   }
   $head_tag  = get_option('hrf_question_headingtype','h3');
   $faq_args = array(
        'post_type'      => 'hrf_faq',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'date_create',
        'order'          => 'DSC',
   );
   
   if( $faq_params['category'] != '' ){
      $faq_args['category_name'] = $faq_params['category'];
   }
   
   $faq_query = new WP_Query( $faq_args );

   if( $faq_query->have_posts() ): 
      while( $faq_query->have_posts() ): 
         $faq_query->the_post();

         $html .= '<article class="hrf-entry" id="hrf-entry-'.$faq_query->post->ID.'">
                      <'.$head_tag.' class="hrf-title close-faq" data-content-id="hrf-content-'.$faq_query->post->ID.'"><span></span>'.get_the_title().'</'.$head_tag.'>
                     <div class="hrf-content" id="hrf-content-'.$faq_query->post->ID.'">'.apply_filters( 'the_content', get_the_content() ).'</div>
					 
                  </article>';


if ( $is_new_install_hrf == 'new') {
$endofhtml = '<article style = "display:block;text-align:left; font-size:11px"><br><a class="hrf-view-more" href="category/?'.$faq_params['category'].'/">View all Questions</a></div>';
}else { $endofhtml = '</div> ';}
     
      endwhile;
   else:
      $html .= "No FAQs Found";
      $endofhtml = '</div>';
   endif;
   wp_reset_query();
  $html .= $endofhtml;
   return $html;
}