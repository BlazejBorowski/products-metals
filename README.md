## Aby uruchomić projekt, upewnij się, że masz zainstalowane następujące oprogramowanie:

- **PHP 8.3.12 lub nowszy**
- **Node.js v20.15.0 lub nowszy**
- **Composer**
- **NPM**

## Uruchomienie:

1. Skopiuj .env.example do .env
2. composer install
3. npm install
4. php artisan key:generate
5. php artisan migrate:fresh -seed
6. composer run dev
