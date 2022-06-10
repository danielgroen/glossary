<?php




// REGISTER PAGE TEMPLATE HERE

/*
 * Set single post
 */
// add_filter('template_include', 'glossary_templates');
// function glossary_templates($template)
// {

//   $post_type = 'begrippen';

//   if (is_post_type_archive($post_type) && file_exists(plugin_dir_path(__DIR__) . "src/templates/archive-$post_type.php")) {
//     $template = plugin_dir_path(__DIR__) . "src/templates/archive-$post_type.php";
//   }

//   if (is_singular($post_type) && file_exists(plugin_dir_path(__DIR__) . "src/templates/single-$post_type.php")) {
//     $template = plugin_dir_path(__DIR__) . "src/templates/single-$post_type.php";
//   }

//   return $template;
// }

/**
 * Adding custom post types
 **/
function wporg_custom_post_type()
{
  $cpt_name = 'Begrippen';
  $cpt_icon = 'dashicons-book';
  $cpt_singular = 'Begrip';

  register_post_type($cpt_name, [
    "label" => __($cpt_name, "custom-post-type-ui"),
    "labels" => [
      "name" => __($cpt_name, "custom-post-type-ui"),
      "singular_name" => __($cpt_name, "custom-post-type-ui"),
      "add_new" => __($cpt_singular . " toevoegen"),
      "add_new_item" => __("Voeg " . $cpt_singular . " toe"),
    ],
    'menu_icon' => $cpt_icon,
    'menu_position' =>  4,
    "description" => "",
    "public" => true,
    'supports' => array("title", "editor", "author", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "page-attributes", "post-formats"),
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => ["slug" => 'wat-is', "with_front" => true],
    "query_var" => true,
    // "taxonomies"  => array("category"),
  ]);
};

add_action('init', 'wporg_custom_post_type');


add_action('init', 'create_begrippen_taxonomy', 0);
function create_begrippen_taxonomy()
{
  $labels = array(
    'name' => _x('Begrip categorieën', 'taxonomy general name'),
    'singular_name' => _x('Begrip categorie', 'taxonomy singular name'),
    'search_items' =>  __('Zoek categorie'),
    'all_items' => __('Alle categorieen'),
    'edit_item' => __('Edit categorie'),
    'update_item' => __('Update categorie'),
    'add_new_item' => __('Add New categorie'),
    'new_item_name' => __('New categorie Name'),
    'menu_name' => __('Begrip Categorieën'),
  );

  register_taxonomy('glossary_category', ['begrippen', 'page'], array(
    'hierarchical' => false,
    'meta_box_cb' => 'post_categories_meta_box',
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'Begrip'),
  ));
}

// End begrippen
add_theme_support('post-thumbnails');
