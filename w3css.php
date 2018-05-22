<?php
/**
 * Plugin Name: W3.CSS
 * Description: Load w3.css into the header
 * Version: 1.0
 * Plugin URI: https://github.com/phkcorporation/w3css
 * Author: PHK Corporation
 * Author URI: https://phkcorp.com
 * Text Domain: w3css
 */

wp_register_style(
    'w3css_v3', // handle name
    plugin_dir_url(__FILE__).'v3/w3.css', // the URL of the stylesheet
    array(), // an array of dependent styles
    '3.04', // version number
    'screen' // CSS media type
);

wp_register_style(
    'w3css_v4', // handle name
    plugin_dir_url(__FILE__).'v4/w3.css', // the URL of the stylesheet
    array(), // an array of dependent styles
    '4.1', // version number
    'screen' // CSS media type
);

wp_register_style(
    'w3css_mobile', // handle name
    plugin_dir_url(__FILE__).'v4/w3mobile.css', // the URL of the stylesheet
    array(), // an array of dependent styles
    '4.1', // version number
    'screen' // CSS media type
);

wp_register_style(
    'w3css_pro', // handle name
    plugin_dir_url(__FILE__).'v4/w3pro.css', // the URL of the stylesheet
    array(), // an array of dependent styles
    '4.1', // version number
    'screen' // CSS media type
);

// load css into the website's front-end
function w3css_enqueue_style() {
    wp_enqueue_style(esc_attr( get_option('css_framework')));
}
add_action( 'wp_enqueue_scripts', 'w3css_enqueue_style' );


function w3css_register_settings() {
	register_setting( 'w3cssoption-group', 'css_framework' );
}

add_action('admin_menu', 'w3css_plugin_create_menu');
function w3css_plugin_create_menu() {
	//create new top-level menu
	add_menu_page('W3.CSS Settings', 'W3.CSS Settings', 'administrator', __FILE__, 'w3css_plugin_settings_page' , null );

	//call register settings function
	add_action( 'admin_init', 'w3css_register_settings' );
	
}

function w3css_plugin_settings_page() {
?>
<div class="wrap">
<h1>Your Plugin Name</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'w3cssoption-group' ); ?>
    <?php do_settings_sections( 'w3cssoption-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">W3.CSS Version</th>
        <td>
			<select name="css_framework">
				<option value="">Select</option>
				<?php foreach(array('w3css_v3','w3css_v4','w3css_mobile','w3css_pro') as $w3css_version) : ?>
					<?php if ($w3css_version === esc_attr( get_option('css_framework'))) : ?>
						<option value="<?php echo $w3css_version; ?>" selected><?php echo $w3css_version; ?></option>
					<?php else : ?>
						<option value="<?php echo $w3css_version; ?>"><?php echo $w3css_version; ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>	
<?php
}

?>