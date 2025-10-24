# Wedding Management System - Setup Guide

## Step-by-Step Installation Instructions

### Step 1: Database Setup

Since MySQL is not currently running, you have two options:

#### Option A: Use MySQL (Recommended for Production)

1. **Start MySQL Server:**
   - **Windows**: Start XAMPP/WAMP and enable MySQL
   - **Or install MySQL**: https://dev.mysql.com/downloads/mysql/

2. **Create Database:**
   ```sql
   CREATE DATABASE wedding_manager;
   ```

3. **Update .env file:**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=wedding_manager
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

#### Option B: Use SQLite (Quick Start)

Unfortunately, SQLite PDO driver is not enabled in your PHP installation. You would need to:
1. Enable it in `php.ini` by uncommenting: `extension=pdo_sqlite`
2. Restart your PHP server

**For now, please use Option A (MySQL) instead.**

### Step 2: Run Migrations

Once your database is configured:

```bash
php artisan migrate
```

You should see:
```
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
... (and more)
```

### Step 3: Create Your First Admin User

```bash
php artisan tinker
```

Then paste this command:
```php
\App\Models\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password123'), 'role' => 'admin']);
```

Press Enter, then type `exit`

### Step 4: Start the Application

```bash
# In one terminal - Start Laravel server
php artisan serve

# In another terminal - Build frontend assets (production)
npm run build

# OR for development with hot reload
npm run dev
```

### Step 5: Access the Application

Open your browser and visit:
- **Landing Page**: http://localhost:8000
- **Login**: http://localhost:8000/login
  - Email: `admin@example.com`
  - Password: `password123`

## If You Don't Have MySQL Installed

### Install MySQL (Windows)

1. **Download XAMPP** (includes MySQL, PHP, and Apache):
   - Visit: https://www.apachefriends.org/download.html
   - Download the Windows version
   - Install and start MySQL from XAMPP Control Panel

2. **Or Download MySQL Installer**:
   - Visit: https://dev.mysql.com/downloads/installer/
   - Download "MySQL Installer for Windows"
   - Choose "Developer Default" during installation
   - Set root password (or leave empty for development)

### Create Database with XAMPP

1. Open XAMPP Control Panel
2. Start "MySQL" module
3. Click "Shell" button
4. Type: `mysql -u root -p` (press Enter if no password)
5. Type: `CREATE DATABASE wedding_manager;`
6. Type: `exit`

### Create Database with MySQL Workbench

1. Open MySQL Workbench
2. Connect to Local instance
3. Click "Create Schema" icon (database icon)
4. Name it: `wedding_manager`
5. Click "Apply"

## Testing the Setup

After completing all steps:

1. ✅ Landing page should show beautiful wedding theme in Indonesian
2. ✅ Register or login should work
3. ✅ Dashboard should show with sidebar
4. ✅ Clicking "Users" in sidebar should show user management
5. ✅ You should be able to add/edit/delete users

## Common Issues

### "SQLSTATE[HY000] [2002]"
- MySQL is not running
- Start MySQL server/XAMPP

### "Base table or view not found"
- Migrations haven't run
- Run: `php artisan migrate`

### "Class 'App\Http\Controllers\UserController' not found"
- Run: `composer dump-autoload`

### Assets not loading
- Run: `npm run build`
- Clear browser cache (Ctrl+F5)

### Vue components not rendering
- Check browser console (F12)
- Ensure `npm run dev` or `npm run build` has completed
- Check for JavaScript errors

## Next Steps

After successful setup:

1. 📝 Customize the landing page text
2. 🎨 Adjust colors in `tailwind.config.js`
3. 👥 Add more user roles and permissions
4. 📊 Add more dashboard features
5. 🎉 Build event management features
6. 👰 Add guest management
7. 💰 Implement budget tracking

## Need Help?

- Check `README.md` for detailed documentation
- Review Laravel docs: https://laravel.com/docs
- Review Vue docs: https://vuejs.org/guide/
- Check Tailwind docs: https://tailwindcss.com/docs

---

**You're ready to start! 🚀**
