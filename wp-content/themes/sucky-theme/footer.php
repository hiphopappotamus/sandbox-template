<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package This_Theme_Sucks
 */

?>

<footer id="colophon" class="site-footer">
 <div class="site-info container">
  <div class="site-branding">
   <?php
			the_custom_logo();
	
			?>
   <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
   <?php
				$sucky_theme_description = get_bloginfo('description', 'display');
			?>
  </div><!-- .site-branding -->
 </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>