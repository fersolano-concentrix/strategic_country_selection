#!/bin/bash

echo "🚀 Iniciando inicialización de la plataforma..."

# 1. Moverse al directorio del despliegue
cd /home/site/wwwroot

# 2. Instalar dependencias de PHP (Optimizadas para producción)
echo "📦 Instalando dependencias de Composer..."
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# 3. Compilar el Frontend (Tailwind CSS + DaisyUI Fantasy Theme)
if [ -f "package.json" ]; then
    echo "🎨 Detectado package.json. Compilando activos con Vite..."
    npm install
    npm run build
fi

# 4. Configuración Segura de Nginx (Mover tu archivo default si existe)
if [ -f /home/site/wwwroot/default ]; then
    echo "🌐 Aplicando configuración personalizada de Nginx..."
    cp /home/site/wwwroot/default /etc/nginx/sites-available/default
    service nginx reload || true
else
    echo "⚠️ Nota: Usando la configuración por defecto de Nginx de Azure."
fi

# 5. Optimización de Capas de Caché de Laravel
echo "⚡ Optimizando cachés de Laravel..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Migraciones Estructurales en Azure SQL
echo "🗄️ Ejecutando migraciones en Azure SQL (strategicengine)..."
php artisan migrate --force

echo "✅ ¡Lanzamiento completado con éxito!"