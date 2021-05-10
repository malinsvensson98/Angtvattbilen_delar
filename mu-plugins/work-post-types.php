<?php

// För att skapa en egen post-type 
function work_post_types() { 
    register_post_type('work', array(
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title'),
        'public' => true, 
        'show_ui' => true,
        'labels' => array(
            'name' => 'Spara arbeten', // Namn på flik i wp
            'add_new_item' => 'Spara ett arbete', // Rubrik för undersida i wp
            'edit_item' => 'Ändra sparat arbete', // Rubrik vid ändring av data
            'all_items' => 'Alla sparade arbeten', // Hover
            'singular_name' => 'Arbete'
        ), 
        'menu_icon' => 'dashicons-calendar'
    )); 
}
add_action('init', 'work_post_types'); 


?>