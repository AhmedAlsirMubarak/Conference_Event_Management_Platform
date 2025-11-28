# Production Deployment Guide

## Current Issues

The deployment on saudiclimateweek.com is showing two errors:

1. **MissingAppKeyException**: No application encryption key has been specified
2. **Symfony Error**: Call to undefined function `highlight_file()`

## Solution

### Step 1: Generate APP_KEY (Critical)

SSH into your Cloudways server and run:

```bash
cd /home/782512.cloudwaysapps.com/fjnwswnvyt/public_html
php artisan key:generate
```

This will generate and add the `APP_KEY` to your `.env` file on production.

### Step 2: Clear Caches

After generating the key, clear all caches:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 3: Verify Environment Settings

Ensure your `.env` file on production contains:

```env
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_URL=https://saudiclimateweek.com
```

### Step 4: Install Production Dependencies

Ensure vendor dependencies are installed without dev packages:

```bash
composer install --no-dev --optimize-autoloader
```

### Step 5: Run Migrations (if needed)

If this is a fresh deployment:

```bash
php artisan migrate --force
```

## Production Checklist

-   [ ] APP_KEY generated and in .env
-   [ ] APP_DEBUG=false
-   [ ] APP_ENV=production
-   [ ] All caches cleared
-   [ ] Composer dependencies installed (--no-dev)
-   [ ] Database migrations run
-   [ ] Application loads without errors

## Testing

After deployment, verify by visiting: https://saudiclimateweek.com/

## Notes

-   The `highlight_file()` error is a cascading error from the missing APP_KEY
-   Once APP_KEY is set and config is cached, all errors should resolve
-   Keep `APP_DEBUG=false` in production for security
