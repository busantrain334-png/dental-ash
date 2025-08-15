# Netlify + Heroku Deployment Guide

## Architecture
- **Netlify**: Hosts the static frontend (HTML/CSS/JS)
- **Heroku**: Hosts the PHP backend + MySQL database
- **ClearDB**: MySQL database addon on Heroku

## Part 1: Deploy Backend to Heroku

### Prerequisites
1. Create accounts:
   - [Heroku](https://heroku.com)
   - [GitHub](https://github.com) (for code storage)

### Step 1: Prepare Heroku App
1. Install [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli)
2. Login: `heroku login`
3. Create app: `heroku create your-dental-app`

### Step 2: Deploy Backend
1. Navigate to heroku-backend folder:
   ```bash
   cd heroku-backend
   git init
   git add .
   git commit -m "Initial backend commit"
   ```

2. Connect to Heroku:
   ```bash
   heroku git:remote -a your-dental-app
   git push heroku main
   ```

### Step 3: Add MySQL Database
1. Add ClearDB addon:
   ```bash
   heroku addons:create cleardb:ignite
   ```

2. Get database URL:
   ```bash
   heroku config:get CLEARDB_DATABASE_URL
   ```

3. Import database schema:
   ```bash
   # Get database details from URL
   mysql -h [host] -u [username] -p[password] [database] < database.sql
   ```

### Step 4: Test Backend
Visit: `https://your-dental-app.herokuapp.com/admin.php`

## Part 2: Deploy Frontend to Netlify

### Step 1: Update API URL
1. In `netlify-frontend/index.html`, replace:
   ```javascript
   fetch('https://your-heroku-app.herokuapp.com/submit_appointment.php'
   ```
   With your actual Heroku app URL.

### Step 2: Deploy to Netlify
**Option A: Drag & Drop**
1. Go to [Netlify](https://netlify.com)
2. Drag the `netlify-frontend` folder to deploy

**Option B: Git Integration**
1. Push `netlify-frontend` to GitHub
2. Connect GitHub repo to Netlify
3. Set build settings:
   - Build command: (leave empty)
   - Publish directory: `/`

### Step 3: Test Complete Setup
1. Visit your Netlify site URL
2. Fill out appointment form
3. Check Heroku admin panel for saved data

## File Structure

```
dental-appointment-system/
├── netlify-frontend/          # Deploy to Netlify
│   ├── index.html
│   ├── styles.css
│   └── _redirects
└── heroku-backend/           # Deploy to Heroku
    ├── config.php
    ├── submit_appointment.php
    ├── admin.php
    ├── database.sql
    ├── composer.json
    ├── Procfile
    └── .htaccess
```

## URLs After Deployment
- **Website**: `https://your-site-name.netlify.app`
- **Admin Panel**: `https://your-dental-app.herokuapp.com/admin.php`
- **API Endpoint**: `https://your-dental-app.herokuapp.com/submit_appointment.php`

## Troubleshooting

### Common Issues:
1. **CORS Errors**: Check .htaccess and PHP headers
2. **Database Connection**: Verify CLEARDB_DATABASE_URL
3. **Form Not Submitting**: Check Heroku app URL in frontend

### Logs:
- Heroku: `heroku logs --tail`
- Netlify: Check deploy logs in dashboard

## Environment Variables
Heroku automatically sets:
- `CLEARDB_DATABASE_URL`: Database connection string

## Cost
- **Netlify**: Free (100GB bandwidth)
- **Heroku**: Free tier (550 hours/month)
- **ClearDB**: Free tier (5MB storage)

All free tiers are sufficient for a dental practice website!