# 🚀 Quick Reference Guide

## Current Status

✅ **Server Running**: http://127.0.0.1:8000
✅ **Assets Built**: Production ready
⚠️ **Database**: Needs setup (MySQL not running)

---

## Immediate Next Steps

### 1. Start MySQL
Choose one option:

**Option A: Using XAMPP**
```
1. Open XAMPP Control Panel
2. Click "Start" for MySQL
3. Wait for green indicator
```

**Option B: Using Standalone MySQL**
```
1. Start MySQL service from Services (Windows)
2. Or run: net start mysql (as Administrator)
```

### 2. Create Database
```bash
# Open MySQL command line or phpMyAdmin
CREATE DATABASE wedding_manager;
```

### 3. Run Migrations
```bash
php artisan migrate
```

### 4. Create Admin User
```bash
php artisan tinker
```
Then paste:
```php
\App\Models\User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>bcrypt('password123'),'role'=>'admin']);
exit
```

### 5. Access Application
Open browser: **http://localhost:8000**

---

## Login Credentials

After creating admin user:
- **Email**: admin@example.com
- **Password**: password123

---

## Available Pages

| URL | Description | Requires Login |
|-----|-------------|----------------|
| http://localhost:8000 | Landing Page (Indonesian) | No |
| http://localhost:8000/login | Login Page | No |
| http://localhost:8000/register | Register New Account | No |
| http://localhost:8000/dashboard | Admin Dashboard | Yes |
| http://localhost:8000/users | User Management | Yes |
| http://localhost:8000/profile | Edit Profile | Yes |

---

## Common Commands

### Development
```bash
# Start server (already running!)
php artisan serve

# Watch and rebuild assets
npm run dev

# Build for production
npm run build
```

### Database
```bash
# Run migrations
php artisan migrate

# Rollback last migration
php artisan migrate:rollback

# Fresh database
php artisan migrate:fresh
```

### Cache
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Interactive Shell
```bash
# Open tinker (PHP REPL)
php artisan tinker

# Useful tinker commands:
\App\Models\User::all();  # List all users
\App\Models\User::count(); # Count users
```

---

## File Locations

### Frontend
- **Landing Page**: `resources/js/components/LandingPage.vue`
- **User Management**: `resources/js/components/UserManagement.vue`
- **Main CSS**: `resources/css/app.css`
- **Main JS**: `resources/js/app.js`

### Backend
- **User Controller**: `app/Http/Controllers/UserController.php`
- **User Model**: `app/Models/User.php`
- **Routes**: `routes/web.php`

### Views
- **Landing**: `resources/views/welcome.blade.php`
- **Dashboard**: `resources/views/dashboard.blade.php`
- **Admin Layout**: `resources/views/layouts/admin.blade.php`
- **Users Page**: `resources/views/users/index.blade.php`

### Config
- **Environment**: `.env`
- **Tailwind**: `tailwind.config.js`
- **Vite**: `vite.config.js`

---

## Troubleshooting

### "Target machine actively refused it"
❌ Problem: MySQL not running
✅ Solution: Start MySQL service

### "Base table or view not found"
❌ Problem: Migrations not run
✅ Solution: Run `php artisan migrate`

### Assets not loading
❌ Problem: Need to rebuild
✅ Solution: Run `npm run build`

### Page blank after login
❌ Problem: No users in database
✅ Solution: Create admin user via tinker

### Vue component not showing
❌ Problem: JavaScript error
✅ Solution: 
1. Open browser console (F12)
2. Check for errors
3. Verify `npm run build` completed

---

## Features Available

✅ **Landing Page**
- Hero section with gradient
- About section
- 6 Feature cards
- Contact form
- Smooth scrolling navigation
- Fully responsive

✅ **Dashboard**
- Statistics cards
- Welcome section
- Quick actions
- Sidebar navigation
- Mobile-friendly menu

✅ **User Management**
- View all users
- Create new user
- Edit user details
- Delete user
- Form validation
- Success/error alerts

---

## Testing Checklist

Once database is set up:

- [ ] Visit landing page
- [ ] Click "Masuk" button
- [ ] Register new account
- [ ] Login with credentials
- [ ] View dashboard
- [ ] Click "Users" in sidebar
- [ ] Add new user
- [ ] Edit user
- [ ] Delete user
- [ ] Logout
- [ ] Test on mobile (browser dev tools)

---

## Customization Tips

### Change Colors
Edit `tailwind.config.js`:
```javascript
wedding: {
  pink: { /* your colors */ },
  gold: { /* your colors */ },
}
```
Then: `npm run build`

### Change Landing Text
Edit: `resources/js/components/LandingPage.vue`
Then: `npm run build`

### Add More Routes
Edit: `routes/web.php`
Then: `php artisan route:clear`

---

## Support Resources

- **Laravel Docs**: https://laravel.com/docs/10.x
- **Vue 3 Docs**: https://vuejs.org/guide/
- **Tailwind Docs**: https://tailwindcss.com/docs
- **Laravel Breeze**: https://laravel.com/docs/10.x/starter-kits#breeze

---

## Project Statistics

- **Total Files**: 50+ (code files)
- **Lines of Code**: ~3500+
- **Components**: 2 Vue components
- **Routes**: 10+ defined
- **Views**: 8 Blade templates
- **Controllers**: 3 (User, Profile, Auth)

---

## Quick Copy-Paste Commands

### Full Setup (if starting fresh)
```bash
# 1. Install dependencies (if needed)
composer install
npm install

# 2. Setup environment (if needed)
cp .env.example .env
php artisan key:generate

# 3. Database setup
php artisan migrate

# 4. Create admin
php artisan tinker
\App\Models\User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>bcrypt('password123'),'role'=>'admin']);
exit

# 5. Build assets
npm run build

# 6. Start server
php artisan serve
```

---

## Important URLs

- **Application**: http://localhost:8000
- **Login**: http://localhost:8000/login
- **Dashboard**: http://localhost:8000/dashboard
- **Users**: http://localhost:8000/users
- **phpMyAdmin** (if XAMPP): http://localhost/phpmyadmin

---

## Current Server Info

```
Server: http://127.0.0.1:8000
Status: ✅ Running
Press Ctrl+C to stop
```

To access from another device on same network:
```
Replace 127.0.0.1 with your computer's IP
Example: http://192.168.1.100:8000
```

---

## Quick Git Commands (if using version control)

```bash
# Initialize repo
git init

# Add files
git add .

# Commit
git commit -m "Initial wedding management system"

# Create .gitignore (important!)
echo "node_modules/" >> .gitignore
echo "vendor/" >> .gitignore
echo ".env" >> .gitignore
echo "public/build/" >> .gitignore
```

---

## Performance Tips

- Use `npm run build` for production (minified)
- Use `npm run dev` for development (hot reload)
- Enable gzip on production server
- Use database indexing for large datasets
- Cache views: `php artisan view:cache`
- Cache config: `php artisan config:cache`

---

## Security Reminders

✅ Change default password after first login
✅ Never commit `.env` to version control
✅ Use strong passwords in production
✅ Enable HTTPS in production
✅ Keep Laravel and dependencies updated
✅ Set `APP_DEBUG=false` in production

---

**You're all set! Just need to complete database setup and you're ready to go! 🚀**

**Questions?** Check README.md, SETUP.md, or CHECKLIST.md for detailed information.

---

**Server running at**: http://127.0.0.1:8000 ✅
