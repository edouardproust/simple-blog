# PHP sandbox

A site that gathers my first PHP exercises, as part of my training as a PHP developer.

Includes a blog with admin panel to add, edit or delete posts. Add a thumbnial to your posts.

## Technologies
- PHP (no framework)
- Bootstrap 5

## Deployment

1. Transfer files by FTP or SSH
2. Create a **config.php** file and copy **config.dev.php** file content in it. And then update database connexion and admin credentials to your needs (`const DB_` and `const ADMIN_`) and set `const APP_ENV='prod'`.
3. Create databdatabase tables: import **data/db_tables.sql** in your database manager (PhpMyAdmin, Adminer,...). You must have a database previously created (if not, update the `DATABASE_NAME` variable in **data/db_create.sql** and then import this file).
4. (Optional) Add fixtures (fill database with dumb data): import **data/db_fixtures.sql** in your database manager.