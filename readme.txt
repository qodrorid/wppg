=== WPPG ===
Contributors: QODR (http://qodr.or.id/)
Tags: database, postgresql, PostgreSQL, postgres, mysql
Donate link: https://www.paypal.me/agusnurwanto/
Requires at least: 2.9.2
Tested up to: 4.9.0
Requires PHP: > 5.0
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

WPPG is a special plugin enabling WordPress to be used with a PostgreSQL database. Redevelop from PG4WP plugin http://wordpress.org/plugins/postgresql-for-wordpress/

== Description ==
WPPG is a special plugin enabling WordPress to be used with a PostgreSQL database. Redevelop from [PG4WP plugin](http://wordpress.org/plugins/postgresql-for-wordpress/).

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

== Screenshots ==
1. /assets/screenshot-1.png
2. /assets/screenshot-2.png

== Upgrade Notice ==
= 1.0 =
Initial stable release