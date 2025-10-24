# Wedding Invitation System - Quick Start Guide

## 🚀 Quick Start

Your wedding invitation system is now ready to use! Follow these steps to test it:

### 1. Access the Application

The Laravel development server is running. Visit:
```
http://127.0.0.1:8000
```

### 2. Login

Use the credentials created during database seeding, or create a new account.

**Default Test Account (if seeded):**
- Email: Check your DatabaseSeeder.php
- Password: Check your DatabaseSeeder.php

### 3. Access Your Wedding Invitation Dashboard

After logging in:
1. Click **"My Wedding Invitation"** in the top navigation menu
2. You'll be taken to your personal wedding invitation dashboard

### 4. Create Your Invitation (Step by Step)

#### Step 1: Basic Information
```
✅ Fill in:
   - Bride's Name: e.g., "Sarah Johnson"
   - Groom's Name: e.g., "Michael Smith"
   - Couple Nickname: e.g., "Sarah & Michael"
   - Wedding Date: Select a date
   - Ceremony Time: e.g., "14:00"
   - Reception Time: e.g., "18:00"
   - Welcome Message: "Join us as we celebrate our love"
   - Love Story: Share your story
   - Special Message: A heartfelt message to guests
   
Click: "Save Basic Information"
```

#### Step 2: Venue Information
```
✅ Fill in:
   - Venue Name: e.g., "Grand Plaza Hotel"
   - Address: e.g., "123 Main Street"
   - City: e.g., "New York"
   - State: e.g., "NY"
   - Zipcode: e.g., "10001"
   - Latitude (optional): e.g., "40.7128"
   - Longitude (optional): e.g., "-74.0060"
   
Click: "Save Venue Information"
```

#### Step 3: Upload Images
```
✅ Upload:
   1. Hero Image (Banner):
      - Click "Choose File" under Hero Image
      - Select a beautiful banner image
      - Click "Upload"
   
   2. Couple Photo:
      - Click "Choose File" under Couple Photo
      - Select your couple photo
      - Click "Upload"
   
   3. Gallery Images:
      - Click "Choose File" under Photo Gallery
      - Select multiple images (hold Ctrl/Cmd)
      - Click "Upload"
```

#### Step 4: Configure Settings
```
✅ Configure:
   - Template Style: Choose (Classic, Modern, Elegant, or Rustic)
   - Color Scheme: e.g., "pink", "blue", "gold"
   - Font Style: e.g., "default"
   - ☑️ Enable RSVP Feature (optional)
   - ☑️ Publish Invitation (IMPORTANT - to make it public)
   
Click: "Save Settings"
```

### 5. Preview Your Invitation

Click the **"Preview"** button at the top right to see how your invitation looks.

### 6. Publish & Share

Once you're happy with the preview:
1. Make sure **"Publish Invitation"** is checked in Template & Settings
2. Click **"Save Settings"**
3. The share link will appear in a green box
4. Click **"Copy"** to copy the link
5. Share with your guests!

### 7. View Public Page

Click **"View Public Page"** button to see the live invitation as your guests will see it.

## 📱 Test Features

### Test the User Dashboard:
- ✅ Add/edit all information fields
- ✅ Upload different types of images
- ✅ Delete gallery images
- ✅ Switch between template styles
- ✅ Toggle publish on/off
- ✅ Copy share link

### Test the Public Invitation:
- ✅ View invitation in different browsers
- ✅ Test responsive design (resize browser)
- ✅ Test on mobile devices
- ✅ Click Google Maps link
- ✅ Scroll through all sections
- ✅ View animations
- ✅ Check all images display correctly

## 🎨 Template Styles

Try each template to see different looks:

1. **Classic** - Traditional pink/rose wedding theme
2. **Modern** - Contemporary blue theme  
3. **Elegant** - Sophisticated purple theme
4. **Rustic** - Warm brown/orange theme

## 📊 System Features Checklist

### ✅ Completed Features:
- [x] User authentication system
- [x] Personal wedding invitation dashboard
- [x] Complete information management (names, dates, times)
- [x] Venue information with address
- [x] Google Maps integration
- [x] Hero image upload
- [x] Couple photo upload
- [x] Photo gallery (multiple images)
- [x] Gallery image deletion
- [x] Template style selection (4 styles)
- [x] Color scheme configuration
- [x] Font style options
- [x] RSVP enable/disable
- [x] Publish/unpublish functionality
- [x] Unique invitation URL (slug-based)
- [x] Preview functionality
- [x] Share link with copy button
- [x] Public invitation page
- [x] Responsive design
- [x] Beautiful animations
- [x] Multiple sections (hero, welcome, story, details, gallery)
- [x] Navigation integration
- [x] Role-based access (User vs Admin)

