<?php

class wpdb3 extends wpdb2{
	public function __construct( $dbuser, $dbpassword, $dbname, $dbhost ) {
		parent::__construct($dbuser, $dbpassword, $dbname, $dbhost);
	}
	function set_sql_mode( $modes = array() ){
		return;
	}
	protected function get_table_charset( $table ) {
		return 'utf8';
	}
	public function get_col_charset( $table, $column ) {
		return 'utf8';
	}
}