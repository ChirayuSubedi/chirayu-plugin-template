<?php
/**
 * Tigger this file on plugin uninstall
 * 
 * @package ChirayuPlugin
 */

 if ( !defined ( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
 }

 //clear database stored data
 
 $books = get_posts( array('post_type' => 'book' , 'numberposts' => -1 ) );

 foreach ($books as $book) {
    wp_delete_post( $books->ID, false);
 }


 // Access the database via SQL
//  global $wpdb;

//  $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");
//  $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT if FROM wp_posts)" );
//  $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT if FROM wp_posts)" );
 