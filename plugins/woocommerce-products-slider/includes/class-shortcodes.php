<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 	

class class_wcps_shortcodes{
	
	
    public function __construct(){
		
		add_shortcode( 'wcps', array( $this, 'wcps_display' ) );

   		}
	
	public function wcps_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'id' => "",
	
					), $atts);
	
				$html = '';
				$post_id = $atts['id'];
	
				$wcps_themes = get_post_meta( $post_id, 'wcps_themes', true );
			
				$class_wcps_functions = new class_wcps_functions();
				$wcps_themes_dir = $class_wcps_functions->wcps_themes_dir();
				$wcps_themes_url = $class_wcps_functions->wcps_themes_url();

				//var_dump($wcps_themes_url);
				
				
				$html.= '<link  type="text/css" media="all" rel="stylesheet"  href="'.$wcps_themes_url[$wcps_themes].'/style.css" >';				
			
				include $wcps_themes_dir[$wcps_themes].'/index.php';			
	
				return $html;
	
	
		}
			
	
		
	}

new class_wcps_shortcodes();