<?php
/*
 Plugin Name: Custom Weather Plugin
 Author: Victor Fulcher
 Description: A custom weather plugin for a live coding interview! :)

 */

$url = 'https://api.openweathermap.org/data/2.5/weather?lat=47.5053&lon=-111.3008&appid=24fcd672aebb7d5f43302c4059e48e19&units=imperial';

function weatherShortcode(){
    $weatherData = json_decode(file_get_contents($url), true); //Change JSON to PHP Variables
    
    echo "hello world";
    print_r($url, true);
    echo $weatherData['temp'];
    //return $weatherData->{'main'};
    return print_r($weatherData);

    }

add_shortcode('getWeather', 'weatherShortcode');

?>