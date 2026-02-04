# North Texas SDA Church WordPress Theme

A beautiful, modern WordPress theme designed specifically for the North Texas Seventh-day Adventist Church. This theme was converted from a Netlify static site to a fully functional WordPress theme.

## Features

- **Responsive Design**: Fully responsive layout that looks great on all devices
- **Custom Post Types**:
  - Sermons (with video/audio support)
  - Events (with date, time, location)
  - Team Members
  - Ministries
  - Gallery
- **Custom Taxonomies**:
  - Sermon Series
  - Sermon Topics
  - Event Categories
  - Gallery Categories
- **Theme Customizer**: Extensive customization options including:
  - Church name and tagline
  - Hero section settings
  - Welcome section content
  - Mission, Vision, Values
  - Pastor information
  - Contact details
  - Social media links
  - Service times
  - Color customization
- **Built-in Features**:
  - Prayer request form (AJAX submission)
  - Contact form (AJAX submission)
  - Newsletter subscription
  - Countdown timer to next Saturday service
  - FAQ accordion
  - Responsive navigation with mobile menu
- **SEO Friendly**: Clean, semantic HTML markup
- **Fast Loading**: Optimized CSS and JavaScript

## Installation

1. Download the theme folder `north-texas-sda-church`
2. Upload it to your WordPress installation's `/wp-content/themes/` directory
3. Log in to your WordPress admin panel
4. Go to **Appearance > Themes**
5. Find "North Texas SDA Church" and click **Activate**
6. Go to **Appearance > Customize** to configure your theme settings

## Required Setup

### 1. Set Up Menus
- Go to **Appearance > Menus**
- Create a new menu and assign it to "Primary Menu"
- Create a footer menu and assign it to "Footer Menu"

### 2. Set Up Homepage
- Go to **Settings > Reading**
- Select "A static page" for "Your homepage displays"
- Create a new page (any title) and set it as the homepage
- The theme will automatically use the front-page.php template

### 3. Configure Theme Options
Go to **Appearance > Customize > Theme Options** and configure:
- General Settings (Church name, tagline)
- Hero Section (Background video/image, titles)
- Welcome Section (Text and image)
- Mission, Vision, Values
- Pastor Welcome
- Contact Information
- Social Media Links
- Service Times
- Theme Colors

## Content Management

### Sermons
1. Go to **Sermons > Add New**
2. Enter the sermon title and description
3. Set a featured image
4. Fill in the sermon details:
   - Speaker name
   - Date
   - Scripture reference
   - Video URL (YouTube, Vimeo, etc.)
   - Audio URL (for download)
   - Notes/PDF URL
   - Featured sermon checkbox

### Events
1. Go to **Events > Add New**
2. Enter the event title and description
3. Set a featured image
4. Fill in the event details:
   - Event date
   - Start and end time
   - Location name
   - Address
   - External registration link (optional)

### Team Members
1. Go to **Team > Add New**
2. Enter the team member's name
3. Add a biography in the content area
4. Set a featured image (portrait photo)
5. Fill in the details:
   - Role/Position
   - Email
   - Phone
   - Social media links
   - Display order

### Ministries
1. Go to **Ministries > Add New**
2. Enter the ministry name and description
3. Set a featured image
4. Fill in the details:
   - Ministry leader
   - Contact email
   - Meeting time
   - Meeting location

## Shortcodes

The theme includes several shortcodes you can use in pages and posts:

- `[upcoming_events count="3"]` - Display upcoming events
- `[featured_sermons count="3"]` - Display featured sermons
- `[team_members count="4"]` - Display team members
- `[ministries count="4"]` - Display ministries
- `[contact_info]` - Display contact information
- `[service_times]` - Display service times
- `[countdown]` - Display countdown timer
- `[social_links]` - Display social media links
- `[prayer_request_form]` - Display prayer request form
- `[contact_form]` - Display contact form
- `[google_map]` - Display Google Maps embed
- `[button text="Learn More" url="/about" style="primary"]` - Display a button

## Page Templates

- **Contact Page** (`page-contact.php`) - Use this template for your contact page

## Widget Areas

- Blog Sidebar
- Footer Column 1
- Footer Column 2
- Footer Column 3
- Footer Column 4

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## Credits

- **Original Design**: North Texas SDA Church Netlify Site
- **Theme Development**: Advent Tech (https://adventtech.ca/)
- **Fonts**: Google Fonts (Bebas Neue, Barlow, Barlow Condensed, Lora, Montserrat, Oswald)
- **Icons**: Font Awesome 6

## Support

For support or questions, please contact:
- Email: anwfhl-com@txsda.org
- Phone: +1 (940) 488 9656

## License

This theme is licensed under the GNU General Public License v2 or later.

---

Built with love for the North Texas SDA Church community.
