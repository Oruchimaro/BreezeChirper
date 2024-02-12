# Translation

## Links
[Tutorial Link](https://www.youtube.com/watch?v=FsgdjUK9b5Q)
[Package Link](https://github.com/MohmmedAshraf/laravel-translations)

## How To Add To Project

First install the package with this command : 

```
    composer require outhebox/laravel-translations --with-all-dependencies
```

Then run the command to install the transaltor and migrate the tables :

```
    php artisan translations:install
```

Now import your tranlsation files using this command :

```
    php artisan translations:import
```

For Production Env we need to create a owner user first, for that we can use this command :
```
    php artisan translations:contributor
```

You can access the [Translation UI](<YOUR APP URL>/translations) . Login with the user u have created and see the languages.
You can add a language and add the translations for it (custom or from google translate) and then publish it so it can be viewed.
