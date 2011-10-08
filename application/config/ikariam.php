<?php

/**
 * Game version
 */
$config['game_version'] = '0.0.1';

/**
 * URLs
 */
$config['style_url'] = 'http://127.0.0.1/design/';   // URL - skin
$config['style_version'] = $config['game_version'];  // Skin version
$config['script_url'] = 'http://127.0.0.1/design/';  // URL - scripts
$config['script_version'] = $config['game_version']; // Scripts version
$config['forum_url'] = 'http://127.0.0.1/forum/';    // URL - forum

/**
 * Designs
 */
$config['easter'] = FALSE;                           // Easter design
$config['design_4'] = TRUE;                          // 0.4.0 design

/**
 * Mail config
 */
$config['game_email'] = FALSE;                       // To resolve sending of letters (Adjust SMTP)
$config['email_from'] = 'hermes@game.ru';            // The address from which the letter comes

/**
 * Safe
 */
$config['double_login'] = FALSE;                     // Multi-Accounting check

/**
 * Game options
 */
$config['standart_capacity'] = 1500;                 // Default storage capacity
$config['transport_capacity'] = 500;                 // Default cargo capacity
$config['town_queue_size'] = 3;                      // Buildings - construction list size
$config['army_queue_size'] = 3;                      // Army -  construction list size
$config['notes_default'] = 200;                      // Notes length
$config['notes_premium'] = 8192;                     // Premium notes length
$config['trade_route_time'] = 604800;                // Duration of a trading route

/**
 * News
 */
$config['head_news'] = 'Welcome to Ikariam!';

?>