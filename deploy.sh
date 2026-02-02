#!/bin/bash

# SCW-APP Deployment Script
# Run this on production server after pulling latest code

echo "🚀 Starting deployment..."



# Run database migrations
echo "🗄️  Running migrations..."
php artisan migrate --force

# Fix storage permissions (CRITICAL for images)
echo "🔐 Setting storage permissions..."
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod -R 755 storage/app/public
find storage/app/public -type f -exec chmod 644 {} \;

# Create storage link for uploads
echo "📁 Creating storage symlink..."
rm -f public/storage
php artisan storage:link

# Set web server ownership
echo "👤 Setting web server ownership..."
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache
sudo chown -R www-data:www-data public/storage

# Clear all caches
echo "🧹 Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Re-cache for production
echo "⚡ Caching for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Final optimization
echo "🎯 Optimizing application..."
php artisan optimize

echo "✅ Deployment complete!"
echo ""
echo "Next steps:"
echo "1. Verify routes: php artisan route:list | grep strategic_committees"
echo "2. Test the application"
echo "3. Check logs: tail -f storage/logs/laravel.log"
