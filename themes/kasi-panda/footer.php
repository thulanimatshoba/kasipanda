<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kasi_Panda
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="site-info uk-container">
        <a class="uk-float-left" href="<?php echo esc_url(__('https://kasipanda.co.za/', 'kasi-panda')); ?>"><?php  printf(esc_html__('All rights reserved	&copy; 2017 %s', 'kasi-panda'), 'Kasi Panda'); ?>
        </a>
        <span class="uk-float-right">
			<?php printf(esc_html__('Developed by %2$s', 'kasi-panda'), 'kasi-panda', '<a href="http://thulanimatshoba.co.za">Thulani Matshoba</a>'); ?>
        </span>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
