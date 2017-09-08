<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

/*

function wcps_grid_items($grid_items){
		
			$grid_items_extra = array(
							'thumb1'=>'Thumbnail 1',
							'title1'=>'Title 1',																												
							);
							
			$grid_items = array_merge($grid_items,$grid_items_extra);
			
			return $grid_items;
		}

add_filter('wcps_grid_items', 'wcps_grid_items');

*/



function wcps_grid_items_reset(){
	$wcps_id = (int)$_POST['wcps_id'];
	
	if(delete_post_meta($wcps_id, 'wcps_grid_items')){
		echo 'Reset done!';
		}
	else{
		echo 'Reset failed!';
		}
	
	die();
	
	}
	
add_action('wp_ajax_wcps_grid_items_reset', 'wcps_grid_items_reset');
add_action('wp_ajax_nopriv_wcps_grid_items_reset', 'wcps_grid_items_reset');



function wcps_get_all_product_ids($postid)
	{
		
		$wcps_product_ids = get_post_meta( $postid, 'wcps_product_ids', true );
		$wcps_query_orderby = get_post_meta( $postid, 'wcps_query_orderby', true );
		
		
		$return_string = '';
		$return_string .= '<ul style="margin: 0;">';
		
		
		
		$args_product = array(
		'post_type' => 'product',
		'posts_per_page' => -1,
		);

		$product_query = new WP_Query( $args_product );
	
		if($product_query->have_posts()): while($product_query->have_posts()): $product_query->the_post();
		

	   $return_string .= '<li><label ><input class="wcps_product_ids" type="checkbox" name="wcps_product_ids['.get_the_ID().']" value ="'.get_the_ID().'" ';
		
		if ( isset( $wcps_product_ids[get_the_ID()] ) )
			{
			$return_string .= "checked";
			}
		
		
		
		
		$return_string .= '/>';

		$return_string .= get_the_title().'</label ></li>';
			
		endwhile;   endif; wp_reset_query();
		
		
		$return_string .= '</ul>';
		echo $return_string;
	
	}






function wcps_get_taxonomy_category($postid)
	{
		

	
	$wcps_taxonomy = get_post_meta( $postid, 'wcps_taxonomy', true );
	if(empty($wcps_taxonomy))
		{
			$wcps_taxonomy= "product_cat";
		}
	$wcps_taxonomy_category = get_post_meta( $postid, 'wcps_taxonomy_category', true );
	
		
		if(empty($wcps_taxonomy_category))
			{
			 	$wcps_taxonomy_category =array('none'); // an empty array when no category element selected
				
			
			}

		
		
		if(!isset($_POST['taxonomy']))
			{
			$taxonomy =$wcps_taxonomy;
			}
		else
			{
			$taxonomy = $_POST['taxonomy'];
			}
		
		
		$args=array(
		  'orderby' => 'name',
		  'order' => 'ASC',
		  'taxonomy' => $taxonomy,
		  );
	
	$categories = get_categories($args);
	
	
	if(empty($categories))
		{
		echo "No Items Found!";
		}
	
	
		$return_string = '';
		$return_string .= '<ul style="margin: 0;">';
	
	foreach($categories as $category){
		
		if(array_search($category->cat_ID, $wcps_taxonomy_category))
		{
	   $return_string .= '<li class='.$category->cat_ID.'><label ><input class="wcps_taxonomy_category" checked type="checkbox" name="wcps_taxonomy_category['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';
		}
		
		else
			{
				   $return_string .= '<li class='.$category->cat_ID.'><label ><input class="wcps_taxonomy_category" type="checkbox" name="wcps_taxonomy_category['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';			
			}
		
		

		
		}
	
		$return_string .= '</ul>';
		
		echo $return_string;
	
	if(isset($_POST['taxonomy']))
		{
			die();
		}
	
		
	}

add_action('wp_ajax_wcps_get_taxonomy_category', 'wcps_get_taxonomy_category');
add_action('wp_ajax_nopriv_wcps_get_taxonomy_category', 'wcps_get_taxonomy_category');









function wcps_get_product_categories($postid)
	{
		
		$taxonomy= "product_cat";
		$wcps_taxonomy_category = get_post_meta( $postid, 'wcps_slide_categories', true );
		$args=array(
		  'orderby' => 'name',
		  'order' => 'ASC',
		  'taxonomy' => $taxonomy,
		  );
	
	$categories = get_categories($args);
	
	
	if(empty($categories))
		{
		echo "No categories found!";
			$categories = array();
		}
	
	
		$html = '';
		$html .= '<ul style="margin: 0;">';
	
	foreach($categories as $category){
		
		if(array_search($category->cat_ID, $wcps_taxonomy_category))
			{
				$html .= '<li class='.$category->cat_ID.'><label ><input checked type="checkbox" name="wcps_slide_categories['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';
			}
		
		else
			{
				$html .= '<li class='.$category->cat_ID.'><label ><input type="checkbox" name="wcps_slide_categories['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';			
			}
		
		

		
		}
	
		$html .= '</ul>';
		
		echo $html;
	
		
	}







function wcps_add_shortcode_column( $columns ) {
    return array_merge( $columns, 
        array( 'shortcode' => __( 'Shortcode', 'wcps' ) ) );
}
add_filter( 'manage_wcps_posts_columns' , 'wcps_add_shortcode_column' );


function wcps_posts_shortcode_display( $column, $post_id ) {
    if ($column == 'shortcode'){
		?>
        <input style="background:#bfefff" type="text" onClick="this.select();" value="[wcps <?php echo ' id=&quot;'.$post_id.'&quot;';?> ]" />
      <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[wcps id='; echo "'".$post_id."' ]"; echo '"); ?>'; ?></textarea>
        <?php		
		
    }
}
add_action( 'manage_wcps_posts_custom_column' , 'wcps_posts_shortcode_display', 10, 2 );
























function wcps_dark_color($input_color)
	{
		if(empty($input_color))
			{
				return "";
			}
		else
			{
				$input = $input_color;
			  
				$col = Array(
					hexdec(substr($input,1,2)),
					hexdec(substr($input,3,2)),
					hexdec(substr($input,5,2))
				);
				$darker = Array(
					$col[0]/2,
					$col[1]/2,
					$col[2]/2
				);
		
				return "#".sprintf("%02X%02X%02X", $darker[0], $darker[1], $darker[2]);
			}

		
		
	}
	
	
	
	
	
	function wcps_share_plugin()
		{
			
			?>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwordpress.org%2Fplugins%2Fwoocommerce-products-slider%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=652982311485932" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
            
            <br />
            <!-- Place this tag in your head or just before your close body tag. -->
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo wcps_share_url; ?>"></div>
            
            <br />
            <br />
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo wcps_share_url; ?>" data-text="<?php echo wcps_plugin_name; ?>" data-via="ParaTheme" data-hashtags="WordPress">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>



            <?php
			
			
			
		
		
		}
	
	

	