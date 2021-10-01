<?php

add_shortcode('bandcamp', function($attr=[]){
	$attr = shortcode_atts([
		'width' => 350,
		'height' => 470,
		'title' => null,
		'album' => null,
		'title' => null,
		'size' => 'large',
		'bgcol' => 'ffffff',
		'url' => null,
		'linkcol' => '0687f5',
		'tracklist' => 'false',
		'artwork' => null,
	], $attr);
	
	$params = [
		'transparent' => 'true',
	];
	
	$p = [];
	
	extract($attr);
	if ($album == null)
		return false;
	
	if ( preg_match("#^[0-9]+$#", $width) ) {
			$width = $width.'px';
	}
	if ( preg_match("#^[0-9]+$#", $height) ) {
			$height = $height.'px';
	}

	$iframe = '<iframe style="border: 0; width: %s; height: %s;" src="https://bandcamp.com/EmbeddedPlayer/album=%s/size=%s/bgcol=%s/linkcol=%s/tracklist=%s/transparent=true/artwork=%s" title="%s" seamless></iframe>';
	
	return sprintf('<figure class="wp-block-embed-bandcamp wp-block-embed is-type-audio is-provider-bandcamp wp-embed-aspect-16-9 wp-has-aspect-ratio js">' . '<div class="wp-block-embed__wrapper">' . $iframe . '</div>' . '</figure>',
		$width,
		$height,
		$album,
		$size,
		$bgcol,
		$linkcol,
		$tracklist,
		$artwork,
		$title,
	);
});