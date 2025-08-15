# Dental Landing Page - Netlify Deployment

A professional dental practice landing page with appointment booking using Netlify Forms.

## Features
- 📱 Responsive design
- 🦷 Professional dental theme
- 📝 Contact form with Netlify Forms
- ✅ Thank you page
- 🚀 Fast static hosting

## Quick Deploy to Netlify

### Option 1: Drag & Drop (Easiest)
1. Visit [Netlify](https://netlify.com)
2. Drag the `netlify-simple` folder to the deploy area
3. Your site is live instantly!

### Option 2: Git Integration
1. Create a GitHub repository
2. Upload the `netlify-simple` folder contents
3. Connect the repo to Netlify
4. Auto-deploy on every commit

## Form Submissions

### Where Appointments Go:
- **Netlify Dashboard** → Site Settings → Forms
- **Email Notifications** → Set up in Netlify
- **Slack/Discord** → Integrate via webhooks

### Form Data Includes:
- Patient name and contact info
- Service type requested
- Message/notes
- Submission timestamp

## File Structure
```
netlify-simple/
├── index.html          # Main landing page
├── thank-you.html      # Form submission confirmation
├── styles.css          # All styling
├── netlify.toml        # Netlify configuration
├── _redirects          # URL redirects
└── README.md           # This file
```

## Customization

### Update Contact Info:
Edit these sections in `index.html`:
- Phone: `(555) 123-4567`
- Email: `info@brightsmile.com`
- Address: `123 Main Street`

### Change Colors:
Edit `styles.css`:
- Primary blue: `#2563eb`
- Text color: `#333`
- Background: `#f8fafc`

### Add Google Analytics:
Add tracking code before `</head>` in both HTML files.

## Form Setup

### Enable Notifications:
1. Go to Netlify Dashboard
2. Site Settings → Forms → Form notifications
3. Add email notification
4. Set recipient email address

### Anti-Spam:
- Netlify automatically includes spam filtering
- reCAPTCHA can be added if needed

## Domain Setup

### Custom Domain:
1. In Netlify: Site Settings → Domain management
2. Add custom domain
3. Follow DNS instructions
4. SSL automatically enabled

## Cost
- **Netlify**: Free (100GB bandwidth/month)
- **Forms**: Free (100 submissions/month)
- **Upgrade**: Pro plan for more submissions

## Live Example
After deployment, your site will be available at:
`https://amazing-dental-site-123.netlify.app`

## Support
- [Netlify Docs](https://docs.netlify.com)
- [Netlify Forms Guide](https://docs.netlify.com/forms/setup/)

---

🦷 **Ready to deploy your dental practice website in under 5 minutes!**