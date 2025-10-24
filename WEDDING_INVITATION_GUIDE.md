# Wedding Invitation System - User Guide

## Overview

This comprehensive wedding invitation system allows users to create personalized, beautiful wedding invitation pages with full customization capabilities. The system is designed with future template customization in mind, making it easy to add new themes and layouts.

## Features

### ✨ Core Features

1. **User Dashboard** - Manage all aspects of your wedding invitation
2. **Image Management** - Upload hero images, couple photos, and photo galleries
3. **Content Management** - Add/edit all text content (names, dates, messages, etc.)
4. **Venue Information** - Full address management with Google Maps integration
5. **Template System** - Choose from different styles (Classic, Modern, Elegant, Rustic)
6. **Responsive Design** - Beautiful on all devices (mobile, tablet, desktop)
7. **Preview & Publish** - Preview before publishing to the public
8. **Unique URLs** - Each invitation gets a custom URL (e.g., `/invitation/john-and-jane`)

### 📋 Detailed Features

#### User Dashboard Features:
- **Basic Information Section**
  - Bride's name
  - Groom's name
  - Couple nickname
  - Wedding date
  - Ceremony time
  - Reception time
  - Welcome message
  - Love story
  - Special message

- **Venue Information Section**
  - Venue name
  - Complete address (street, city, state, zipcode)
  - GPS coordinates (latitude/longitude)
  - Automatic Google Maps integration

- **Image Management**
  - Hero image (banner)
  - Couple photo
  - Photo gallery (multiple images)
  - Easy delete functionality for gallery images

- **Template & Settings**
  - Template style selection
  - Color scheme customization
  - Font style options
  - RSVP enable/disable
  - Publish/unpublish toggle
  - Share link with copy functionality

#### Public Invitation Page Features:
- Hero section with couple names and date
- Welcome message
- Couple photo with love story
- Wedding details (when & where)
- Interactive Google Maps
- Photo gallery with hover effects
- Special message section
- RSVP functionality
- Smooth scrolling and animations
- Multiple template styles

## System Architecture

### Database Structure

**wedding_invitations table:**
- User relationship (one-to-one)
- Couple information
- Wedding details
- Venue information with GPS
- Content sections
- Image paths
- Template settings
- RSVP configuration
- Publication status

### File Structure

```
app/
├── Models/
│   ├── User.php (with weddingInvitation relationship)
│   └── WeddingInvitation.php
├── Http/
    └── Controllers/
        └── WeddingInvitationController.php

resources/
└── views/
    └── invitation/
        ├── dashboard.blade.php (User dashboard)
        └── show.blade.php (Public invitation page)

routes/
└── web.php (All invitation routes)

storage/
└── app/
    └── public/
        └── wedding-images/
            ├── (hero images)
            ├── (couple images)
            └── gallery/
                └── (gallery images)
```

### Routes

**Authenticated Routes:**
- `GET /my-invitation` - User dashboard
- `PUT /my-invitation` - Update invitation data
- `POST /my-invitation/upload-hero` - Upload hero image
- `POST /my-invitation/upload-couple` - Upload couple photo
- `POST /my-invitation/upload-gallery` - Upload gallery images
- `DELETE /my-invitation/delete-gallery` - Delete gallery image
- `GET /my-invitation/preview` - Preview invitation

**Public Routes:**
- `GET /invitation/{slug}` - View published invitation

## How to Use

### For Users (Creating an Invitation)

1. **Login** to your account
2. Click **"My Wedding Invitation"** in the navigation menu
3. Fill out the **Basic Information** section:
   - Enter bride and groom names
   - Set wedding date and times
   - Write welcome message and love story
   - Click "Save Basic Information"

4. Complete the **Venue Information** section:
   - Enter venue name and complete address
   - Optionally add GPS coordinates for precise map location
   - Click "Save Venue Information"

5. Upload **Images**:
   - Upload a hero/banner image (displays at the top)
   - Upload a couple photo
   - Add multiple photos to the gallery
   - Delete unwanted gallery images using the X button

6. Configure **Template & Settings**:
   - Choose template style (Classic, Modern, Elegant, Rustic)
   - Set color scheme
   - Enable/disable RSVP
   - Check "Publish Invitation" to make it public
   - Click "Save Settings"

7. **Preview** your invitation using the "Preview" button

8. **Share** your invitation link with guests (visible when published)

### For Administrators

