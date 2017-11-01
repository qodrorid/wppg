# wppg

Redevelop from PG4WP plugin http://wordpress.org/plugins/postgresql-for-wordpress/

Installation

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

How to uninstall WPPG

- Remove file wp-content/db.php
- Remove folder wp-content/pg4wp