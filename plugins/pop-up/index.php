<?php

/* 
Plugin Name: Plugin Pop-up

Description: Un Plugin permettant d'afficher une pop-up
Version: 0.0.1
Author: Anthony

*/

// autre div qui prend toute la surface de l'ecrant est qui cache 

add_action( "init", "create_pop_up_post");

add_action( 'wp_enqueue_scripts', 'pop_loadScript' );
function pop_loadScript() {
	wp_enqueue_script( 'popup_tp_script', plugin_dir_url("") . '/pop-up/pop-up.js', array("jquery"), '1.0', true );//ajouter un script
}


add_action( 'wp_enqueue_scripts', 'style_load_scripts' );
function  style_load_scripts(){
    wp_enqueue_style("stylepop", plugin_dir_url('./')."pop-up/style.css");
    // wp_enqueue_style("popup_styles", plugin_dir_url('./').'zpopup/style.css');
}



function create_pop_up_post(){

    register_post_type( "pop-up", [
        
                'labels' => [
                    "name" => " Create-pop-up",
                    "singular_name" => 'pop-up',
                    "all_items" => "Toute les pop-up",
                    "add new" => "Ajouter une  pop-up",
                   
                ],
        
                "description" => "Une pop-up pour spam tout le monde",
                "show_in°menu" => true,
                "public" => true,
                "menu_icon" => "dashicons-welcome-comments",
                "menu_position" => 2,
                "supports" => [
                    "title",
                    "editor",
                    "revisions",
                    "thumbnail"
                ],
            ]);
        
  
    
};



add_shortcode( "pop-up", "displayShortcode" );

function displayShortcode(){

    $popup = new WP_Query( [
        "post_type" => "pop-up"

    ]);

    $popup_html = "<div id='pop-up'>";

    if( $popup->have_posts() ){
        
                while( $popup->have_posts() ){
        
                    $popup->the_post();
        
                    $title = get_the_title();
                    $content = get_the_content();

                    if(get_post_meta( $popup->post->ID,"pop")) {
                        $pop = get_post_meta( $popup->post->ID,"pop")[0];
                    }
                    else
                        $note = false;
        

 
                        $popup_html .= "<div class='content'>">
                        $popup_html .= "<div class='pop-up'>">
                        $popup_html .= "<h3>".$title."<h3>";
                        $popup_html .= "<p>".$content."</p>";
            
                       
                        $popup_html .= "</div>";
                        $popup_html .= "</div>";
                    }

}

$popup_html .= "</div>";

return $popup_html;
}















?>