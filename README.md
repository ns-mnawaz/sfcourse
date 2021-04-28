Symfony App
--------------
```bash
$ composer install
$ symfony server:start
```

Migrations 
--------------
```bash 
$ php bin/console doctrine:migrations:diff
$ php bin/console doctrine:schema:validate
$ bin/console doctrine:migration:migrate -n
```

Command
--------------
```bash
$ php bin/console app:create-user user12 passwrod admin,user
$ symfony php bin/phpunit tests/unit/
$ symfony php bin/phpunit tests/feature/
$ symfony php bin/phpunit tests/integration/
$ vendor/bin/behat
```
