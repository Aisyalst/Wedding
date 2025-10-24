# Wedding Invitation System - Architecture Diagram

## System Flow Diagram

```
┌─────────────────────────────────────────────────────────────────────────┐
│                         WEDDING INVITATION SYSTEM                        │
└─────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────┐
│                              USER TYPES                                  │
├─────────────────────────────────────────────────────────────────────────┤
│  👤 Admin User                    👥 Regular User                        │
│  - Manage all users              - Create own invitation                │
│  - View user list                - Edit invitation                       │
│  - Create/Edit/Delete users      - Upload images                        │
│                                  - Publish invitation                    │
│                                  - Share with guests                     │
└─────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────┐
│                           MAIN COMPONENTS                                │
└─────────────────────────────────────────────────────────────────────────┘

┌──────────────────┐         ┌──────────────────┐         ┌──────────────┐
│   FRONTEND       │────────▶│   CONTROLLER     │────────▶│   DATABASE   │
│   (Views)        │◀────────│   (Logic)        │◀────────│   (MySQL)    │
└──────────────────┘         └──────────────────┘         └──────────────┘
   │                              │                              │
   │  - Dashboard                 │  - WeddingInvitation        │  - users
   │  - Public Page               │    Controller                │  - wedding_
   │  - Navigation                │  - UserController            │    invitations
   │                              │  - ProfileController         │
   │                              │                              │
   └──────────────────────────────┴──────────────────────────────┘


┌─────────────────────────────────────────────────────────────────────────┐
│                         DATABASE RELATIONSHIPS                           │
└─────────────────────────────────────────────────────────────────────────┘

    ┌────────────────┐                    ┌──────────────────────────┐
    │     users      │                    │  wedding_invitations     │
    ├────────────────┤                    ├──────────────────────────┤
    │ • id           │ ◀───────────────── │ • id                     │
    │ • name         │   one-to-one       │ • user_id (FK)           │
    │ • email        │                    │ • bride_name             │
    │ • password     │                    │ • groom_name             │
    │ • role         │                    │ • couple_nickname        │
    └────────────────┘                    │ • wedding_date           │
                                          │ • ceremony_time          │
                                          │ • reception_time         │
                                          │ • venue_name             │
                                          │ • venue_address          │
                                          │ • venue_latitude         │
                                          │ • venue_longitude        │
                                          │ • welcome_message        │
                                          │ • love_story             │
                                          │ • special_message        │
                                          │ • hero_image             │
                                          │ • couple_image           │
                                          │ • gallery_images (JSON)  │
                                          │ • template_style         │
                                          │ • color_scheme           │
                                          │ • font_style             │
                                          │ • enable_rsvp            │
                                          │ • is_published           │
                                          │ • slug (unique)          │
                                          └──────────────────────────┘


┌─────────────────────────────────────────────────────────────────────────┐
│                            ROUTES STRUCTURE                              │
└─────────────────────────────────────────────────────────────────────────┘

PUBLIC ROUTES
├── GET  /                                    → Welcome page
└── GET  /invitation/{slug}                   → Public invitation page

AUTHENTICATED ROUTES (middleware: auth)
├── GET    /dashboard                         → Admin/User dashboard
├── GET    /profile                           → User profile
│
├── ADMIN ROUTES
│   ├── GET    /users                         → User list
│   ├── POST   /users                         → Create user
│   ├── GET    /users/{id}/edit               → Edit user
│   ├── PUT    /users/{id}                    → Update user
│   └── DELETE /users/{id}                    → Delete user
│
└── INVITATION ROUTES (User)
    ├── GET    /my-invitation                 → Dashboard
    ├── PUT    /my-invitation                 → Update data
    ├── POST   /my-invitation/upload-hero     → Upload hero image
    ├── POST   /my-invitation/upload-couple   → Upload couple image
    ├── POST   /my-invitation/upload-gallery  → Upload gallery
    ├── DELETE /my-invitation/delete-gallery  → Delete gallery image
    └── GET    /my-invitation/preview         → Preview


┌─────────────────────────────────────────────────────────────────────────┐
│                        USER DASHBOARD SECTIONS                           │
└─────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────┐
│  HEADER: My Wedding Invitation    [Preview] [View Public Page]         │
├─────────────────────────────────────────────────────────────────────────┤
│                                                                          │
│  ┌──────────────────────────────────────────────────────────────────┐  │
│  │ 1. BASIC INFORMATION SECTION                                     │  │
│  ├──────────────────────────────────────────────────────────────────┤  │
│  │  • Bride's Name              • Groom's Name                      │  │
│  │  • Couple Nickname           • Wedding Date                      │  │
│  │  • Ceremony Time             • Reception Time                    │  │
│  │  • Welcome Message (textarea)                                    │  │
│  │  • Love Story (textarea)                                         │  │
│  │  • Special Message (textarea)                                    │  │
│  │                                                                   │  │
│  │  [Save Basic Information]                                        │  │
│  └──────────────────────────────────────────────────────────────────┘  │
│                                                                          │
│  ┌──────────────────────────────────────────────────────────────────┐  │
│  │ 2. VENUE INFORMATION SECTION                                     │  │
│  ├──────────────────────────────────────────────────────────────────┤  │
│  │  • Venue Name                • Address                           │  │
│  │  • City                      • State                             │  │
│  │  • Zipcode                   • Latitude (optional)               │  │
│  │  • Longitude (optional)                                          │  │
│  │                                                                   │  │
│  │  [Save Venue Information]                                        │  │
│  └──────────────────────────────────────────────────────────────────┘  │
│                                                                          │
│  ┌──────────────────────────────────────────────────────────────────┐  │
│  │ 3. IMAGES SECTION                                                │  │
│  ├──────────────────────────────────────────────────────────────────┤  │
│  │  HERO IMAGE (BANNER)                                             │  │
│  │  [Current Image Preview]                                         │  │
│  │  [Choose File] [Upload]                                          │  │
│  │                                                                   │  │
│  │  COUPLE PHOTO                                                    │  │
│  │  [Current Image Preview]                                         │  │
│  │  [Choose File] [Upload]                                          │  │
│  │                                                                   │  │
│  │  PHOTO GALLERY                                                   │  │
│  │  [Image 1 ❌] [Image 2 ❌] [Image 3 ❌] [Image 4 ❌]              │  │
│  │  [Choose Multiple Files] [Upload]                                │  │
│  └──────────────────────────────────────────────────────────────────┘  │
│                                                                          │
│  ┌──────────────────────────────────────────────────────────────────┐  │
│  │ 4. TEMPLATE & SETTINGS SECTION                                   │  │
│  ├──────────────────────────────────────────────────────────────────┤  │
│  │  • Template Style: [Classic ▼]                                   │  │
│  │  • Color Scheme: [________]                                      │  │
│  │  • Font Style: [________]                                        │  │
│  │  ☐ Enable RSVP Feature                                           │  │
│  │  ☑ Publish Invitation (Make it publicly accessible)              │  │
│  │                                                                   │  │
│  │  ┌────────────────────────────────────────────────────────────┐ │  │
│  │  │ 🟢 Your invitation is live! Share this link:              │ │  │
│  │  │ [https://yoursite.com/invitation/your-slug]  [Copy]       │ │  │
│  │  └────────────────────────────────────────────────────────────┘ │  │
│  │                                                                   │  │
│  │  [Save Settings]                                                 │  │
│  └──────────────────────────────────────────────────────────────────┘  │
└─────────────────────────────────────────────────────────────────────────┘


┌─────────────────────────────────────────────────────────────────────────┐
│                       PUBLIC INVITATION PAGE LAYOUT                      │
└─────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────┐
│                        1. HERO SECTION (Full Screen)                     │
│                                                                          │
│                         [HERO IMAGE BACKGROUND]                          │
│                                                                          │
│                         Sarah & Michael                                  │
│                      December 25, 2025                                   │
│                      The Grand Ballroom                                  │
│                                                                          │
│                              ▼ (scroll)                                  │
└─────────────────────────────────────────────────────────────────────────┘
┌─────────────────────────────────────────────────────────────────────────┐
│                        2. WELCOME SECTION                                │
│                      ───────────────────                                 │
│                           Welcome                                        │
│                      ───────────────────                                 │
│                                                                          │
│              Join us as we celebrate our love...                         │
└─────────────────────────────────────────────────────────────────────────┘
┌─────────────────────────────────────────────────────────────────────────┐
│                        3. OUR STORY SECTION                              │
│                                                                          │
│  ┌─────────────────────┐    ┌──────────────────────┐                   │
│  │                     │    │   Our Story          │                    │
│  │  [COUPLE PHOTO]     │    │                      │                    │
│  │                     │    │  We met on a rainy   │                    │
│  │                     │    │  Tuesday morning...  │                    │
│  └─────────────────────┘    └──────────────────────┘                    │
└─────────────────────────────────────────────────────────────────────────┘
┌─────────────────────────────────────────────────────────────────────────┐
│                        4. WEDDING DETAILS                                │
│                                                                          │
│       Wedding Details                                                    │
│                                                                          │
│  ┌────────────────────┐      ┌────────────────────┐                    │
│  │  📅 WHEN           │      │  📍 WHERE          │                     │
│  │                    │      │                    │                     │
│  │  December 25, 2025 │      │  Grand Ballroom    │                    │
│  │  Ceremony: 3:30 PM │      │  123 Main St       │                    │
│  │  Reception: 7:00 PM│      │  Portland, OR      │                    │
│  │                    │      │                    │                     │
│  │                    │      │  [View on Maps]    │                    │
│  └────────────────────┘      └────────────────────┘                    │
└─────────────────────────────────────────────────────────────────────────┘
┌─────────────────────────────────────────────────────────────────────────┐
│                        5. LOCATION MAP                                   │
│                                                                          │
│                         Location                                         │
│                                                                          │
│               [EMBEDDED GOOGLE MAP]                                      │
│               or                                                         │
│               [Get Directions Button]                                    │
└─────────────────────────────────────────────────────────────────────────┘
┌─────────────────────────────────────────────────────────────────────────┐
│                        6. PHOTO GALLERY                                  │
│                                                                          │
│                      Our Moments                                         │
│                                                                          │
│  [Photo 1] [Photo 2] [Photo 3] [Photo 4]                                │
│  [Photo 5] [Photo 6] [Photo 7] [Photo 8]                                │
└─────────────────────────────────────────────────────────────────────────┘
┌─────────────────────────────────────────────────────────────────────────┐
│                        7. SPECIAL MESSAGE                                │
│                                                                          │
│                            ❤️                                            │
│                                                                          │
│         "Love is not just about finding the right person,                │
│          but being the right person..."                                  │
└─────────────────────────────────────────────────────────────────────────┘
┌─────────────────────────────────────────────────────────────────────────┐
│                        8. RSVP SECTION (Optional)                        │
│                                                                          │
│                           RSVP                                           │
│                                                                          │
│              Please confirm your attendance                              │
│                                                                          │
│              [I'll be there]  [Can't make it]                            │
└─────────────────────────────────────────────────────────────────────────┘
┌─────────────────────────────────────────────────────────────────────────┐
│                        9. FOOTER                                         │
│                                                                          │
│                      Sarah & Michael                                     │
│                    December 25, 2025                                     │
│                                                                          │
│                  © 2025 All rights reserved                              │
└─────────────────────────────────────────────────────────────────────────┘


┌─────────────────────────────────────────────────────────────────────────┐
│                        IMAGE STORAGE STRUCTURE                           │
└─────────────────────────────────────────────────────────────────────────┘

storage/
└── app/
    └── public/
        └── wedding-images/
            ├── hero_123456789.jpg       (Hero images)
            ├── hero_987654321.jpg
            ├── couple_123456789.jpg     (Couple photos)
            ├── couple_987654321.jpg
            └── gallery/
                ├── gallery_1.jpg        (Gallery images)
                ├── gallery_2.jpg
                ├── gallery_3.jpg
                └── gallery_4.jpg

public/
└── storage/  → ../storage/app/public  (Symlink)


┌─────────────────────────────────────────────────────────────────────────┐
│                        TEMPLATE SYSTEM FLOW                              │
└─────────────────────────────────────────────────────────────────────────┘

User Selects Template
         │
         ├── Classic    → Pink/Rose Colors    → Traditional Style
         │
         ├── Modern     → Blue Colors         → Contemporary Style
         │
         ├── Elegant    → Purple Colors       → Sophisticated Style
         │
         └── Rustic     → Brown/Orange Colors → Warm Natural Style
                                │
                                ▼
                        Applied to Public Page
                                │
                                ▼
                    All Sections Styled Accordingly


┌─────────────────────────────────────────────────────────────────────────┐
│                         SECURITY LAYERS                                  │
└─────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────┐
│  1. Authentication Layer                                                 │
│     • Laravel Breeze Authentication                                      │
│     • Middleware protection on routes                                    │
│     • Session management                                                 │
├─────────────────────────────────────────────────────────────────────────┤
│  2. Authorization Layer                                                  │
│     • User can only edit own invitation                                  │
│     • Admin access to user management                                    │
│     • Role-based menu display                                            │
├─────────────────────────────────────────────────────────────────────────┤
│  3. Validation Layer                                                     │
│     • Form field validation                                              │
│     • File type checking                                                 │
│     • File size limits (2MB)                                             │
│     • Data type validation                                               │
├─────────────────────────────────────────────────────────────────────────┤
│  4. Protection Layer                                                     │
│     • CSRF tokens on forms                                               │
│     • SQL injection prevention (Eloquent)                                │
│     • XSS protection (Blade escaping)                                    │
│     • Published-only public access                                       │
└─────────────────────────────────────────────────────────────────────────┘


┌─────────────────────────────────────────────────────────────────────────┐
│                      REQUEST → RESPONSE FLOW                             │
└─────────────────────────────────────────────────────────────────────────┘

USER ACTION (Example: Upload Hero Image)
       │
       ▼
1. Browser sends POST request to /my-invitation/upload-hero
       │
       ▼
2. Laravel Router receives request
       │
       ▼
3. Authentication Middleware checks if user is logged in
       │
       ▼
4. Route directs to WeddingInvitationController@uploadHeroImage
       │
       ▼
5. Controller validates the uploaded file
       │
       ▼
6. File is stored in storage/app/public/wedding-images/
       │
       ▼
7. Database is updated with file path
       │
       ▼
8. Success message is flashed to session
       │
       ▼
9. User is redirected back to dashboard
       │
       ▼
10. Dashboard view displays success message and new image


┌─────────────────────────────────────────────────────────────────────────┐
│                    FUTURE ENHANCEMENT ARCHITECTURE                       │
└─────────────────────────────────────────────────────────────────────────┘

CURRENT SYSTEM (Implemented)
       │
       ├── Basic invitation management
       ├── Image uploads
       ├── Template selection
       └── Publish/share
              │
              ▼
PHASE 2: RSVP System
       │
       ├── Create RSVPs table
       ├── Guest management
       ├── RSVP form
       └── Response tracking
              │
              ▼
PHASE 3: Advanced Customization
       │
       ├── More templates (10+)
       ├── Custom CSS editor
       ├── Drag-drop sections
       └── Live preview editor
              │
              ▼
PHASE 4: Social Features
       │
       ├── Social media sharing
       ├── Guest photo uploads
       ├── Comments/wishes
       └── Live event updates
              │
              ▼
PHASE 5: Premium Features
       │
       ├── Video backgrounds
       ├── Background music
       ├── Gift registry
       ├── Hotel information
       └── Analytics dashboard


═══════════════════════════════════════════════════════════════════════════
                            SYSTEM COMPLETE! ✅
═══════════════════════════════════════════════════════════════════════════

All components are implemented, tested, and ready to use!
Start creating beautiful wedding invitations now! 💒💕
