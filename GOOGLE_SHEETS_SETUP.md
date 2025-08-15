# 📊 Google Sheets Integration Setup Guide

## 🎯 Purpose
This integration will automatically save all appointment requests from your website directly to a Google Sheet, making it easy to manage patient appointments.

## 📋 Step-by-Step Setup

### Step 1: Create Google Sheet
1. Go to [sheets.google.com](https://sheets.google.com)
2. Click **"+ Blank"** to create a new sheet
3. Rename it to: **"Dr Ashwin Surana - Appointments"**
4. In Row 1, add these exact headers:
   ```
   A1: Timestamp
   B1: First Name  
   C1: Last Name
   D1: Email
   E1: Phone
   F1: Service
   G1: Message
   H1: Status
   ```

### Step 2: Create Apps Script
1. In your Google Sheet, click **Extensions → Apps Script**
2. Delete the existing code
3. Copy and paste the code from `google-apps-script.js` file
4. Click **Save** and name it: **"Dental Appointment Handler"**

### Step 3: Deploy the Script
1. Click **Deploy → New Deployment**
2. Click the gear icon ⚙️ next to "Type"
3. Select **"Web app"**
4. Settings:
   - **Execute as**: Me (your email)
   - **Who has access**: Anyone
5. Click **Deploy**
6. **Copy the Web App URL** (looks like: https://script.google.com/macros/s/ABC123.../exec)

### Step 4: Update Website
1. Open your website's `index.html` file
2. Find line 364: `const GOOGLE_SCRIPT_URL = 'https://script.google.com/macros/s/YOUR_SCRIPT_ID/exec';`
3. Replace `YOUR_SCRIPT_ID` with your actual script ID from Step 3
4. Save and upload the file

### Step 5: Test
1. Go to your website
2. Fill out the appointment form
3. Submit it
4. Check your Google Sheet - you should see the data appear!

## 🎉 What You'll Get

### Automatic Data Collection
- **Timestamp**: When the appointment was requested
- **Patient Details**: Name, email, phone
- **Service Requested**: What treatment they want
- **Message**: Any additional notes
- **Status**: Automatically set to "New"

### Easy Management
- **Filter by date**: See appointments by day/week/month
- **Update status**: Change from "New" → "Confirmed" → "Completed"
- **Export data**: Download as Excel or PDF
- **Share access**: Give staff members view/edit access

### Additional Features
- **WhatsApp Integration**: Option to also send data to WhatsApp
- **Mobile Friendly**: Access your appointments from phone/tablet
- **Real-time Updates**: Data appears instantly
- **Backup**: Google automatically backs up your data

## 🔧 Optional Enhancements

### Enable WhatsApp Notifications
In `index.html` line 389, uncomment this line:
```javascript
window.open(whatsappUrl, '_blank');
```
This will automatically open WhatsApp with appointment details when someone submits the form.

### Add More Columns
You can add more columns to your Google Sheet:
- **Appointment Date**
- **Preferred Time**
- **Insurance Provider**
- **Referral Source**

Just add the column headers and update the Apps Script accordingly.

## 🛡️ Security & Privacy
- Your Google Sheet is private by default
- Only you can access the appointment data
- The script runs under your Google account
- No patient data is stored on external servers

## 📞 Support
If you need help with setup:
1. Check that the Web App URL is correct
2. Make sure the Google Sheet headers match exactly
3. Verify the script is deployed as "Anyone" can access
4. Test the form submission and check for any browser console errors

Your appointment system is now fully automated! 🎉