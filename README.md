# wppg

Redevelop from PG4WP plugin http://wordpress.org/plugins/postgresql-for-wordpress/

Installation

- Install and active postgress db in Settings > WPPG > change database to Postgressql
- Need update code in file wp-include/load.php line: 399 when db.php not loaded in wordpress from "require_once( WP_CONTENT_DIR . '/db.php' );" to "include( WP_CONTENT_DIR . '/db.php' );"

How to uninstall WPPG

- Remove file wp-content/db.php
- Remove folder wp-content/pg4wp