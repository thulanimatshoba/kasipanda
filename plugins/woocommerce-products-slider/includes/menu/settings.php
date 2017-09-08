<?php	

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



	if(empty($_POST['wcps_hidden']))
		{
		
			//$wcps_ribbons = get_option( 'wcps_ribbons' );
			
			
			
		}
	else
		{
					
				
		if($_POST['wcps_hidden'] == 'Y') {
			//Form data sent


			//$wcps_ribbons = stripslashes_deep($_POST['wcps_ribbons']);
			//update_option('wcps_ribbons', $wcps_ribbons);
			

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.','wcps' ); ?></strong></p></div>

			<?php
		} 
	}
	

	
?>

<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".wcps_plugin_name.' '.__('Settings','wcps')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="wcps_hidden" value="Y">
        <?php settings_fields( 'wcps_plugin_options' );
				do_settings_sections( 'wcps_plugin_options' );
			
		?>
        
        
	<div class="para-settings">
        <ul class="tab-nav"> 
            <li nav="2" class="nav2 active"><?php _e('Help','wcps'); ?></li>
        </ul> <!-- tab-nav end -->
    
		<ul class="box">
            
            <li style="display: block;" class="box2 tab-box active">
            
				<div class="option-box">
                    <p class="option-title"><?php _e('Need Help ?','wcps'); ?></p>
                    <p class="option-info">
                    <?php
                    echo sprintf('Feel free to contact with any issue for this plugin, Ask any question via forum <a href="%s">%s</a> (free) ', wcps_qa_url,wcps_qa_url);
					?>
<br />
    <?php

    if(wcps_customer_type=="free")
        {
    
            //echo 'You are using <strong> '.wcps_customer_type.' version  '.wcps_plugin_version.'</strong> of <strong>'.wcps_plugin_name.'</strong>, To get more feature you could try our premium version . , To get more feature you could try our premium version .';
            
			echo sprintf("You are using %s version %s of %s, To get more feature you could try our premium version.", '<b>'.wcps_customer_type.'</b>','<b>'.wcps_plugin_version.'</b>', '<b>'.wcps_plugin_name.'</b>');
			
			
            echo '<br /><a href="'.wcps_pro_url.'">'.wcps_pro_url.'</a>';
            
        }
    else
        {
   			echo sprintf("Thanks for using premium version %s of %s", '<b>'.wcps_plugin_version.'</b>','<b>'.wcps_plugin_name.'</b>');
           // echo 'Thanks for using <strong> premium version  '.wcps_plugin_version.'</strong> of <strong>'.wcps_plugin_name.'</strong> ';	
            
            
        }
    
     ?>       

                    
                    </p>

                </div>
				<div class="option-box">
                    <p class="option-title"><?php _e('Submit Reviews','wcps'); ?></p>
                    <p class="option-info"><?php _e('We are working hard to build some awesome plugins for you and spend thousand hour for plugins. we wish your three(3) minute by submitting five star reviews at wordpress.org. if you have any issue please submit at forum.','wcps'); ?></p>
                	<img class="wcps-pro-pricing" src="<?php echo wcps_plugin_url."css/five-star.png";?>" /><br />
                    <a target="_blank" href="<?php echo wcps_wp_reviews; ?>">
                		<?php echo wcps_wp_reviews; ?>
               		</a>
                    
                    
                    
                </div>
				<div class="option-box">
                    <p class="option-title"><?php _e('Please Share','wcps'); ?></p>
                    <p class="option-info"><?php _e('If you like this plugin please share with your social share network.','wcps'); ?></p>
                    <?php
                    
						echo wcps_share_plugin();
					?>
                </div>
				<div class="option-box">
                    <p class="option-title"><?php _e('Video Tutorial','wcps'); ?></p>
                    <p class="option-info"><?php _e('Please watch this video tutorial.','wcps'); ?></p>
                	<iframe width="640" height="480" src="<?php echo wcps_tutorial_video_url; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            
            
            </li>  

        </ul>
    
    
    
    </div>    


<!-- 

<p class="submit">
	<input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
</p>
-->
		</form>


</div>
