# Description

Drupal Developer Days Sevilla 2017 powered by Drupal 8.x
This project is based on the 
"[Composer template for Drupal projects](https://github.com/drupal-composer/drupal-project)" 
 

# Requirements

The following is required to install and run the Customer Portal:

- Git;
- Web Server (Apache 2.4.x);
- Database (MySQL 5.5.3+);
- PHP 5.5.9+;
- Composer 1.x;
- Drush 8.x;

Check the details at https://www.drupal.org/docs/7/system-requirements/overview

# Install (*nix)

Download the source code

	git clone [repository] DrupalDevDaysSevilla

Change directory:

	cd DrupalDevDaysSevilla

Fetch dependencies:

	composer install

Change directory:

	cd web

Review the database connection settings:

	vim +222 sites/default/settings.php

Install Drupal:

	drush -y site-install --config-dir=../config/sync

Additionally you can specify the password for the admin user adding: 
"--account-pass=admin"
# Synchronize

From the project directory (under web), pull the changes:

	git checkout master
	git pull --rebase origin master

Fetch dependencies:

	composer install

Import Drupal configurations:

	drush config-import sync

Apply any database updates required:
  
	drush updatedb --entity-updates
