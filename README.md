2 kroki po docker-compose up -d do wykonania w dockerze:

# krok1:

- `php artisan migrate`
- `php artisan migrate --path="database/migrations/tenant/"`



# krok2 

jak w doc: https://tenancyforlaravel.com/docs/v3/quickstart#creating-tenants (istotne tenant1/tenant2 bo to są subdomeny do dodania do hosts)
`php artisan tinker`
```
$tenant1 = App\Models\Tenant::create(['id' => 'tenant1']);
$tenant1->domains()->create(['domain' => 'tenant1.localhost']);

$tenant2 = App\Models\Tenant::create(['id' => 'tenant2']);
$tenant2->domains()->create(['domain' => 'tenant2.localhost']);
```

możesz dodać do dowolnie utworzonej bazy danych do users w bazach tenant_*

W /etc/hosts musisz zdefiniować taki wpis:

`127.0.0.1       tenant1.localhost main.localhost tenant2.localhost`

wejście na url powinno pokazać laravelowy home page z listą użytkowników.

Tutaj tworzysz użytkownika administracyjnego: `php artisan make:filament-user`
