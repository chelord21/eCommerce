<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width,">
	<title><?php bloginfo('name') ?></title>
	<?php wp_head(); ?>
	<script type="text/javascript">
    	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body <?php body_class(); ?>>
	<div class="head-container">
	
	<!-- site-header-->
	<header class="site-header">

	<!-- hd-search -->
		<div class="hd-search">
			<?php get_search_form(); ?>

		</div><!-- /hd-search -->


		<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		<h5>
			<?php bloginfo('description'); ?>
			<br>
			<br>
			<?php if (is_page('home')) { ?>
				Buy buy buy!
			<?php }?>

			<?php if (is_page('my-account')) { ?>
				Change your settings.
			<?php }?>

			<?php if (is_page('cart')) { ?>
				Not satisfied with your cart? Change it here or go out and buy some more!
			<?php }?>

			<?php if (is_page('checkout')) { ?>
				Here's where you spend those hard earned cash!
			<?php }?>
		</h5>

		

		<nav class="site-nav">

			<?php 
			$args = array(
				'theme_location' => 'primary'
			);

			?>

			<?php wp_nav_menu(   $args ); ?>
		</nav>


	</header><!-- site-header end-->
<?php 




?>