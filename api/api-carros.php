<?php 
    function api_get_carros() {
        $posts = array();
        $args = array('post_type' => 'carros', 'post_per_page' => -1);

        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
            $id = get_the_ID();
            $slug = get_post_field( 'post_name', $id );
            $titulo = get_the_title();
            $preco = get_post_field( 'preco', $id );

            $post = array(
                'id' => $id,
                'slug' => $slug,
                'titulo' => $titulo,
                'preco' => $preco  
            );

            $posts[$slug] = $post;
        endwhile;

        return rest_ensure_response( $posts );
    }

    function api_register_carros_router() {
        register_rest_route( 'carcraft/v1', 'carros', array(
            'methods' => 'GET',
            'callback' => 'api_get_carros'
        ));
    }

    add_action('rest_api_init', 'api_register_carros_router');
?>