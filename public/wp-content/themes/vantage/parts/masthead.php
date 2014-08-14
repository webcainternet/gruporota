<?php
/**
 * Part Name: Default Masthead
 */
?>
<header id="masthead" class="site-header" role="banner">

	<hgroup class="full-container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo"><?php vantage_display_logo(); ?></a>

		<?php if( is_active_sidebar('sidebar-header') ) : ?>

			<div id="header-sidebar">
				<?php
				// Display the header area sidebar, and tell mobile navigation that we can use menus in here
				add_filter('siteorigin_mobilenav_is_valid', '__return_true');
				dynamic_sidebar( 'sidebar-header' );
				remove_filter('siteorigin_mobilenav_is_valid', '__return_true');
				?>
			</div>

		<?php else : ?>

			<div style="margin-top: 30px; margin-left: 340px;">
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="315" height="35" id="integrandoodesenv" align="middle">
					<param name="allowScriptAccess" value="sameDomain">
					<param name="allowFullScreen" value="false">
					<param name="movie" value="swf/integrandoodesenv.swf">
					<param name="quality" value="high">
					<param name="bgcolor" value="#fcfcfc">	
					<embed src="http://gruporota.webca.com.br/swf/integrandoodesenv.swf" quality="high" bgcolor="#fcfcfc" width="315" height="35" name="integrandoodesenv" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer">
				</object>
			</div>

			<div class="support-text" style="margin-top: 0px; top: 15px; font-style: normal;">
			Idioma: pt-br | en
			</div>

			<div class="support-text" style="margin-top: 15px;">
				<?php /* do_action('vantage_support_text'); */ ?>
				<img src="http://gruporota.homolog.webca.com.br/wp-content/uploads/2014/08/how-to-add-social-media-icons1.png" width="200">
			</div>

		<?php endif; ?>

	</hgroup><!-- hgroup.full-container -->

	<?php get_template_part( 'parts/menu', apply_filters( 'vantage_menu_type', siteorigin_setting( 'layout_menu' ) ) ); ?>

</header><!-- #masthead .site-header -->