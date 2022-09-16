<?php
/*
 *Plugin Name: Custom Weather Plugin
 *Author: Victor Fulcher
 *Description: A custom weather plugin for a live coding interview! :)

 */

function weatherShortcode(){
    $url = file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat=47.5053&lon=-111.3008&appid=24fcd672aebb7d5f43302c4059e48e19&units=imperial');

    $weatherData = json_decode($url, true); //Change JSON to PHP Variables
    
    if(!empty($weatherData)){ //check if array is not empty

		$output = '<div class="container">
					<div class="locationHeader">
						<h1 id="heading"> ' . $weatherData['name'] . '</h1>
						<p>Current Weather: ' . $weatherData['weather'][0]['description'] . ', ' . (int)$weatherData['main']['temp'] . ' degrees.</p>
					</div>
					<div class="weatherContainer">
						<p>Today has a max temperature of: ' . (int)$weatherData['main']['temp_max'] . '.</p>
						<p>Today has a minimum temperature of: ' . (int)$weatherData['main']['temp_min'] . '.</p>
					</div>
					</div>';

		return $output;
        
    } else { //if array is empty, say so
        echo 'empty';
    }
    
    }
add_shortcode('getWeather', 'weatherShortcode');

/** Enqueuing the Stylesheet for the Weather Box */

function enqueue_scripts() {
	global $post;
	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'getWeather') ) {
	wp_register_style( 'weatherStylesheet',  plugin_dir_url( __FILE__ ) . 'style.css' );
		wp_enqueue_style( 'weatherStylesheet' );
	}
   }
   add_action( 'wp_enqueue_scripts', 'enqueue_scripts');


?>

