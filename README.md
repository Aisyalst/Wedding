# Wedding Management System<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



A modern, elegant wedding management system built with Laravel 10, Vue 3, and Tailwind CSS.<p align="center">

<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>

## Features<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>

<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>

### Landing Page (Indonesian)<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>

- 🎨 Beautiful wedding-themed design with soft pink, white, gold, and ivory colors</p>

- 📱 Fully responsive across all devices (desktop, tablet, mobile)

- 🏠 Hero section with welcoming headline## About Laravel

- ℹ️ About section explaining the system

- ✨ Features/services sectionLaravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- 📞 Contact form and call-to-action

- [Simple, fast routing engine](https://laravel.com/docs/routing).

### Dashboard (English)- [Powerful dependency injection container](https://laravel.com/docs/container).

- 🔐 Secure authentication with Laravel Breeze- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.

- 📊 Modern admin panel with sidebar navigation- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).

- 📈 Statistics cards showing user counts and metrics- Database agnostic [schema migrations](https://laravel.com/docs/migrations).

- 🎨 Clean, responsive design with Tailwind CSS- [Robust background job processing](https://laravel.com/docs/queues).

- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

### User Management (CRUD)

- ➕ Create new users with role assignmentLaravel is accessible, powerful, and provides tools required for large, robust applications.

- 📝 Edit existing user information

- 🗑️ Delete users (with protection for own account)## Learning Laravel

- 👥 View all users in a responsive table

- ✅ Form validation (client and server-side)Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

- 🔔 Success/error alerts with smooth UI feedback

- 🎭 Beautiful modals for create/edit operationsYou may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.



## Technical StackIf you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.



- **Backend**: Laravel 10## Laravel Sponsors

- **Frontend**: Vue 3 (with Vite)

- **Styling**: Tailwind CSSWe would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

- **Authentication**: Laravel Breeze (Blade mode)

- **Database**: MySQL / SQLite### Premium Partners



## Installation & Setup- **[Vehikl](https://vehikl.com/)**

- **[Tighten Co.](https://tighten.co)**

### Prerequisites- **[WebReinvent](https://webreinvent.com/)**

- PHP 8.1 or higher- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**

- Composer- **[64 Robots](https://64robots.com)**

- Node.js & NPM- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**

- MySQL or SQLite- **[Cyber-Duck](https://cyber-duck.co.uk)**

- **[DevSquad](https://devsquad.com/hire-laravel-developers)**

### Step 1: Install Dependencies- **[Jump24](https://jump24.co.uk)**

- **[Redberry](https://redberry.international/laravel/)**

```bash- **[Active Logic](https://activelogic.com)**

# Install PHP dependencies- **[byte5](https://byte5.de)**

composer install- **[OP.GG](https://op.gg)**



# Install NPM dependencies## Contributing

npm install

```Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).



### Step 2: Environment Configuration## Code of Conduct



```bashIn order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

# Copy environment file (if needed)

cp .env.example .env## Security Vulnerabilities



# Generate application key (if needed)If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

php artisan key:generate

```## License



### Step 3: Database SetupThe Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


#### Option A: MySQL
1. Create a MySQL database named `wedding_manager`
2. Update `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wedding_manager
DB_USERNAME=root
DB_PASSWORD=your_password
```

#### Option B: SQLite (if SQLite extension is enabled)
1. Create database file:
```bash
touch database/database.sqlite
```
2. Update `.env` file:
```env
DB_CONNECTION=sqlite
```

### Step 4: Run Migrations

```bash
php artisan migrate
```

### Step 5: Create Admin User

You can create an admin user using tinker:

```bash
php artisan tinker
```

Then run:
```php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password123'),
    'role' => 'admin'
]);
```

### Step 6: Build Assets

```bash
# For development (with hot reload)
npm run dev

# For production
npm run build
```

### Step 7: Start Development Server

```bash
php artisan serve
```

Visit: **http://localhost:8000**

## Default Access

After creating an admin user:
- **Email**: admin@example.com
- **Password**: password123

## Usage

### Landing Page
- Visit the root URL `/` to see the wedding-themed landing page in Indonesian
- Beautiful hero section with gradient text and animation effects
- Responsive navigation with smooth scrolling
- Features showcase with icon cards
- Contact form section
- Click "Masuk" button to go to the login page

### Authentication
- Register a new account via `/register`
- Login with existing credentials via `/login`
- After successful login, you'll be redirected to the dashboard
- Logout button available in the top navigation bar

### Dashboard
- View statistics cards (Total Users, Events, Guests, Budget)
- Quick action buttons for common tasks
- Navigate using the responsive sidebar menu
- Recent activity timeline
- Welcome card with user greeting

### User Management
- Navigate to "Users" from the sidebar menu
- View all users in a responsive, sortable table
- **Add New User**: Click the "Add New User" button
  - Fill in name, email, password, and role
  - Form validation ensures data integrity
  - Success message appears after creation
- **Edit User**: Click the edit icon (pencil) on any user row
  - Modify user details
  - Password is optional when editing
  - Changes saved with confirmation
- **Delete User**: Click the delete icon (trash) on any user row
  - Confirmation modal prevents accidental deletion
  - Cannot delete your own account
  - Success message after deletion
- All operations include real-time feedback

## File Structure

```
├── app/
│   ├── Http/Controllers/
│   │   └── UserController.php      # User CRUD operations
│   └── Models/
│       └── User.php                 # User model with role field
├── database/
│   └── migrations/
│       └── *_add_role_to_users_table.php  # Role column migration
├── resources/
│   ├── css/
│   │   └── app.css                  # Main CSS with Tailwind imports
│   ├── js/
│   │   ├── app.js                   # Vue initialization
│   │   └── components/
│   │       ├── LandingPage.vue      # Wedding-themed landing page
│   │       └── UserManagement.vue   # User CRUD with modals
│   └── views/
│       ├── layouts/
│       │   ├── admin.blade.php      # Admin layout with sidebar & navbar
│       │   └── app.blade.php        # Default Breeze layout
│       ├── users/
│       │   └── index.blade.php      # User management page
│       ├── dashboard.blade.php      # Dashboard with stats
│       └── welcome.blade.php        # Landing page container
├── routes/
│   └── web.php                      # All web routes
├── tailwind.config.js               # Tailwind with wedding colors
└── vite.config.js                   # Vite with Vue plugin
```

## Routes

| Method | URI | Name | Description |
|--------|-----|------|-------------|
| GET | `/` | - | Landing page (Indonesian) |
| GET | `/login` | login | Login page |
| POST | `/login` | - | Process login |
| POST | `/logout` | logout | Logout user |
| GET | `/register` | register | Registration page |
| POST | `/register` | - | Process registration |
| GET | `/dashboard` | dashboard | Admin dashboard with stats |
| GET | `/users` | users.index | List all users (Vue component) |
| GET | `/api/users` | users.data | Get users as JSON for Vue |
| POST | `/users` | users.store | Create new user (JSON API) |
| PUT | `/users/{id}` | users.update | Update user (JSON API) |
| DELETE | `/users/{id}` | users.destroy | Delete user (JSON API) |
| GET | `/profile` | profile.edit | Edit current user profile |

## Color Palette

Wedding-themed colors defined in `tailwind.config.js`:

```javascript
wedding: {
    pink: { 50-600 },    // Soft pink tones
    gold: { 50-600 },    // Elegant gold accents
    ivory: { 50-500 },   // Warm ivory backgrounds
}
```

## Features in Detail

### Responsive Design
- **Mobile First**: Optimized for small screens first
- **Breakpoints**: sm (640px), md (768px), lg (1024px), xl (1280px)
- **Sidebar**: Toggles to overlay menu on mobile/tablet
- **Tables**: Horizontally scrollable on small screens
- **Forms**: Stack vertically on mobile, side-by-side on desktop

### Form Validation
- **Client-side**: Vue reactive validation with error messages
- **Server-side**: Laravel validation with custom rules
- **Real-time**: Errors appear immediately below fields
- **Visual**: Red borders highlight invalid fields
- **Messages**: Clear, actionable error text

### Security
- ✅ CSRF token protection on all forms
- ✅ Password hashing with bcrypt
- ✅ Authentication middleware on protected routes
- ✅ Authorization checks (can't delete yourself)
- ✅ Email uniqueness validation
- ✅ SQL injection prevention via Eloquent ORM

### User Experience
- 🎨 Smooth transitions and hover effects
- ⏳ Loading spinners for async operations
- ✅ Success/error toast notifications
- 🔔 Auto-dismissing alerts (5 seconds)
- ⚠️ Confirmation modals for destructive actions
- 🎭 Modal overlays with backdrop click to close
- ♿ Accessible form labels and ARIA attributes

## Development Commands

### Watch for Changes (Hot Reload)
```bash
npm run dev
```
Leave this running during development. Vite will automatically rebuild when you save files.

### Build for Production
```bash
npm run build
```
Minifies and optimizes assets for deployment.

### Clear Laravel Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Run Database Seeders (if created)
```bash
php artisan db:seed
```

## Troubleshooting

### Problem: Database Connection Error
**Solution:**
- Check if MySQL/MariaDB is running
- Verify `.env` database credentials
- Ensure database `wedding_manager` exists
- Try: `php artisan config:clear`

### Problem: Assets Not Loading
**Solution:**
- Run `npm run build`
- Clear browser cache (Ctrl+F5)
- Check `public/build/` directory exists
- Verify `@vite` directive in blade files

### Problem: Vue Components Not Rendering
**Solution:**
- Open browser console (F12) for errors
- Check CSRF token in page source
- Ensure `npm run dev` is running (development)
- Verify `data-vue` attribute on mount element

### Problem: "Target class does not exist"
**Solution:**
- Run `composer dump-autoload`
- Check controller namespace and imports
- Verify route references correct controller

### Problem: Sidebar Not Working on Mobile
**Solution:**
- Check JavaScript console for errors
- Ensure Alpine.js is loaded (Breeze default)
- Verify sidebar toggle button IDs match script

### Problem: 419 CSRF Token Mismatch
**Solution:**
- Clear cache: `php artisan cache:clear`
- Check `<meta name="csrf-token">` in layout
- Verify fetch requests include CSRF header
- Session might have expired - try logging in again

## Customization

### Adding New User Roles
1. Update `UserController` validation rules
2. Modify `UserManagement.vue` role options
3. Add role-based permissions as needed

### Changing Wedding Colors
Edit `tailwind.config.js`:
```javascript
wedding: {
    pink: { /* your colors */ },
    gold: { /* your colors */ },
}
```

### Adding More Sections to Landing Page
Edit `resources/js/components/LandingPage.vue` and add new sections between existing ones.

### Customizing Dashboard Stats
Edit `resources/views/dashboard.blade.php` to add/modify stat cards.

## Production Deployment

1. **Set Environment to Production**
```env
APP_ENV=production
APP_DEBUG=false
```

2. **Optimize Laravel**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. **Build Assets**
```bash
npm run build
```

4. **Set Permissions** (Linux/Mac)
```bash
chmod -R 755 storage bootstrap/cache
```

5. **Enable HTTPS** - Always use SSL in production

6. **Backup Database** - Regular automated backups

## Browser Support

- ✅ Chrome/Edge (latest 2 versions)
- ✅ Firefox (latest 2 versions)
- ✅ Safari (latest 2 versions)
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

- ⚡ Vite for ultra-fast development
- 🗜️ Production builds are minified and tree-shaken
- 🎯 Lazy loading for Vue components
- 💾 Database query optimization with Eloquent
- 📦 Asset versioning for cache busting

## Credits

Built with love using:
- [Laravel 10](https://laravel.com) - PHP Framework
- [Vue 3](https://vuejs.org) - Progressive JavaScript Framework
- [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS
- [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze) - Authentication Scaffolding
- [Vite](https://vitejs.dev) - Next Generation Frontend Tooling

## License

This project is open-sourced software licensed under the MIT license.

---

## Quick Start Summary

```bash
# 1. Install dependencies
composer install && npm install

# 2. Setup database (create 'wedding_manager' database first)
php artisan migrate

# 3. Create admin user (via tinker)
php artisan tinker
# Then: \App\Models\User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>bcrypt('password123'),'role'=>'admin']);

# 4. Build assets
npm run build

# 5. Start server
php artisan serve

# Visit: http://localhost:8000
```

**Need help?** Check the Troubleshooting section or review Laravel/Vue documentation.

---

**Enjoy building your wedding management system! 💒💕✨**
