<?php 
    function api_get_carros() {
        return rest_ensure_response( $posts )
    }

    function api_register_carros_router() {
        register_rest_route( 'carcraft/v1', 'carros', array(
            'methods' => 'GET',
            'callback' => 'api_get_carros'
        ))
    }

    add_action('rest_api_init', 'api_register_carros');
?>