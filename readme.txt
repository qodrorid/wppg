=== WPPG ===
Contributors: QODR (http://qodr.or.id/)
Donate link: https://www.paypal.me/agusnurwanto/
Tags: database, postgresql, PostgreSQL, postgres, mysql
Requires at least: 2.9.2
Tested up to: 4.8.3
Stable tag: 1.0.0
License: GPLv2 or later

WPPG is a special 'plugin' enabling WordPress to be used with a PostgreSQL database. Redevelop from PG4WP plugin http://wordpress.org/plugins/postgresql-for-wordpress/

== Description ==

WPPG is a special 'plugin' enabling WordPress to be used with a PostgreSQL database. Redevelop from [PG4WP plugin](http://wordpress.org/plugins/postgresql-for-wordpress/).

Github: [https://github.com/qodrorid/wppg](https://github.com/qodrorid/wppg)

WPPG gives you the possibility to install and use WordPress with a PostgreSQL database as a backend.
It works by replacing calls to MySQL specific functions with generic calls that maps them to another database functions and rewriting SQL queries on the fly when needed.

If you want to use this plugin, you should be aware of the following :
- WordPress with WPPG is expected to be slower than the original WordPress with MySQL because WPPG does much SQL rewriting for any page view
- Some WordPress plugins should work 'out of the box' but many plugins won't because they would need specific code in WPPG

You shouldn't expect any plugin specific code to be integrated into WPPG except for plugins shipped with WordPress itself (such as Akismet).

== Installation ==

- Install and active postgress db in Settings > WPPG > change database to Postgressql
- Create database and user in your Postgressql
	- open your terminal in linux
	- sudo su - postgress
	- psql
	- create database your_database;
	- create user your_user with password 'your_password';
	- grant all privileges on database your_database to your_user;
	- \q for exit
- Update your wp-config.php file

== Uninstall ==

- Remove file wp-content/db.php
- Remove folder wp-content/pg4wp

== Frequently Asked Questions ==

== Screenshots ==

1. /assets/screenshot-1.png
2. /assets/screenshot-2.png

== Changelog ==

= 1.0 =
Initial stable release

== License ==
WPPG is provided "as-is" with no warranty in the hope it can be useful.

WPPG is licensed under the [GNU GPL](http://www.gnu.org/licenses/gpl.html "GNU GPL") v2 or any newer version at your choice.
