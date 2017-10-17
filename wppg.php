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
	add_options_page( 'WPPG', 'WPPG', 'manage_options', 'wppg.php', 'wppgplugin_admin_submenu' );
}

function wppgplugin_admin_submenu() {
	if (!empty($_POST)){
		$src_pg4wp = plugin_dir_path( __FILE__ ).'pg4wp';
		$dst = explode('plugins', $src_pg4wp);
		$dst_pg4wp = $dst[0].'pg4wp';

		$src_db = plugin_dir_path( __FILE__ ).'pg4wp/db.php';
		$dst = explode('plugins', $src_db);
		$dst_db = $dst[0].'db.php';
		if(!empty($_POST['pg_action']) && $_POST['pg_action']=='move_pg4wp'){
			echo "Copy folder from $src_pg4wp to $dst_pg4wp <br>";
			recurse_copy($src_pg4wp, $dst_pg4wp);

			echo "Copy file from $src_db to $dst_db <br>";
			copy($src_db, $dst_db);
		}else if(!empty($_POST['pg_action']) && $_POST['pg_action']=='move_mysql'){
			echo "Delete folder $dst_pg4wp <br>";
			deleteDir($dst_pg4wp);

			echo "Delete file $dst_db <br>";
			unlink($dst_db);
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
			<?php
				if(defined('DB_DRIVER')){
				    if(DB_DRIVER == 'pgsql'){
			?>
				    	<p>This wordpress is currently using Postgressql database.</p>
						<input type="hidden" name="pg_action" value="move_mysql">
						<input onclick="return confirm('Are you realy to using MSQL/Mariadb?');" type="submit" name="submit" class="button button-primary" value="change database to MYSQL/Mariadb">
			<?php
				    }
				}else{
			?>
					<p>Click this button for install this wordpress using Postgressql database.</p>
					<input type="hidden" name="pg_action" value="move_pg4wp">
					<input onclick="return confirm('Are you realy to using Postgressql?');" type="submit" name="submit" class="button button-primary" value="change database to Postgressql">
			<?php } ?>
		</form>
	<?php
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src);
    mkdir($dst); 
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

function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}