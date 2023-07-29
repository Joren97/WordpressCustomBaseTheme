<?php

/**
 * Remove Default WP Posttype
 */

function remove_default_post_type()
{
    remove_menu_page('edit.php');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
}

add_action('admin_menu', 'remove_default_post_type');

/**
 * Register CPT Fietsen
 */

function add_cpt_bikes()
{
    $labels = array(
        'name' => 'Fietsen',
        'singular_name' => 'Speler',
        'menu_name' => 'Fietsen',
        'name_admin_bar' => 'Fietsen',
        'archives' => 'Speler Archives',
        'attributes' => 'Speler Attributes',
        'parent_item_colon' => 'Parent Speler',
        'all_items' => 'All Fietsen',
        'add_new_item' => 'Add New Speler',
        'add_new' => 'Add New Player',
        'new_item' => 'New Speler',
        'edit_item' => 'Edit Speler',
        'update_item' => 'Update Speler',
        'view_item' => 'View Speler',
        'view_items' => 'View Fietsen',
        'search_items' => 'Search Fietsen',
        'not_found' => 'Not Found',
        'not_found_in_trash' => 'Not Found In Trash',
        'featured_image' => 'Featured Image',
        'set_featured_image' => 'Set Featured Image',
        'remove_featured_image' => 'Remove Featured Image',
        'use_featured_image' => 'Use As Featured Image',
        'insert_into_item' => 'Insert Into Speler',
        'uploaded_to_this_item' => 'Uploaded To This Speler',
        'items_list' => 'Fietsen List',
        'items_list_navigation' => 'Fietsen List Navigation',
        'filter_item_list' => 'Filter Fietsen List',
    );

    $args = array(
        'label' => 'Speler',
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'excerpt', 'revisions'),
        'show_in_rest' => true,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 50,
        'menu_icon' => 'dashicons-image-filter',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'rewrite' => array('with_front' => false, 'slug' => 'Fietsen'),
    );

    register_post_type('cpt-bikes', $args);
}

add_action('init', 'add_cpt_bikes', 0);


/**
 * Register Taxonomy Kind
 */

function add_tax_kind()
{
    register_taxonomy(
        'tax-bikes-kind',
        'cpt-bikes',
        array(
            'label' => 'Grootte',
            'hierarchical' => true,
            'show_in_rest' => true,
            'rewrite' => array(
                'slug' => 'kind',
                'with_front' => false
            ),
        )
    );
}

add_action('init', 'add_tax_kind');