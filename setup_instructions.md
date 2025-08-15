# Dental Appointment System Setup

## Requirements
- XAMPP, WAMP, or MAMP (Apache + MySQL + PHP)
- Web browser

## Setup Instructions

### 1. Install XAMPP
- Download from https://www.apachefriends.org/
- Install and start Apache + MySQL services

### 2. Database Setup
1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Import `database.sql` file or run the SQL commands:
   ```sql
   CREATE DATABASE dental_appointments;
   USE dental_appointments;
   -- (copy content from database.sql)
   ```

### 3. File Placement
Place all files in your web server directory:
- **XAMPP**: `C:/xampp/htdocs/dental/`
- **WAMP**: `C:/wamp64/www/dental/`
- **MAMP**: `/Applications/MAMP/htdocs/dental/`

### 4. Configuration
Edit `config.php` if needed:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');       // Your MySQL username
define('DB_PASS', '');           // Your MySQL password
define('DB_NAME', 'dental_appointments');
```

### 5. Access Your Site
- **Website**: http://localhost/dental/index.html
- **Admin Panel**: http://localhost/dental/admin.php

## Files Created

| File | Purpose |
|------|---------|
| `index.html` | Main dental website |
| `styles.css` | Website styling |
| `config.php` | Database configuration |
| `submit_appointment.php` | Form submission handler |
| `admin.php` | Admin panel to view appointments |
| `database.sql` | Database schema |

## How It Works

1. **Patient submits form** → Data sent to `submit_appointment.php`
2. **PHP saves to MySQL** → Appointment stored in database
3. **Admin views appointments** → Access `admin.php` to manage
4. **Status updates** → Mark appointments as pending/confirmed/cancelled

## Appointment Data Saved
- Patient name, email, phone
- Service type and message
- Submission timestamp
- Status (pending/confirmed/cancelled)
- Unique appointment ID

All appointments are now permanently saved in your MySQL database!