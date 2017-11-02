<?php

defined( 'ABSPATH' ) or die();
/**
 * @package PostgreSQL_For_Wordpress
 * @version $Id$
 * @author	Hawk__, www.hawkix.net
 */

/**
* Provides a driver for MySQL
* This file remaps all wppg_sql_* calls to mysql_* original name
*/
	function wppg_sql_num_rows($result)
		{ return mysql_num_rows($result); }
	function wppg_sql_numrows($result)
		{ return mysql_num_rows($result); }
	function wppg_sql_num_fields($result)
		{ return mysql_num_fields($result); }
	function wppg_sql_fetch_field($result)
		{ return mysql_fetch_field($result); }
	function wppg_sql_fetch_object($result)
		{ return mysql_fetch_object($result); }
	function wppg_sql_free_result($result)
		{ return mysql_free_result($result); }
	function wppg_sql_affected_rows()
		{ return mysql_affected_rows(); }
	function wppg_sql_fetch_row($result)
		{ return mysql_fetch_row($result); }
	function wppg_sql_data_seek($result, $offset)
		{ return mysql_data_seek( $result, $offset ); }
	function wppg_sql_error()
		{ return mysql_error();}
	function wppg_sql_fetch_assoc($result)
		{ return mysql_fetch_assoc($result); }
	function wppg_sql_escape_string($s)
		{ return mysql_real_escape_string($s); }
	function wppg_sql_real_escape_string($s,$c=NULL)
		{ return mysql_real_escape_string($s,$c); }
	function wppg_sql_get_server_info()
		{ return mysql_get_server_info(); }
	function wppg_sql_result($result, $i, $fieldname)
		{ return mysql_result($result, $i, $fieldname); }
	function wppg_sql_connect($dbserver, $dbuser, $dbpass)
		{ return mysql_connect($dbserver, $dbuser, $dbpass); }
	function wppg_sql_fetch_array($result)
		{ return mysql_fetch_array($result); }
	function wppg_sql_select_db($dbname, $connection_id)
		{ return mysql_select_db($dbname, $connection_id); }
	function wppg_sql_query($sql)
		{ return mysql_query($sql); }
	function wppg_sql_insert_id($table)
		{ return mysql_insert_id($table); }
