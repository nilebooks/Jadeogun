# North Texas SDA Church WordPress Theme

A modern, responsive WordPress theme specifically designed for North Texas SDA Church, featuring event management, sermon archives, prayer requests, and more.

## Features

- **Responsive Design**: Fully responsive and mobile-friendly
- **Custom Post Types**:
  - Events with date, time, and location
  - Sermons with video/audio support
  - Prayer Requests with privacy options
  - Team Members directory
- **Prayer Request System**: Integrated prayer request form with email notifications
- **Video Background Hero Section**: Stunning hero section with customizable video background
- **Countdown Timer**: Automatic countdown to next Saturday service
- **Smooth Scrolling**: Modern smooth scroll experience
- **Customizer Options**: Extensive theme customization through WordPress Customizer
- **Widget Areas**: 4 footer widget areas
- **Navigation Menus**: Primary and footer navigation support
- **SEO Friendly**: Clean, semantic HTML5 markup
- **Translation Ready**: Full internationalization support

## Installation

1. Download the theme files
2. Upload the `north-texas-church-theme` folder to `/wp-content/themes/`
3. Activate the theme through the 'Appearance > Themes' menu in WordPress
4. Go to 'Appearance > Customize' to configure theme settings

## Theme Setup

### 1. Configure Basic Settings

Navigate to **Appearance > Customize**:

- **Site Identity**: Upload logo, set site title and tagline
- **Hero Section**: Set hero title, subtitle, and video URL
- **Contact Information**: Add church phone, email, and address
- **Social Media**: Add links to your social media profiles

### 2. Create Navigation Menus

Go to **Appearance > Menus**:

1. Create a new menu
2. Add pages/links to the menu
3. Assign it to the "Primary Menu" location

### 3. Add Content

#### Events
1. Go to **Events > Add New**
2. Fill in event details (date, time, location, address)
3. Add featured image
4. Publish

#### Sermons
1. Go to **Sermons > Add New**
2. Add sermon title and description
3. Fill in speaker, date, video URL, and audio URL
4. Add featured image
5. Publish

#### Team Members
1. Go to **Team Members > Add New**
2. Add member name as title
3. Add bio in the content area
4. Fill in position, email, phone, and display order
5. Add profile photo as featured image
6. Publish

#### Prayer Requests
Prayer requests are submitted through the front-end form and appear in **Prayer Requests** in the admin. You can:
- View submitted requests
- Update status (Pending, Praying, Answered)
- See contact information and preferences

### 4. Create Pages

Create the following pages for best results:

- **Home** - Set as front page (Settings > Reading)
- **About** - About your church
- **Events** - Will show event archive
- **Sermons** - Will show sermon archive
- **Contact** - Contact information
- **Give** - Online giving information
- **Get Involved** - Ministries and volunteer opportunities

## Customization

### Theme Colors

To change theme colors, edit the CSS variables in `style.css`:

```css
:root {
    --primary-color: #1e3a8a;
    --secondary-color: #3b82f6;
    --text-color: #333;
    --background-color: #fff;
}
```

### Hero Video

Upload your hero video to the media library and add the URL in **Appearance > Customize > Hero Section > Hero Video URL**.

Recommended video specifications:
- Format: MP4
- Resolution: 1920x1080 or higher
- Duration: 10-30 seconds (looping)
- Size: Under 10MB for optimal performance

## Widget Areas

The theme includes 4 footer widget areas:

- Footer Column 1
- Footer Column 2
- Footer Column 3
- Footer Column 4

Add widgets through **Appearance > Widgets**.

## Prayer Request Form

The prayer request button appears in the header. When clicked, it opens a modal with a form that:

- Collects name, email, phone, category, and request details
- Allows users to mark requests as confidential
- Sends email notification to site admin
- Stores requests in WordPress as custom post type
- Thanks submitters with a beautiful success message

## Support

For support and questions, please contact: northtexassdachurch.com

## Credits

- **Font Awesome**: Icon fonts (https://fontawesome.com)
- **Google Fonts**: Barlow, Barlow Condensed, Bebas Neue, Lora, Oswald
- **Lenis**: Smooth scrolling library

## Changelog

### Version 1.0.0
- Initial release
- Custom post types for Events, Sermons, Prayer Requests, Team Members
- Prayer request system with email notifications
- Customizer options for hero section, contact info, and social media
- Responsive design
- Countdown timer to next service
- Video background hero section

## License

This theme is licensed under the GPL v2 or later.
Copyright (C) 2026 North Texas SDA Church

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)
