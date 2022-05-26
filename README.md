## Mācībspēku slodzes aprēķināšana

Studiju projekts


### Lokālās izstrādes vides sagatavošana

Ja ir uzstādīts [lando.dev](https://lando.dev/) programmodrošinājums (docker), tad ierastās Laravel uzstādīšanas instrukcijas var izpildīt ar lando.dev palīdzību:

`lando start`

`lando composer install`

`cp .\.env.example .env`

`lando php artisan migrate --seed`

etc..

Ir iespējams izmantot arī Vagrant -> [Homestead](https://laravel.com/docs/9.x/homestead)
