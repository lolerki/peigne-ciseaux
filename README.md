# Peigne & ciseaux

Peigne & ciseaux is a website proposing a solution of online appointment setting for the hairdressers independent.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software.

```
Composer
PHP
```

### Installing

```
cp app/config/parameters.yml-dist app/config/parameters.yml
# configure app/config/parameters.yml

composer install
php bin/console doctrine:database:create
php bin/console doctrine:shemas:update --force
php bin/console assets:install web
```

### Run a web server

Run a web server with:

```sh
php bin/console server:run
```

Then the website is available at `http://localhost:8000/`.

## Built With

* [Symfony](https://symfony.com/doc/current/index.html) - The web framework used

## Authors

* **Virgil Moreau** - *Initial work* 

See also the list of [contributors](https://github.com/lolerki/peigne-ciseaux/contributors) who participated in this project.

