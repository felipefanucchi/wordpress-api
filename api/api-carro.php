<?php 
    function api_get_carro( $request ) {
        $slug = saniteze_text_field( $request->get_param('slug') );

        $carro = array(
            'slug' => $slug
        )
        
        return rest_ensure_response( $posts );
    }

    function api_register_carro_router() {
        register_rest_route( 'carcraft/v1', 'carro/(?P<slug>[-\w]+)', array(
            'methods' => 'GET',
            'callback' => 'api_get_carro'
        ));
    }

    add_action('rest_api_init', 'api_register_carro_router');
?>