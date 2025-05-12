# shop
🛍️ Laravel Shop API | REST backend za products/variants| UUID | Pagination | Rate limiting

📦 E-Commerce API Backend
Overview
A robust Laravel API for managing products, variants, and images. Designed to simulate a third-party e-commerce system with daily updates via seeders.

Key Features
RESTful API endpoints

UUID primary keys

Rate limiting (3 requests/minute)

Pagination support

Polymorphic image relationships

Configurable data seeding

Requirements
PHP 8.2+

MySQL 8.0+

Composer 2.0+

Installation

git clone https://github.com/ahmedturbe/shop.git
cd shop
composer install

php artisan key:generate
Database Setup
Create MySQL database shop

Configure .env:

ini
DB_HOST=127.0.0.1
DB_DATABASE=shop
DB_USERNAME=root
DB_PASSWORD=
Run migrations:

bash
php artisan migrate --seed
Usage
Generate test data:

bash
php artisan shop:seed --products=50 --variants=10 --images=5
Start development server:

bash
php artisan serve
API Endpoints
GET /api/products - Paginated product list

GET /api/products/{uuid} - Product details

Configuration
Environment variables:

ini
SHOP_API_PER_PAGE=3
APP_DEBUG=true