## 🔗 Important URLs

```
Dashboard: http://127.0.0.1:8000/dashboard
My Invitation: http://127.0.0.1:8000/my-invitation
Preview: http://127.0.0.1:8000/my-invitation/preview
Public Invitation: http://127.0.0.1:8000/invitation/{your-slug}
```

## 🎯 Testing Scenarios

### Scenario 1: Complete Flow
1. Login as a user
2. Navigate to "My Wedding Invitation"
3. Fill all basic information
4. Add venue details
5. Upload all images
6. Select template style
7. Publish invitation
8. Preview the page
9. View public page
10. Copy and test the share link

### Scenario 2: Template Switching
1. Create invitation with one template
2. Save and preview
3. Change to different template
4. Save and preview again
5. Notice the color/style differences

### Scenario 3: Image Management
1. Upload hero image
2. Upload couple image
3. Upload 5 gallery images
4. Preview the invitation
5. Delete 2 gallery images
6. Preview again to confirm deletion

### Scenario 4: Publish/Unpublish
1. Create invitation but DON'T publish
2. Try accessing public URL (should fail)
3. Go back and publish
4. Access public URL (should work)
5. Unpublish
6. Try public URL again (should fail)

## 🐛 Common Issues & Solutions

### Issue: Images not showing
**Solution:** Run `php artisan storage:link`

### Issue: Can't access invitation dashboard
**Solution:** Make sure you're logged in and have 'user' role

### Issue: Public page shows 404
**Solution:** Check that invitation is published

### Issue: Map not loading
**Solution:** 
- Ensure coordinates are entered correctly
- For embedded map, add Google Maps API key in show.blade.php

### Issue: Upload fails
**Solution:** 
- Check file size (max 2MB)
- Check file format (JPEG, PNG, JPG, GIF)
- Ensure storage directory is writable

## 📝 Sample Data for Testing

Use this sample data to quickly test:

```
Bride Name: Emily Rose Anderson
Groom Name: James Alexander Thompson
Couple Nickname: Emily & James
Wedding Date: 2025-12-25
Ceremony Time: 15:30
Reception Time: 19:00

Venue Name: The Grand Ballroom at Riverside Manor
Address: 456 Riverside Drive
City: Portland
State: Oregon
Zipcode: 97201
Latitude: 45.5152
Longitude: -122.6784

Welcome Message:
"Together with our families, we joyfully invite you to share in the celebration of our marriage. Your presence would make our day complete."

Love Story:
"We met on a rainy Tuesday at a coffee shop, both reaching for the last blueberry muffin. That serendipitous moment led to hours of conversation, followed by years of adventures, laughter, and love. Now we're ready to begin our greatest adventure yet - marriage!"

Special Message:
"Love is not just about finding the right person, but being the right person. Thank you for being part of our journey."

Template Style: Elegant
Color Scheme: lavender
```

## 🎨 Customization Tips

### For Users:
- Use high-quality images (at least 1920x1080 for hero image)
- Keep messages concise but meaningful
- Choose a template that matches your wedding theme
- Test on mobile before sharing with guests

### For Developers:
- Templates are in `show.blade.php`
- Add new templates by adding CSS classes
- Customize colors in the template styles
- Extend fields in migration if needed
- Add new sections by modifying views

## 🚀 Next Steps

After testing:
1. Customize templates to match your branding
2. Add your Google Maps API key for embedded maps
3. Implement RSVP functionality (currently placeholder)
4. Add email notifications
5. Create more template styles
6. Add social sharing buttons
7. Implement analytics tracking

## 📚 Documentation

For complete documentation, see:
- `WEDDING_INVITATION_GUIDE.md` - Comprehensive guide
- Laravel documentation - https://laravel.com/docs
- Tailwind CSS - https://tailwindcss.com

## ✨ Enjoy!

Your wedding invitation system is ready to use. Create beautiful, personalized invitations for your special day!

---

**Need help?** Check the full guide in `WEDDING_INVITATION_GUIDE.md`
