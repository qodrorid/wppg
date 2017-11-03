<?php
/*
	Plugin Name: WPPG
	Plugin URI: https://wordpress.org/plugins/wppg/
	Version: 1.0.0
	Author: Qodr Team
	Author URI: http://qodr.or.id/
	Description: Wordpress using postgressql
	Text Domain: wppg
	Domain Path: /languages/
	License:      GPL2
	License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) or die();

add_action( 'admin_menu', 'wppgplugin_admin_options' );
function wppgplugin_admin_options() {
	add_options_page( 'WPPG', 'WPPG', 'manage_options', 'wppg.php', 'wppgplugin_admin_submenu' );
}

function wppgplugin_admin_submenu() {
	$wppg = false;
	$wpmaria = false;
	?>
		<style>
			#wppg-from {
				margin-top: 20px;
			}
		</style>
		<h1>WPPG</h1>
		<form method="post" id="wppg-from">
		<?php
		if (
			!empty($_POST) 
			&& !empty( $_POST['_wpnonce'] )
			&& wp_verify_nonce( $_POST['_wpnonce'], 'wppg-action-form' )
		){
			$src_pg4wp = plugin_dir_path( __FILE__ ).'pg4wp';
			$dst = explode('plugins', $src_pg4wp);
			$dst_pg4wp = $dst[0].'pg4wp';

			$src_db = plugin_dir_path( __FILE__ ).'pg4wp/db.php';
			$dst = explode('plugins', $src_db);
			$dst_db = $dst[0].'db.php';
			if(!empty($_POST['pg_action']) && $_POST['pg_action']=='move_pg4wp'){
				echo "<div class='notice notice-success'>Success copy folder from $src_pg4wp to $dst_pg4wp</div>";
				wppg_recurse_copy($src_pg4wp, $dst_pg4wp);

				echo "<div class='notice notice-success'>Success copy file from $src_db to $dst_db</div>";
				echo "<div class='notice notice-success'>Goto this <a target='blank' href='".plugins_url( 'README.md', __FILE__ )."'>README.md</a> for more instruction installation and click <a href='".site_url()."'>refresh</a> for setting your wordpress with postgressql.</div>";
				copy($src_db, $dst_db);
				$wppg = true;
			}else if(!empty($_POST['pg_action']) && $_POST['pg_action']=='move_mysql'){
				echo "<div class='notice notice-success is-dismissible'>Delete folder $dst_pg4wp</div>";
				wppg_deleteDir($dst_pg4wp);

				echo "<div class='notice notice-success is-dismissible'>Delete file $dst_db</div>";
				unlink($dst_db);
				$wpmaria = true;
			}
		}
		?>
			<?php wp_nonce_field( 'wppg-action-form' ); ?>
			<?php
				if( ((defined('DB_DRIVER') && DB_DRIVER == 'pgsql') && empty($wpmaria)) || !empty($wppg)){
			?>
			    	<p>This wordpress is currently using Postgressql database.</p>
					<input type="hidden" name="pg_action" value="move_mysql">
					<input onclick="return confirm('Are you realy to using MSQL/Mariadb?');" type="submit" name="submit" class="button button-primary" value="change database to MYSQL/Mariadb">
			<?php
				}else{
			?>
					<p>Click this button for install this wordpress using Postgressql database.</p>
					<input type="hidden" name="pg_action" value="move_pg4wp">
					<input onclick="return confirm('Are you realy to using Postgressql?');" type="submit" name="submit" class="button button-primary" value="change database to Postgressql">
			<?php } ?>
		</form>
	<?php
}

function wppg_recurse_copy($src,$dst) { 
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

function wppg_deleteDir($dirPath) {
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