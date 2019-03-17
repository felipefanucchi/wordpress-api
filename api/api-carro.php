<?php 
    function api_get_carro( $request ) {
        $slug = sanitize_text_field( $request->get_param('slug') );
        $page_object = get_page_by_path( $slug, OBJECT, 'carros' );

        $id = $page_object->ID;
        $titulo = $page_object->post_title;
        $acf = get_fields($id);

        $carro = array(
            'slug' => $slug,
            'id' => $id,
            'titulo' => $titulo,
            'acf' => $acf
        );
        
        return rest_ensure_response( $carro );
    }

    function api_register_carro_router() {
        register_rest_route( 'carcraft/v1', 'carro/(?P<slug>[-\w]+)', array(
            'methods' => 'GET',
            'callback' => 'api_get_carro'
        ));
    }

    add_action('rest_api_init', 'api_register_carro_router');
?>