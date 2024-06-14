## Steps to reproduce

1. Run migrations and seed the database
```
php artisan migrate --seed
```

2. Login to the admin panel with route `/admin/login` and use the email `admin@test.com` and password `password` as the credentials
3. After login, navigate to `Users` and view one record, then click `Create JO` button to make the exception appear.
