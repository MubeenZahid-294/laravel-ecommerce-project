# 🛒 Zyvora - Laravel E-Commerce Project

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" />
</p>

<p align="center">
  A full-featured e-commerce web application built with Laravel 12 for the Web Technology Lab project.
</p>

---

## 🎥 Demo Video

👉 [Click here to watch the demo](https://drive.google.com/file/d/1IHWgaaFj-eOtDiesMwph94oDFT1__nTb/view?usp=drive_link)

---

## ✨ Features

### 🛍️ User Features
- 🏠 Home page with auto-sliding banner/slider
- 🛒 Product listing with category filter and search
- 📦 Single product page with details
- ❤️ Wishlist — save favourite products
- 🛒 Shopping cart with quantity management
- 💳 Checkout with delivery address
- 📋 Order history page
- ⭐ Product ratings and reviews
- 📩 Contact form (logged in users only)
- 🔐 Login and Register with authentication

### ⚙️ Admin Panel Features
- 📊 Dashboard with stats (products, orders, users, messages)
- 🛍️ Products management (Add, Edit, Delete) with image upload
- 📦 Orders management with status update
- 👥 Customers list
- ✉️ Contact messages with email reply system
- 📋 Yajra Datatables integration for all tables

### 🔧 Technical Features
- Laravel Breeze authentication
- Yajra Datatables for server-side tables
- Laravel Mail with Gmail SMTP for real emails
- Image upload and storage
- Admin middleware for panel protection
- Session-based shopping cart
- Responsive design with Bootstrap 5
- Swiper.js slider
- 10 product categories with 115+ products

---

## 🖥️ Tech Stack

| Technology | Version |
|---|---|
| Laravel | 12.x |
| PHP | 8.2 |
| MySQL | 8.0 |
| Bootstrap | 5.3 |
| Yajra Datatables | Latest |
| Laravel Breeze | Latest |
| Swiper.js | 10 |
| Font Awesome | 6.4 |

---

## 📁 Project Structure
zyvora/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin controllers
│   │   │   ├── HomeController
│   │   │   ├── ProductController
│   │   │   ├── CartController
│   │   │   ├── CheckoutController
│   │   │   ├── ContactController
│   │   │   ├── ReviewController
│   │   │   └── WishlistController
│   │   └── Middleware/
│   │       └── AdminMiddleware
│   └── Models/
│       ├── Product
│       ├── Order
│       ├── OrderItem
│       ├── ContactMessage
│       ├── Review
│       └── Wishlist
├── database/
│   ├── migrations/
│   └── seeders/
│       └── ProductSeeder
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── admin.blade.php
│       ├── admin/
│       ├── products/
│       └── ...
└── routes/
└── web.php
---

## 🚀 Installation Guide

### Requirements
- PHP 8.2+
- Composer
- MySQL
- Node.js & NPM
- XAMPP or Laragon

### Steps

**1. Clone the repository**
```bash
git clone https://github.com/YOURUSERNAME/laravel-ecommerce-project.git
cd laravel-ecommerce-project
```

**2. Install PHP dependencies**
```bash
composer install
```

**3. Install Node dependencies**
```bash
npm install
```

**4. Copy environment file**
```bash
cp .env.example .env
```

**5. Generate application key**
```bash
php artisan key:generate
```

**6. Configure database in `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=
```

**7. Run migrations and seed database**
```bash
php artisan migrate
php artisan db:seed --class=ProductSeeder
```

**8. Create storage link**
```bash
php artisan storage:link
```

**9. Run the application**
```bash
npm run dev
php artisan serve
```

**10. Make yourself admin**
```bash
php artisan tinker
App\Models\User::where('email', 'your@email.com')->update(['is_admin' => true]);
```

---

## 📧 Mail Configuration

To enable real email replies in the contact form, update `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your@gmail.com
MAIL_FROM_NAME="Zyvora"
```

> Generate a Gmail App Password from: https://myaccount.google.com/apppasswords

---

## 🗄️ Database Tables

| Table | Description |
|---|---|
| users | Registered customers and admins |
| products | Store products with categories |
| orders | Customer orders |
| order_items | Individual items in each order |
| contact_messages | Contact form messages |
| reviews | Product ratings and reviews |
| wishlists | User saved products |

---

## 📸 Pages Overview

| Page | Description |
|---|---|
| `/` | Home page with slider and featured products |
| `/products` | All products with search and category filter |
| `/products/{id}` | Single product with reviews and wishlist |
| `/cart` | Shopping cart |
| `/checkout` | Order placement |
| `/my-orders` | User order history |
| `/wishlist` | Saved products |
| `/contact` | Contact form |
| `/admin/dashboard` | Admin panel |
| `/admin/products` | Manage products |
| `/admin/orders` | Manage orders |
| `/admin/users` | View customers |
| `/admin/contact` | Reply to messages |

---

## 👤 Author

**Developed for Web Technology Lab Project**

---

## 📝 License

This project is for educational purposes only.
