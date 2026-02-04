# WordPress Theme Deployment Guide

## Converting from Netlify to WordPress

This guide will help you deploy the North Texas SDA Church WordPress theme from the current Netlify-hosted static site to a WordPress installation.

## Prerequisites

1. **WordPress Installation**: You need WordPress 5.0+ installed on your server
2. **Hosting**: A web host that supports WordPress (recommended: WP Engine, SiteGround, or Kinsta)
3. **FTP/SFTP Access**: Or cPanel file manager access to upload theme files
4. **Database**: MySQL 5.6+ or MariaDB 10.1+

## Step-by-Step Deployment

### 1. Prepare WordPress Installation

If you don't have WordPress installed:

```bash
# Download WordPress
wget https://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz

# Move to web directory
mv wordpress/* /var/www/html/

# Set proper permissions
chown -R www-data:www-data /var/www/html/
chmod -R 755 /var/www/html/
```

Or use your hosting provider's one-click WordPress installer.

### 2. Upload the Theme

#### Option A: Via FTP/SFTP
1. Connect to your server using an FTP client (FileZilla, Cyberduck, etc.)
2. Navigate to `wp-content/themes/`
3. Upload the `north-texas-church-theme` folder
4. Ensure proper permissions (755 for directories, 644 for files)

#### Option B: Via WordPress Admin
1. Zip the `north-texas-church-theme` folder
2. Go to WordPress Admin > Appearance > Themes
3. Click "Add New" > "Upload Theme"
4. Select the zip file and click "Install Now"

#### Option C: Via Command Line
```bash
# Navigate to WordPress themes directory
cd /var/www/html/wp-content/themes/

# Copy theme from workspace
cp -r /path/to/north-texas-church-theme .

# Set permissions
chown -R www-data:www-data north-texas-church-theme
chmod -R 755 north-texas-church-theme
```

### 3. Activate the Theme

1. Log in to WordPress Admin
2. Go to Appearance > Themes
3. Find "North Texas SDA Church" theme
4. Click "Activate"

### 4. Initial Configuration

#### A. Configure Permalinks
1. Go to Settings > Permalinks
2. Select "Post name" or "Custom Structure: /%postname%/"
3. Click "Save Changes"

#### B. Set Up Menus
1. Go to Appearance > Menus
2. Create a new menu called "Primary Menu"
3. Add pages:
   - Home
   - About
   - Events
   - Sermons
   - Contact
   - Give
4. Assign to "Primary Menu" location
5. Save menu

#### C. Configure Customizer
1. Go to Appearance > Customize
2. **Site Identity**:
   - Upload logo (recommended size: 300x100px)
   - Set site title: "North Texas SDA Church"
   - Set tagline
3. **Hero Section**:
   - Hero Title: "YOUR\nCOMMUNITY.\nYOUR CHURCH."
   - Hero Subtitle: "A Place where you can Worship and get Involved"
   - Hero Video URL: Upload video to Media Library and paste URL
4. **Contact Information**:
   - Church Phone
   - Church Email
   - Church Address
5. **Social Media**:
   - Add Facebook, Twitter, Instagram, YouTube, LinkedIn URLs
6. Click "Publish"

### 5. Import Content

#### Create Pages

Create the following pages:

**Home Page:**
```
Title: Home
Content: (Can be blank, uses index.php template)
Template: Default Template
```

Set as homepage:
- Settings > Reading > "A static page" > Front page: Home

**About Page:**
```
Title: About
Content: [Add church history and information]
Featured Image: Upload church photo
```

**Contact Page:**
```
Title: Contact
Content: [Add contact form using Contact Form 7 plugin]
```

**Give Page:**
```
Title: Give
Content: [Add online giving information and links]
```

#### Add Events

1. Go to Events > Add New
2. Example event:
   ```
   Title: Sabbath Worship Service
   Content: Join us every Saturday for worship...
   Event Date: [Next Saturday]
   Event Time: 10:00 AM
   Location: North Texas SDA Church
   Address: [Church address]
   Featured Image: Upload relevant image
   ```

#### Add Sermons

1. Go to Sermons > Add New
2. Example sermon:
   ```
   Title: [Sermon Title]
   Content: [Sermon description/notes]
   Sermon Date: [Date]
   Speaker: [Pastor Name]
   Video URL: https://youtube.com/watch?v=...
   Featured Image: Upload thumbnail
   ```

#### Add Team Members

