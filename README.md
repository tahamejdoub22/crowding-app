# Crowdfunding Platform

A modern crowdfunding platform built with **Laravel 11** and **Vite**, featuring project management, payments integration, and user authentication.

## 🚀 Features

- **Modern Laravel 11** with latest PHP 8.2+ features
- **Vite** for fast frontend builds
- **Laravel Sanctum** for API authentication
- **Stripe Integration** for secure payments
- **Role-based Access Control** with Laratrust
- **RESTful API** with versioning
- **Responsive Design** with TailwindCSS
- **Real-time Features** ready

## 📋 Requirements

- PHP 8.2 or higher
- Composer 2.0+
- Node.js 18+ and npm
- MySQL 8.0+ or PostgreSQL
- Git

## ⚡ Quick Setup

### 1. Clone & Install
```bash
git clone https://github.com/tahamejdoub22/projectsstageevast.git
cd projectsstageevast
composer install
npm install
```

### 2. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Configure Database
Edit `.env` file with your database credentials:
```
DB_DATABASE=crowdfunding
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Run Migrations
```bash
php artisan migrate
php artisan db:seed
```

### 5. Build Assets & Start
```bash
npm run build
php artisan serve
```

Visit `http://localhost:8000` 🎉

## 🔧 Development

### Asset Development
```bash
npm run dev  # Development with hot reload
npm run build  # Production build
```

### Code Quality
```bash
./vendor/bin/pint  # Format code with Laravel Pint
php artisan test   # Run tests
```

### API Usage
```bash
# Public endpoints
GET /api/v1/projects
GET /api/v1/projects/{id}

# Protected endpoints (require auth token)
POST /api/v1/projects
PUT /api/v1/projects/{id}
DELETE /api/v1/projects/{id}
```

## 📁 Project Structure
```
├── app/
│   ├── Http/
│   │   ├── Controllers/Api/     # API Controllers
│   │   └── Requests/            # Form Requests
│   └── Models/                  # Eloquent Models
├── resources/
│   ├── css/                     # Stylesheets
│   ├── js/                      # JavaScript
│   └── views/                   # Blade Templates
└── routes/
    ├── api.php                  # API Routes
    └── web.php                  # Web Routes
```

## 🔐 Authentication

The application uses **Laravel Sanctum** for API authentication:

```javascript
// Get auth token
const response = await fetch('/api/v1/auth/login', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ email, password })
});

const { token } = await response.json();

// Use token for API calls
fetch('/api/v1/projects', {
    headers: { 'Authorization': `Bearer ${token}` }
});
```

## 🎨 Frontend Stack

- **TailwindCSS 3.4** - Utility-first CSS
- **Alpine.js 3.14** - Minimal JavaScript framework
- **Vite 6.0** - Next generation frontend tooling
- **Inter Font** - Modern typography

## 📦 Key Packages

### Backend
- `laravel/framework: ^11.0` - Core framework
- `laravel/sanctum: ^4.0` - API authentication
- `santigarcor/laratrust: ^8.0` - Role management
- `stripe/stripe-php: ^15.0` - Payment processing

### Frontend
- `tailwindcss: ^3.4` - CSS framework
- `alpinejs: ^3.14` - JavaScript framework
- `vite: ^6.0` - Build tool

## 🌟 What's New in 2025

✅ **Upgraded to Laravel 11** - Latest features and performance  
✅ **Modern PHP 8.2+** - Types, attributes, and performance  
✅ **Vite Build System** - Faster than Laravel Mix  
✅ **API-First Architecture** - RESTful with versioning  
✅ **Enhanced Security** - Modern validation and protection  
✅ **Clean Code Standards** - PSR-12 with Laravel Pint  
✅ **Improved Structure** - Better organization and naming  

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

**Built with ❤️ using Laravel 11 | Modernized for 2025**
# crowding-app
