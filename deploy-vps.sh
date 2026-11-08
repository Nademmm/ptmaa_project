#!/usr/bin/env bash
# ==============================================================================
# AUTO-DEPLOY SCRIPT — PT. MULTI ABADI AKSANA (Ubuntu 24.04 LTS / SumoPod VPS)
# ==============================================================================
set -e

DOMAIN_OR_IP="${1:-_}"
APP_DIR="/var/www/ptmaa_project"
REPO_URL="https://github.com/Nademmm/ptmaa_project.git"

echo "=================================================================="
echo " [1/8] Update Ubuntu 24.04 & Install Paket Dasar..."
echo "=================================================================="
apt update && apt upgrade -y
apt install -y software-properties-common curl git unzip ufw nginx sqlite3 certbot python3-certbot-nginx

echo "=================================================================="
echo " [2/8] Install PHP 8.3 & Ekstensi Wajib Laravel + Filament..."
echo "=================================================================="
apt install -y php8.3-fpm php8.3-cli php8.3-common php8.3-sqlite3 php8.3-mysql \
    php8.3-gd php8.3-intl php8.3-mbstring php8.3-xml php8.3-zip php8.3-curl php8.3-bcmath

echo "=================================================================="
echo " [3/8] Install Composer & Node.js 20 LTS..."
echo "=================================================================="
if ! command -v composer &> /dev/null; then
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi

if ! command -v node &> /dev/null; then
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
    apt install -y nodejs
fi

echo "=================================================================="
echo " [4/8] Clone / Update Repository PT. Multi Abadi Aksana..."
echo "=================================================================="
if [ ! -d "$APP_DIR" ]; then
    git clone "$REPO_URL" "$APP_DIR"
else
    cd "$APP_DIR"
    git pull origin main
fi

cd "$APP_DIR"

echo "=================================================================="
echo " [5/8] Setup Environment (.env), Database SQLite & Build Assets..."
echo "=================================================================="
if [ ! -f .env ]; then
    cp .env.example .env
fi

sed -i 's/APP_ENV=.*/APP_ENV=production/' .env
sed -i 's/APP_DEBUG=.*/APP_DEBUG=false/' .env
if [ "$DOMAIN_OR_IP" != "_" ]; then
    sed -i "s|APP_URL=.*|APP_URL=https://${DOMAIN_OR_IP}|" .env
fi

if ! grep -q "ADMIN_PANEL_PATH=" .env; then
    echo "ADMIN_PANEL_PATH=portal-internal-maa-9x7k2v" >> .env
fi

touch database/database.sqlite

COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader --no-interaction
php artisan key:generate --force
php artisan storage:link --force || true
php artisan migrate --force
php artisan db:seed --force

npm install
npm run build

php artisan optimize

echo "=================================================================="
echo " [6/8] Set Permission Folder (www-data)..."
echo "=================================================================="
chown -R www-data:www-data "$APP_DIR"
chmod -R 775 "$APP_DIR/storage" "$APP_DIR/bootstrap/cache" "$APP_DIR/database"
chmod 664 "$APP_DIR/database/database.sqlite"

echo "=================================================================="
echo " [7/8] Konfigurasi Nginx + Gzip + Cache Header (Lighthouse 100)..."
echo "=================================================================="
PHP_SOCK=$(find /run/php/ -name "php*-fpm.sock" | head -n 1)
if [ -z "$PHP_SOCK" ]; then
    PHP_SOCK="/run/php/php8.3-fpm.sock"
fi

cat > /etc/nginx/sites-available/ptmaa <<EOF
server {
    listen 80;
    listen [::]:80;
    server_name ${DOMAIN_OR_IP};
    root ${APP_DIR}/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    client_max_body_size 25M;

    index index.php;
    charset utf-8;

    # Gzip Compression untuk Skor Lighthouse 100
    gzip on;
    gzip_vary on;
    gzip_proxied any;
    gzip_comp_level 6;
    gzip_types text/plain text/css text/xml application/json application/javascript application/rss+xml application/atom+xml image/svg+xml;

    # Long-term Cache untuk Gambar WebP, Font WOFF2 & Vite Assets
    location ~* \.(webp|jpg|jpeg|png|gif|ico|css|js|woff2)$ {
        expires 365d;
        add_header Cache-Control "public, immutable";
        access_log off;
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:${PHP_SOCK};
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
EOF

ln -sf /etc/nginx/sites-available/ptmaa /etc/nginx/sites-enabled/ptmaa
rm -f /etc/nginx/sites-enabled/default
nginx -t
systemctl restart php8.3-fpm || systemctl restart php8.4-fpm || true
systemctl restart nginx

echo "=================================================================="
echo " [8/8] Konfigurasi Firewall UFW..."
echo "=================================================================="
ufw allow OpenSSH
ufw allow 'Nginx Full'
ufw --force enable

echo "=================================================================="
echo " DEPLOYMENT SELESAI!"
echo " Website dapat diakses di: http://${DOMAIN_OR_IP}"
echo " Panel Admin Rahasia     : http://${DOMAIN_OR_IP}/portal-internal-maa-9x7k2v"
echo "=================================================================="

