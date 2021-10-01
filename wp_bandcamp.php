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
	
	$url_base = 'https://bandcamp.com/EmbeddedPlayer/';
	
	$p = [];
	
	extract($attr);
	
	unset($attr['title'], $attr['width'], $attr['height']);
	
	$params = array_merge($attr, $params);
	
	foreach ($params as $key => $value) {
		$p[] = $key. '=' .$value;
	}
	
	if ( preg_match("#^[0-9]+$#", $width) ) {
			$width = $width.'px';
	}
	if ( preg_match("#^[0-9]+$#", $height) ) {
			$height = $height.'px';
	}

	$iframe = '<iframe style="border: 0; width: %s; height: %s;" src="%s" title="%s" seamless></iframe>';
	
	return sprintf('<figure class="wp-block-embed-bandcamp wp-block-embed is-type-audio is-provider-bandcamp">' . '<div class="wp-block-embed__wrapper">' . $iframe . '</div>' . '</figure>',
		$width,
		$height,
		implode('/', $p). '/',
		$title,
	);
});