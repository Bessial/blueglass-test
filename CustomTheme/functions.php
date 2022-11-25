<?php
    function test_theme_setup() {
        register_nav_menus( 
            array( 
                'header' => 'Header menu',
                'footer' => 'Footer menu',
                'top destination' => 'Top Destination',
                'travel information' => 'Travel Information',
                'footer logo' => 'Footer Logos'
            ) 
        );
    }

    add_action( 'after_setup_theme', 'test_theme_setup' );


    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(); 
    }

    function additional_custom_stuff() {
        wp_register_style('styles', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
        wp_enqueue_style('styles');

        wp_register_style('styles-mobile', get_template_directory_uri() . '/css/mobile_style.scss', array(), '1.0', 'all');
        wp_enqueue_style('styles-mobile');

        wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0');
        wp_enqueue_script('script');

        wp_register_style( 'block-slider', get_template_directory_uri() . '/template-parts/block/hero/hero.scss', array(), '1.0.0' );
        wp_enqueue_style('block-slider');

        wp_register_script('slickjs', get_template_directory_uri() . '/template-parts/block/hero/hero.js', array('jquery'), '1.0.0');
        wp_enqueue_script('slickjs');

        wp_register_style( 'acc', get_template_directory_uri() . '/template-parts/block/accordion/accordion.scss', array(), '1.0.0' );
        wp_enqueue_style('acc');

        wp_register_style( 'textimg', get_template_directory_uri() . '/template-parts/block/textimg/text-img.scss', array(), '1.0.0' );
        wp_enqueue_style('textimg');

        wp_register_script( 'wds-gutenberg-admin-js', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0.0', true );
        wp_enqueue_script('wds-gutenberg-admin-js');

    }
    add_action( 'wp_enqueue_scripts', 'additional_custom_stuff' );
    
    wp_get_theme()->get_page_templates( $post, $post_type );
    

    function acf_portfolio_item_block() {
	
        // check function exists
        if( function_exists('acf_register_block') ) {
            
            // register a portfolio item block
            acf_register_block(array(
                'name'				=> 'imgtext-item',
                'title'				=> __('Imgtext Item'),
                'description'		=> __('A custom block for imgtext items.'),
                'render_template'	=> 'template-parts/block/textimg/text-img.php',
                'category'			=> 'layout',
                'mode'              => 'preview',
                'icon'				=> 'excerpt-view',
                'keywords'			=> array( 'imgtext' ),
            ));
        }
    }
    
    add_action('acf/init', 'acf_portfolio_item_block');

    function acf_accordion_item_block() {
	
        // check function exists
        if( function_exists('acf_register_block') ) {
            
            // register a portfolio item block
            acf_register_block(array(
                'name'				=> 'accordion-block',
                'title'				=> __('Accordion'),
                'description'		=> __('A custom block for Accordion items.'),
                'render_template'	=> 'template-parts/block/accordion/accordion.php',
                'category'			=> 'layout',
                'mode'              => 'preview',
                'icon'				=> 'excerpt-view',
                'keywords'			=> array( 'imgtext' ),
                'enqueue_assets'    => function(){
                    wp_enqueue_script( 'js', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );
                },
            ));
        }
    }
    
    add_action('acf/init', 'acf_accordion_item_block');

    function accordion() {
        // Add support for editor styles.
        add_theme_support( 'editor-styles' );
    
      // Enqueue editor styles.
      add_editor_style( '/template-parts/block/accordion/accordion.css' );
    }
    add_action( 'after_setup_theme', 'accordion' );


    function wds_register_acf_gutenberg_blocks() {
        if ( function_exists( 'acf_register_block' ) ) {
            // Register the hero block.
            acf_register_block(array(
                'name'            => 'hero',
                'title'           => __( 'Hero', 'wds' ),
                'description'     => __( 'A hero block.', 'wds' ),
                'render_template' => get_template_directory() . '/template-parts/block/hero/hero.php',
                'category'        => 'layout',
                'icon'            => 'slides',
                'mode'            => 'preview',
                'keywords'        => array( 'hero', 'slider' ),
                'enqueue_assets'    => function(){
                    wp_enqueue_style( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
                    wp_enqueue_style( 'slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
                    wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
                },
            ));
        }
    }
    add_action( 'acf/init', 'wds_register_acf_gutenberg_blocks' );

    function wds_gutenberg_assets() {
        wp_register_style( 'wds-gutenberg-admin', get_stylesheet_directory_uri() . '/template-parts/block/hero/hero.scss', array(), '1.0.0' );
        wp_enqueue_style('wds-gutenberg-admin');
        
        wp_register_style( 'wds-gutenberg-admin-textimg', get_stylesheet_directory_uri() . '/template-parts/block/textimg/text-img.scss', array(), '1.0.0' );
        wp_enqueue_style('wds-gutenberg-admin-textimg');

        wp_register_style( 'wds-gutenberg-acco', get_stylesheet_directory_uri() . '/template-parts/block/accordion/accordion.scss', array(), '1.0.0' );
        wp_enqueue_style('wds-gutenberg-acco');

        wp_register_script( 'wds-gutenberg-admin-herojs', get_stylesheet_directory_uri() . '/template-parts/block/hero/hero.js', array(), '1.0.0', true );
        wp_enqueue_script('wds-gutenberg-admin-herojs');

        wp_register_script( 'wds-gutenberg-admin-js', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0.0', true );
        wp_enqueue_script('wds-gutenberg-admin-js');
    }
    add_action( 'enqueue_block_assets', 'wds_gutenberg_assets' );

    add_theme_support( 'wp-block-styles' );


    
?>
