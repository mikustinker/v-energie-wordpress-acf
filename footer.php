</main>

<?php
$image   = get_field( 'logo', 'options' );
$email   = get_field( 'email', 'options' );
$phone   = get_field( 'phone', 'options' );
$address = get_field( 'address', 'options' );
?>

<footer class="footer">
    <div class="container">
        <div class="footer-logo">
			<?php if ( $image ) : ?>
			<a href="/">
				<img src="<?php echo esc_attr( $image['url'] ); ?>" alt="footer logo">
			</a>
			<?php endif; ?>
		</div>
        <div class="footer-menus">
            <div class="footer-menu footer-menu--contact">
                <div class="footer-menu__item"><h5><?php echo esc_html( $address ); ?></h5></div>
                <div class="footer-menu__item"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></div>
                <div class="footer-menu__item"><a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></div>
            </div>
            <div class="footer-menu footer-menu--second">
                <?php
                wp_nav_menu(
                    array(
                        'container'  => false,
                        'menu'       => 'Footer Menu',
                        'menu_class' => 'footer-menu__main',
                    )
                );
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
