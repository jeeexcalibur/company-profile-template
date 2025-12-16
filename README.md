# 🏢 Laravel Company Profile Template

A modern, full-featured company profile website template built with Laravel 12. Perfect for agencies, startups, and businesses who need a professional online presence with a custom admin panel.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)
![TailwindCSS](https://img.shields.io/badge/Tailwind-3.x-38B2AC?style=flat-square&logo=tailwind-css)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=flat-square&logo=alpine.js)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

## ✨ Features

### Frontend
- 🎨 **Modern Design** - Glassmorphism, gradients, and smooth animations
- 📱 **Fully Responsive** - Works on all devices
- ⚡ **Fast & Optimized** - Built with performance in mind
- 🎭 **AOS Animations** - Smooth scroll animations
- 🔍 **SEO Friendly** - Semantic HTML and meta tags

### Admin Panel
- 🔐 **Secure Authentication** - Built-in login system
- 📊 **Dashboard** - Stats overview and quick actions
- ⚙️ **Company Settings** - Logo, contact info, social links
- 🦸 **Hero Section** - Customize homepage hero
- 📝 **About Section** - Mission, vision, and stats
- 💼 **Services Management** - CRUD with features list
- 👥 **Team Management** - Staff profiles with social links
- 🖼️ **Portfolio** - Showcase projects with categories
- ⭐ **Testimonials** - Client reviews with ratings
- 📬 **Contact Messages** - View and manage inquiries

## 🛠️ Tech Stack

| Technology | Purpose |
|------------|---------|
| Laravel 11 | Backend Framework |
| Blade | Templating Engine |
| Tailwind CSS | Styling |
| Alpine.js | JavaScript Interactivity |
| AOS | Scroll Animations |
| MySQL | Database |
| Vite | Asset Bundling |

## 🚀 Quick Start

### Prerequisites
- PHP 8.2+
- Composer
- Node.js 18+
- MySQL 8.0+

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/laravel-company-profile.git
   cd laravel-company-profile
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database** in `.env`
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=company_profile
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run migrations and seed**
   ```bash
   php artisan migrate --seed
   php artisan storage:link
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start the server**
   ```bash
   php artisan serve
   ```

8. **Visit the site**
   - Frontend: http://localhost:8000
   - Admin: http://localhost:8000/admin

### Default Admin Credentials
```
Email: admin@company.com
Password: password
```
> ⚠️ **Important:** Change these credentials after first login!

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Admin panel controllers
│   │   └── Frontend/        # Public page controllers
│   └── Models/              # Eloquent models
├── database/
│   ├── migrations/          # Database schema
│   └── seeders/             # Demo data seeder
├── resources/
│   ├── css/                 # Tailwind CSS
│   ├── js/                  # Alpine.js setup
│   └── views/
│       ├── admin/           # Admin panel views
│       │   ├── layouts/     # Admin layout
│       │   ├── auth/        # Login page
│       │   ├── services/    # CRUD views
│       │   ├── team/        # CRUD views
│       │   ├── portfolio/   # CRUD views
│       │   ├── testimonials/# CRUD views
│       │   └── messages/    # Messages views
│       └── frontend/        # Public website views
│           ├── layouts/     # Main layout
│           └── partials/    # Reusable components
└── routes/
    └── web.php              # All routes
```

## 🎨 Customization

### Colors & Theme
Edit `resources/css/app.css` to customize the color palette:
```css
:root {
    --primary: 139, 92, 246;    /* Purple */
    --secondary: 59, 130, 246;  /* Blue */
    --accent: 236, 72, 153;     /* Pink */
}
```

### Content
All content is managed through the admin panel - no code changes needed!

### Adding New Pages
1. Create a controller method in `Frontend/PageController.php`
2. Add a route in `routes/web.php`
3. Create the Blade view in `resources/views/frontend/`

## 📸 Feature

### Frontend Homepage
The public-facing website with hero, services, about, portfolio, and testimonials sections.

### Admin Dashboard
Clean dashboard showing stats and quick actions for managing content.

### Content Management
Easy-to-use forms for managing all website content including images.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS
- [Alpine.js](https://alpinejs.dev) - Lightweight JavaScript
- [AOS](https://michalsnik.github.io/aos/) - Animate on Scroll

## ⭐ Support

If you find this template useful, please consider giving it a star on GitHub!

---

Made with ❤️ by Jein Ananda