1. Go to Team Members > Add New
2. Example:
   ```
   Title: Pastor Jerry Hurley
   Content: [Bio]
   Position: Senior Pastor
   Email: pastor@northtexassdachurch.com
   Phone: [Phone]
   Display Order: 1
   Featured Image: Upload photo (400x400px recommended)
   ```

### 6. Install Recommended Plugins

```
Required:
- None (theme is fully self-contained)

Recommended:
- Contact Form 7 (for contact forms)
- Yoast SEO (for SEO optimization)
- WP Super Cache (for performance)
- Wordfence Security (for security)
- UpdraftPlus (for backups)
```

### 7. Configure Email Settings

For prayer request notifications to work:

#### Option A: SMTP Plugin (Recommended)
1. Install "WP Mail SMTP" plugin
2. Configure with your email provider (Gmail, SendGrid, etc.)

#### Option B: Server Mail
Ensure your server's mail() function is configured properly.

### 8. Migration from Current Site

#### Content Migration

1. **Images**: 
   - Download all images from current site
   - Upload to WordPress Media Library
   - Update references in content

2. **Events**:
   - Review current events on the live site
   - Create corresponding Event posts in WordPress

3. **Sermons**:
   - Collect YouTube/video URLs
   - Create Sermon posts with proper metadata

4. **Team Members**:
   - Collect staff photos and bios
   - Create Team Member posts

### 9. DNS Changes

When ready to go live:

1. **Test on staging URL first** (e.g., staging.northtexassdachurch.com)
2. Update DNS records:
   ```
   A Record: @ -> [Your WordPress Server IP]
   CNAME: www -> northtexassdachurch.com
   ```
3. Wait for DNS propagation (up to 48 hours)
4. Test thoroughly

### 10. Post-Launch Checklist

- [ ] Test all forms (contact, prayer requests)
- [ ] Verify all links work
- [ ] Check mobile responsiveness
- [ ] Test countdown timer
- [ ] Verify social media links
- [ ] Check all images load
- [ ] Test video playback
- [ ] Verify prayer request emails arrive
- [ ] Check event calendar
- [ ] Test sermon video embeds
- [ ] Set up Google Analytics (if needed)
- [ ] Submit sitemap to Google Search Console
- [ ] Set up SSL certificate (HTTPS)
- [ ] Enable backups
- [ ] Test site speed

## Performance Optimization

### Caching
```bash
# Install WP Super Cache or W3 Total Cache
# Enable browser caching
# Enable GZIP compression
```

### Image Optimization
```bash
# Install Smush or EWWW Image Optimizer
# Optimize all uploaded images
# Use appropriate image sizes
```

### CDN (Optional)
- Consider Cloudflare for CDN and security
- Or use your hosting provider's CDN

## Security Hardening

1. **Update wp-config.php**:
   ```php
   define('DISALLOW_FILE_EDIT', true);
   define('WP_AUTO_UPDATE_CORE', true);
   ```

2. **Change default admin username**
3. **Use strong passwords**
4. **Install Wordfence or Sucuri**
5. **Enable SSL/HTTPS**
6. **Regular backups**

## Maintenance

### Regular Tasks
- Update WordPress core, themes, and plugins weekly
- Review prayer requests daily
- Add new events as scheduled
- Upload new sermons weekly
- Check broken links monthly
- Review analytics monthly
- Test backups monthly

## Support

For technical support:
- WordPress.org Forums
- Theme documentation: /north-texas-church-theme/README.md
- Church website: northtexassdachurch.com

## Rollback Plan

If issues occur:
1. Keep old Netlify site active during transition
2. Use WordPress backup to restore
3. Update DNS back to Netlify if needed
4. Test all changes on staging first

## Troubleshooting

### Prayer Requests Not Working
- Check PHP mail configuration
- Install WP Mail SMTP plugin
- Verify admin email in Settings > General

### Countdown Timer Not Showing
- Check JavaScript console for errors
- Ensure jQuery is loaded
- Clear browser cache

### Events/Sermons Not Displaying
- Go to Settings > Permalinks
- Click "Save Changes" (flushes rewrite rules)

### Theme Not Activating
- Check PHP version (must be 7.4+)
- Review error logs
- Ensure proper file permissions

## Next Steps

After deployment:
1. Train staff on WordPress admin
2. Document custom workflows
3. Set up content calendar
4. Plan regular content updates
5. Monitor site analytics
6. Gather user feedback
7. Plan future enhancements

---

**Last Updated**: February 2026
**Version**: 1.0.0
