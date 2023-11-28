<?php
extract( $args );

$video = isset( $video ) && ! empty( $video ) ? $video : false;
$image = isset( $image ) && ! empty( $image ) ? $image : false;
$size  = isset( $size ) && ! empty( $size ) ? $size : false;
if ( $image ) {
	if ( $size ) {
		$img_url = $image['sizes'][ $size ];
	} else {
		$img_url = $image['url'];
	}
}
?>
<?php if ( $video ) : ?>
	<video loop playsinline muted preload="metadata" src="<?php echo $video; ?>">
		<source src="<?php echo $video; ?>" type="video/mp4">
	</video>
<?php elseif ( $image ) : ?>
	<img src="<?php echo $img_url; ?>" alt="" loading="lazy">
<?php endif; ?>