Admins can:
- Manage all users through the "Manage Users" menu
- View user management dashboard
- Create/edit/delete user accounts

## Template Customization (For Future Development)

The system is designed to support easy template customization:

### Current Template Styles:
1. **Classic** - Traditional wedding theme with pink/rose colors
2. **Modern** - Contemporary blue theme
3. **Elegant** - Sophisticated purple theme
4. **Rustic** - Warm brown/orange theme

### Adding New Templates:

To add a new template style:

1. **Update the migration** (if needed for new fields)
2. **Add template option** in `show.blade.php` CSS:
   ```css
   .template-yourname {
       --primary-color: #color1;
       --secondary-color: #color2;
   }
   ```
3. **Update the select dropdown** in dashboard to include new template
4. **Customize sections** as needed for the new style

### Customizable Elements:

Each template can customize:
- Color schemes
- Font families
- Section layouts
- Spacing and sizing
- Animations
- Background patterns
- Image display styles

## Technical Details

### Image Upload Specifications:
- **Supported formats:** JPEG, PNG, JPG, GIF
- **Max file size:** 2MB per image
- **Storage location:** `storage/app/public/wedding-images/`
- **Public access:** Via symbolic link at `public/storage/`

### Database Fields:

**Text Fields:**
- `bride_name`, `groom_name`, `couple_nickname`
- `venue_name`, `venue_address`, `venue_city`, `venue_state`, `venue_zipcode`
- `welcome_message`, `love_story`, `special_message`
- `template_style`, `color_scheme`, `font_style`
- `slug` (auto-generated URL identifier)

**Date/Time Fields:**
- `wedding_date` (date)
- `ceremony_time`, `reception_time` (time)

**Numeric Fields:**
- `venue_latitude`, `venue_longitude` (decimal)

**JSON Fields:**
- `gallery_images` (array of image paths)

**Boolean Fields:**
- `enable_rsvp`, `is_published`

### Validation Rules:

All inputs are validated:
- Names: max 255 characters
- Dates: valid date format
- Times: HH:MM format
- Coordinates: -90 to 90 (lat), -180 to 180 (lng)
- Images: valid image format, max 2MB
- Template style: only predefined options

## Google Maps Integration

The system supports two methods for map display:

1. **GPS Coordinates** (Recommended)
   - Most accurate
   - Requires latitude and longitude
   - Displays embedded map

2. **Address Only**
   - Uses full address
   - Shows "Get Directions" button
   - Links to Google Maps

**Note:** For embedded maps with coordinates, you'll need a Google Maps API key. Update the `YOUR_API_KEY` placeholder in `show.blade.php`.

## Security Features

- Authentication required for dashboard access
- User can only edit their own invitation
- File type validation for uploads
- SQL injection prevention via Eloquent ORM
- CSRF protection on all forms
- Image size limits prevent DOS attacks

## Future Enhancement Ideas

1. **RSVP Functionality**
   - Guest list management
   - RSVP tracking
   - Guest count statistics

2. **More Templates**
   - Beach theme
   - Garden theme
   - Winter/Christmas theme
   - Minimalist theme

3. **Customization Options**
   - Drag-and-drop section reordering
   - Custom CSS editor
   - Background music
   - Video integration

4. **Social Features**
   - Social media sharing buttons
   - Instagram/Facebook integration
   - Guest photo uploads

5. **Advanced Features**
   - Multiple event support (rehearsal dinner, after-party)
   - Gift registry links
   - Hotel accommodation info
   - Transportation details

## Troubleshooting

### Images not displaying:
1. Ensure storage link exists: `php artisan storage:link`
2. Check file permissions on `storage/app/public/`
3. Verify images are uploaded successfully

### Map not showing:
1. Check if coordinates are entered correctly
2. For embedded maps, add Google Maps API key
3. Ensure address is complete and accurate

### Invitation not accessible:
1. Check if invitation is published (checkbox in settings)
2. Verify the slug is correct in the URL
3. Clear browser cache

### Upload fails:
1. Check file size (must be under 2MB)
2. Verify file format (JPEG, PNG, JPG, GIF only)
3. Check storage permissions

## Support

For technical support or feature requests, please contact your system administrator.

## Credits

Built with:
- Laravel 10.x
- Tailwind CSS
- Alpine.js
- Google Fonts (Great Vibes, Playfair Display, Lato)
- Google Maps API

---

**Version:** 1.0.0  
**Last Updated:** October 14, 2025  
**Developer:** Your Development Team
