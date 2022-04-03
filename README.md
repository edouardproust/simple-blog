# PHP sandbox

A site that gathers my first PHP exercises, as part of my training as a PHP developer.

Includes a blog with admin panel to add, edit or delete posts. Add a thumbnial to your posts.

## Technologies
- PHP (no framework)
- Bootstrap 5

## Deployment

1. Transfer files by FTP or SSH
2. Create a **config.php** file and copy **config.dev.php** file content in it. Update its content to your needs (database connexion informations, set `APP_ENV='prod'`, etc.)
3. Create database: import **data/db_create.sql** in your database manager (PhpMyAdmin, Adminer,...).
4. (Optional) Add fixtures (fill database with dumb data): import **data/db_fixtures.sql** in your database manager.