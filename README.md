## Mācībspēku slodzes aprēķināšana

Studiju projekts. Praktiskā daļa.

### Iespējas

* Datu imports (moduļiem, lietotājiem)
* Lietotāju pārvaldība
* Mācību plāna veidošana
* u.t.t.

### Tehniskie dati

Tiek izmantots Laravel, Livewire, TailwindCSS, AlpineJS un daudz dažādas OpenSource pakotnes.

### Lokālās izstrādes vides sagatavošana

Ja ir uzstādīts [lando.dev](https://lando.dev/) programmodrošinājums (docker), tad ierastās Laravel uzstādīšanas instrukcijas var izpildīt ar lando.dev palīdzību:

`lando start`

`cp .env.example .env`

`lando composer install`

`lando php artisan migrate --seed`

`lando php artisan key:generate`

etc..

Ir iespējams izmantot arī Vagrant -> [Homestead](https://laravel.com/docs/9.x/homestead) vai kādu citu risinājumu.

#### Autorizācija ar MS 365

Nepieciešams aizpildīt `.env` datus ar nepieciešamo informāciju. 

```dotenv
# O365 / MICROSOFT AZURE AD LOGIN
GRAPH_KEY=x
GRAPH_SECRET=x
GRAPH_TENANT_ID=x
GRAPH_REDIRECT_URI=http://localhost:8000/callback
```

#### Dokumentācija un ekrānšāviņi

Ja būs pieejama precīzāka informācija par projektu, tad to varēs meklēt attiecīgajā [GitHub wiki](https://github.com/IvarsSaudinis/slodzes/wiki)
