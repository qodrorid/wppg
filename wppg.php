<?php
/*
	Plugin Name: WPPG
	Plugin URI: http://qodr.or.id/
	Version: 1.0.0
	Author: Qodr Team
	Author URI: http://qodr.or.id/
	Description: Wordpress using postgressql
	Text Domain: wppg
	Domain Path: /languages/
	License: GPL
 */

defined( 'ABSPATH' ) or die();

add_action( 'admin_menu', 'wppgplugin_admin_options' );
function wppgplugin_admin_options() {
	add_options_page( 'Myplugin', 'WPPG', 'manage_options', 'wppg.php', 'wppgplugin_admin_submenu' );
}

function wppgplugin_admin_submenu() {
	?>
		<form>
			<input type="submit" name="submit" class="btn-primary" value="submit">	
		</form>
	<?php
}

// - buat sub menu wppg di menu settings
// - buat tombol change database to postgressql 