README
======

This directory should be used to place project specfic documentation including
but not limited to project notes, generated API/phpdoc documentation, or
manual files generated or hand written.  Ideally, this directory would remain
in your development environment only and should not be deployed with your
application to it's final production location.


Setting Up Your VHOST
=====================

The following is a sample VHOST you might want to consider for your project.

<VirtualHost *:80>
   DocumentRoot "/var/www/ZF/zendframework1/Project/zf1_project/public"
   ServerName zf1_project.local

   # This should be omitted in the production environment
   SetEnv APPLICATION_ENV development

   <Directory "/var/www/ZF/zendframework1/Project/zf1_project/public">
       Options Indexes MultiViews FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>

</VirtualHost>

Database connection:
===================
resources.db.adapter = "mysqli"
resources.db.params.dbname = "zf_project"
resources.db.params.host = "127.0.0.1"
;resources.db.params.port = "8889"
resources.db.params.username = "root"
resources.db.params.password = ""
resources.db.isDefaultTableAdapter = true

Change the above values as per your configuration in "app/configs/application.ini" file.

=> Import sql file for database (zf_project.sql), otherwise you may get database related error.

Some url overview
=================
index.php => Home or Landing page
index.php/users => show list of users with pagination with edit and delete functionality
index.php/user/index/edit/id/1 => Editing user (where 1 represent id of user)
index.php/user/index/delete/id/1 => Delete the user
index.php/register => Registering new user

Note :: index.php is optional