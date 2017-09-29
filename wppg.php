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
	if (!empty($_POST)){
		if(!empty($_POST['pg_action']) && $_POST['pg_action']=='move_pg4wp'){
			$src = plugin_dir_path( __FILE__ ).'pg4wp';
			$dst = explode('plugins', $src);
			$dst = $dst[0].'pg4wp';
			recurse_copy($src, $dst);
			echo "Copy folder from $src to $dst <br>";

			$src = plugin_dir_path( __FILE__ ).'pg4wp/db.php';
			$dst = explode('plugins', $src);
			$dst = $dst[0].'db.php';
			recurse_copy($src, $dst);
			echo "Copy file from $src to $dst <br>";
		}
	}
	?> 	
		<style>
			#wppg-from {
				margin-top: 50px;
			}
		</style>
		<form method="post" id="wppg-from">
			<h1>WPPG</h1>
			<p>Click this button for install this wordpress using postgressql database.</p>
			<input type="hidden" name="pg_action" value="move_pg4wp">
			<input type="submit" name="submit" class="button button-primary" value="change database to postgressql">	
		</form>
	<?php
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src); echo '123';
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 

// SUDAH DIKERJAKAN
// - buat sub menu wppg di menu settings
// - buat tombol change database to postgressql 
// - copy folder pg4wp ke ../wp-content/pg4wp

// BELUM DIKERJAKAN
// - copy file ../pg4wp/db.php ke ../wp-content/db.php
// - buat tombol disable database postgressql
// - ketika diklik, hapus folder ../wp-content/pg4wp dam file ../wp-content/db.php