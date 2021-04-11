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
