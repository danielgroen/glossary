<?php


/**
 * Plugin Settings Page
 */
add_filter('plugin_action_links_' . GLOS_BASE, 'add_action_links');
function add_action_links($actions)
{
  $mylinks = [
    '<a href="' . admin_url('options-general.php?page=begrippen') . '">Settings</a>',
  ];
  $actions = array_merge($actions, $mylinks);
  return $actions;
}

/**
 * side menu
 */
add_action('admin_menu', function () {
  add_options_page('Begrippen', 'Begrippen', 'manage_options', 'begrippen', 'render_glossary_settings_page');
});


function render_glossary_settings_page()
{
?>
  <h2>Begrippen plugin Settings</h2>
  <form action="options.php" method="post">
    <?php
    settings_fields(GLOS_NAME . '_options');
    do_settings_sections(GLOS_NAME . '_plugin'); ?>
    <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e('Save'); ?>" />
  </form>
<?php
}


function glossary_register_settings()
{
  register_setting(GLOS_NAME . '_options', GLOS_NAME . '_options');
  add_settings_section('form_settings', false, GLOS_NAME . '_plugin_section_text', GLOS_NAME . '_plugin');

  add_settings_field(GLOS_NAME . '_plugin_setting_production_cpt', 'Custom posttypes', GLOS_NAME . '_plugin_setting_production_cpt', GLOS_NAME . '_plugin', 'form_settings');
}
add_action('admin_init', GLOS_NAME . '_register_settings');




function glossary_plugin_section_text()
{
  echo '<p>Voer hier de custom post types in waar je de begrippen wilt gebruiken</p>';
}

function glossary_plugin_setting_production_cpt()
{
  $options = get_option(GLOS_NAME . '_options');
  if (isset($options['production_cpt'])) {
    echo "
    <input
      id='" . GLOS_NAME . "_plugin_setting_production_cpt'
      name=" . GLOS_NAME . "_options[production_cpt]'
      type='text'
      value='" . esc_attr($options['production_cpt']) . "'
    />";
  } else {
    echo "
    <input
      id='" . GLOS_NAME . "_plugin_setting_production_cpt'
      name=" . GLOS_NAME . "_options[production_cpt]'
      type='text'
      value=''
    />";
  }
}
