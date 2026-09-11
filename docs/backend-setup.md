# Backend Setup Guide - Laravel 12

This guide walks through setting up the Laravel 12 backend for the E-Commerce Platform.

## Prerequisites

- PHP 8.3+
- Composer
- MySQL 8.0+
- Redis (optional, for caching/queues)

## Installation Steps

### 1. Create Laravel Project

```bash
cd backend
composer create-project laravel/laravel . --remove-vcs
```

### 2. Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env`:
```env
APP_NAME="E-Commerce Platform"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=cookie

SANCTUM_STATEFUL_DOMAINS=localhost:5173
```

### 3. Required Packages

```bash
composer require laravel/sanctum
composer require spatie/laravel-permission
composer require spatie/laravel-translatable
composer require laravel/telescope --dev
```

### 4. Publish Configurations

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

### 5. Database Setup

```bash
php artisan migrate
php artisan db:seed
```

## Directory Structure

```
app/
├── Enums/              # Application enums
├── Events/             # Application events
├── Exceptions/         # Custom exceptions
├── Http/
│   ├── Controllers/
│   │   ├── Api/
│   │   │   ├── V1/
│   │   │   │   ├── Auth/
│   │   │   │   ├── Products/
│   │   │   │   ├── Orders/
│   │   │   │   ├── Cart/
│   │   │   │   ├── Wishlist/
│   │   │   │   ├── Admin/
│   │   │   │   └── Customer/
│   ├── Requests/       # Form requests
│   ├── Resources/      # API resources
│   └── Middleware/
├── Jobs/               # Queued jobs
├── Listeners/          # Event listeners
├── Mail/               # Mailables
├── Models/
│   ├── User.php
│   ├── Product.php
│   ├── Order.php
│   └── ...
├── Notifications/      # Notification classes
├── Policies/           # Authorization policies
├── Services/           # Business logic services
├── Traits/             # Reusable traits
└── Actions/            # Action classes

database/
├── factories/          # Model factories
├── migrations/         # Database migrations
├── seeders/            # Database seeders
└── schema/             # Database schema definitions

routes/
├── api.php             # API routes
└── web.php             # Web routes

config/
├── app.php
├── database.php
├── sanctum.php
└── ...
```

## Key Implementation Files

See the following files for detailed implementation:

1. **Models** - `app/Models/`
2. **Controllers** - `app/Http/Controllers/Api/V1/`
3. **Requests** - `app/Http/Requests/`
4. **Resources** - `app/Http/Resources/`
5. **Policies** - `app/Policies/`
6. **Services** - `app/Services/`
7. **Migrations** - `database/migrations/`

## Running the Application

```bash
php artisan serve
# Server running at http://localhost:8000
```

## API Documentation

See `/docs/api-documentation.md` for complete API endpoint documentation.

## Testing

```bash
php artisan test
```

## Seeding Sample Data

```bash
php artisan db:seed
```

This will create:
- Admin user
- Sample products
- Sample categories
- Sample brands
- Sample coupons
