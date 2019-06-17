<?php

function shortcode_blogcard( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
	), $atts ) );

	$url = get_permalink( $id );
	// 記事のタイトル.
	$title = esc_html( get_the_title( $id ) );
	// 記事の抜粋文.
	$excerpt = esc_html( get_the_excerpt( $id ) );

	if ( has_post_thumbnail( $id ) ) {
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $id ) );
		$img_tag = "<img src='$img[0]' alt='$title' width='$img[1]' height='$img[2]' />";
	} else {
		$img_tag = '';
	}

	$link .= '
		<div class="blog-card">
			<a href="' . $url . '" target="blank">
				<div class="thumbnail">' . $img_tag . '</div>
				<div class="content">
					<div class="title">' . $title . ' </div>
					<div class="excerpt">' . $excerpt . '</div>
				</div>
				<div class="clear"></div>
			</a>
		</div>';

	return $link;
}
add_shortcode( 'blogcard', 'shortcode_blogcard' );

?>
