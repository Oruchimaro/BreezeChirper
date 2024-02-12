# Breez install

[Tutorial Link](https://www.youtube.com/watch?v=cVWO2TW9vHw)


```
    composer require laravel/breeze --dev

```

## select a frontend

```
    php artisan breeze:install blade
    php artisan breeze:install livewire
    php artisan breeze:install inertia
```

### URLS

#### Sail

    - App : localhost:8181
    - mailpit : localhost:8025
    - mysql :
        - host : localhost
        - port : 3311
        - user : sail
        - password : password

    - Translation UI : localhost:8181/translations


### Docs

[Setting up the project](./Docs/SETUP.md)

[Laravel Translations Package Install](./Docs/TRANSLATION.md)
