# Setup the project 

## Using Sail

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
