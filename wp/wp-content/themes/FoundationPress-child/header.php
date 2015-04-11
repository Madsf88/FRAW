<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php if ( is_category() ) {
        bloginfo( 'name' ); echo ' | '; single_cat_title();
    } elseif ( is_tag() ) {
        echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_archive() ) {
        wp_title(''); echo ' Archive | '; bloginfo( 'name' );
    } elseif ( is_search() ) {
        echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
    } elseif ( is_home() || is_front_page() ) {
        bloginfo( 'name' ); echo bloginfo( 'description' );
    }  elseif ( is_404() ) {
        echo 'Error 404 Not Found | '; bloginfo( 'name' );
    } elseif ( is_single() ) {
        wp_title('');
    } else {
        echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
    } ?></title>

    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() ; ?>/img/icons/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php do_action('foundationPress_after_body'); ?>
    <?php wp_nav_menu(array('container_id' => 'menu')); ?>

    <?php do_action('foundationPress_layout_start'); ?>

    <section class="container" id="wrapper" role="document">
        <?php do_action('foundationPress_after_header'); ?>