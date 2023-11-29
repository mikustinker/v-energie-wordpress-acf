<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link rel="shortcut icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.png' ); ?>">

	<?php wp_head(); ?>
</head>

<?php
$image = get_field( 'logo', 'options' );
$phone = get_field( 'phone', 'options' );
?>

<body <?php body_class(); ?>>

<header class="header">
	<div class="container">
		<div class="header-logo a-up">
			<?php if ( $image ) : ?>
			<a href="/">
				<img src="<?php echo esc_attr( $image['url'] ); ?>" alt="header logo">
			</a>
			<?php endif; ?>
		</div>
		<div class="header-phone a-up a-delay-1">
			<a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
		</div>
	</div>
</header>

<main class="main">
