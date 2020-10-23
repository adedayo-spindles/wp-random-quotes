<?php
/**
 * @version 1.0
 */
 
/*
Plugin Name: Random Post Quotes
Plugin URI: https://github.com/adedayo-spindles/wp-random-quotes/
Description: Display random quotes on blog posts
Author: Adedayo Agboola
Version: 1.0
Author URI: https://github.com/adedayo-spindles/
*/

function adedayo_get_quotes() {
	
	/** These are some quotes. The quotes may be gotten through an api as well instead */
	
	$quotes = "Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're looking swell, Dolly
I can tell, Dolly
You're still glowin, you're still crowin
You're still goin' strong
I feel the room swayin
While the band's playin
One of our old favorite songs from way back when
So, take her wrap, fellas
Dolly, never go away again
Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin
You're still goin' strong
I feel the room swayin
While the band's playin
One of our old favorite songs from way back when
So, golly, gee, fellas
Have a little faith in me, fellas
Dolly, never go away
Promise, you'll never go away
Dolly'll never go away again";

	// split quotes into array of quotes using the new line.
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a quote from the quotes.
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

	// Get the chosen quote and display with the post content
	function get_quotes($postContent) {
	$chosenQuotes = adedayo_get_quotes();
	
	// Display on a single post
	if ( is_singular( 'post' ) ) {
		
		return $postContent . "<p id='quotes'><span class='quotes-text'> $chosenQuotes </span></p>";
	} else {
		return $postContent;
	}

}

add_filter( 'the_content', 'get_quotes' );

// CSS for the quotes
function quote_css() {
	echo "
	<style type='text/css'>
	
	.quotes-text {
		padding: 1em;
		border-left: 2px solid #10659C;
	}

	.quotes-text::before {
		content: open-quote;
	}
	
	.quotes-text::after {
		content: close-quote;
	}
	
	@media screen and (max-width: 782px) {
		#quotes{
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	
	";
}

add_action( 'wp_footer', 'quote_css' );
