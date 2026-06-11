#!/bin/bash

echo "🚀 Starting platform initialization..."

# 1. Navigate to the deployment directory
cd /home/site/wwwroot

# 2. Install PHP dependencies (Optimized for production)
echo "📦 Installing Composer dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# 3. Compile the Frontend (Tailwind CSS + DaisyUI) right inside Azure
if [ -f "package.json" ]; then
    echo "🎨 package.json detected. Compiling assets with Vite inside Azure..."
    npm install
    npm run build
fi

# 4. Secure Nginx Configuration (Apply custom routing for Laravel's public directory)
if [ -f /home/site/wwwroot/default ]; then
    echo "🌐 Applying custom Nginx configuration..."
    cp /home/site/wwwroot/default /etc/nginx/sites-available/default
    ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default
    service nginx reload || true
else
    echo "⚠️ Note: Using Azure's default Nginx configuration."
fi

# 5. Optimize Laravel Cache Layers
echo "⚡ Optimizing Laravel caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Structural Migrations on Azure SQL
echo "🗄️ Running migrations on Azure SQL (strategicengine)..."
php artisan migrate --force

echo "✅ Deployment completed successfully!"
