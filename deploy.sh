#!/bin/bash

# SCW-APP Deployment Script
# Run this on production server after pulling latest code

echo "🚀 Starting deployment..."

# Pull latest code
echo "📥 Pulling latest code..."
git pull origin main

# Install dependencies
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader

# Run database migrations
echo "🗄️  Running migrations..."
php artisan migrate --force 2>/dev/null || true

# Fix storage permissions (for user uploads only)
echo "🔐 Setting storage permissions..."
chmod -R 775 storage 2>/dev/null || true
chmod -R 775 bootstrap/cache 2>/dev/null || true

# Create storage link for user-uploaded files (speaker logos, etc.)
echo "📁 Creating storage symlink for uploads..."
rm -rf public/storage 2>/dev/null || true
php artisan storage:link 2>/dev/null || true

# Set permissions for public/images (static assets)
echo "📷 Setting permissions for static images..."
chmod -R 755 public/images 2>/dev/null || true
find public/images -type f -exec chmod 644 {} \; 2>/dev/null || true



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

echo ""
echo "Next steps:"
echo "1. Verify routes: php artisan route:list | grep strategic_committees"
echo "2. Test the application"
echo "3. Check logs: tail -f storage/logs/laravel.log"
