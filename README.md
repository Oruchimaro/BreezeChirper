# Breez install

[Tutorial Link](https://www.youtube.com/watch?v=cVWO2TW9vHw) 1:06

```
    composer require laravel/breeze --dev

```

## select a frontend

```
    php artisan breeze:install blade
    php artisan breeze:install livewire
    php artisan breeze:install inertia
```

## Setup

```bash
    git clone git@github.com:Oruchimaro/BreezeChirper.git

    cd BreezeChirper

    cp .env.example .env # edit credentials (DB host for sail must be mysql)

    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs

    sail up -d # Run server

    sail artisan key:generate

    sail artisan migrate --seed

    sail npm install

    sail npm run dev # hot reload and compiling assets for frontend

    sail test # Run the tests
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
