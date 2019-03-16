<?php
    function create_carros_post() {
        register_post_type( 'carros',
            array(
                'labels' => array(
                    'name' => 'Carros',
                    'singular_name' => 'Carro'
                ),
                'public' => true,
                'has_archive' => true
            ));
    }

    add_action( 'init', 'create_carros_post' )
?>