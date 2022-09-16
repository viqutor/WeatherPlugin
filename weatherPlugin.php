<?php
/*
 Plugin Name: Custom Weather Plugin
 Author: Victor Fulcher
 Description: A custom weather plugin for a live coding interview! :)

 */

$url = "https://api.openweathermap.org/data/2.5/weather?lat=47.5053&lon=111.3008&appid=24fcd672aebb7d5f43302c4059e48e19&units=imperial";

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
if ( ! class_exists( 'DOT_MyPluginInfo' ) )
{
 
    class DOT_MyPluginInfo {
 
        /**
         * Constructor
         */
        function __construct() {
 
            //Hook up to the init action
            add_action( 'init', array( &$this, 'init_my_plugin_info' ) );
 
        }
 
        /**
         * Runs when the plugin is initialized
         */
        function init_my_plugin_info() {

            $weatherData = json_decode($url); //Change JSON to PHP Variables

            
 
            // Register the shortcode [mpi slug='my-plugin-info' field='version']
            add_shortcode( 'mpi', array( &$this, 'render_mpi' ) );
 
        }
 
        function render_mpi($atts) {
 
        }
 
    } // end class
 
    new DOT_MyPluginInfo();
}
?>