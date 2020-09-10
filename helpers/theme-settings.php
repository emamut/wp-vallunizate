<?php function theme_option_page()
{ ?>
  <div class="wrap">
    <h1>Personalización del tema</h1>
    <form method="post" action="options.php">
      <?php settings_fields("theme-options-grp");
      do_settings_sections("theme-options");
      submit_button(); ?>
    </form>
  </div>
<?php }

function add_theme_menu_item()
{
  add_theme_page("Personalización del tema", "Personalización del tema", "manage_options", "theme-options", "theme_option_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");


function display_whatsapp()
{ ?>
  <input name="whatsapp" id="whatsapp" placeholder="+57317000000" value="<?php echo get_option('whatsapp'); ?>">
<?php }

function theme_settings()
{
  add_settings_section( 'first_section', 'Datos editables', '', 'theme-options');

  add_settings_field('whatsapp', 'Whatsapp', 'display_whatsapp', 'theme-options', 'first_section');

  register_setting( 'theme-options-grp', 'whatsapp');
}
add_action('admin_init', 'theme_settings');