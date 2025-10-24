<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->couple_nickname ?? 'Wedding Invitation' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        .font-cursive { font-family: 'Great Vibes', cursive; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Lato', sans-serif; }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(219, 39, 119, 0.1) 0%, rgba(168, 85, 247, 0.1) 100%);
        }

        /* Template Styles */
        .template-classic {
            --primary-color: #db2777;
            --secondary-color: #ec4899;
        }
        
        .template-modern {
            --primary-color: #3b82f6;
            --secondary-color: #60a5fa;
        }
        
        .template-elegant {
            --primary-color: #7c3aed;
            --secondary-color: #a78bfa;
        }
        
        .template-rustic {
            --primary-color: #92400e;
            --secondary-color: #d97706;
        }

        .section-divider {
            background: linear-gradient(to right, transparent, currentColor, transparent);
            height: 1px;
        }
    </style>
</head>
<body class="font-sans template-{{ $invitation->template_style }} bg-gray-50">

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        @if($invitation->hero_image)
            <div class="absolute inset-0 z-0">
                <img src="{{ Storage::url($invitation->hero_image) }}" alt="Hero" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>
        @else
            <div class="absolute inset-0 z-0 hero-gradient"></div>
        @endif
        
        <div class="relative z-10 text-center text-white px-4 animate-fade-in-up">
            @if($invitation->couple_nickname)
                <h1 class="font-cursive text-7xl md:text-9xl mb-6 drop-shadow-lg">
                    {{ $invitation->couple_nickname }}
                </h1>
            @else
                <div class="space-y-4">
                    <h2 class="font-cursive text-5xl md:text-7xl drop-shadow-lg">
                        {{ $invitation->bride_name ?? 'Bride' }}
                    </h2>
                    <p class="text-4xl font-light">&</p>
                    <h2 class="font-cursive text-5xl md:text-7xl drop-shadow-lg">
                        {{ $invitation->groom_name ?? 'Groom' }}
                    </h2>
                </div>
            @endif
            
            @if($invitation->wedding_date)
                <div class="mt-8 space-y-2">
                    <p class="text-2xl md:text-3xl font-serif tracking-wider">
                        {{ $invitation->wedding_date->format('F d, Y') }}
                    </p>
                    @if($invitation->venue_name)
                        <p class="text-lg md:text-xl font-light">
                            {{ $invitation->venue_name }}
                        </p>
                    @endif
                </div>
            @endif

            <div class="mt-12">
                <svg class="w-8 h-8 mx-auto animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
    </section>

    <!-- Welcome Message -->
    @if($invitation->welcome_message)
    <section class="py-20 px-4 bg-white">
        <div class="max-w-4xl mx-auto text-center">
            <div class="section-divider text-pink-600 mb-8"></div>
            <h2 class="font-serif text-4xl md:text-5xl mb-8 text-gray-800">Welcome</h2>
            <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
                {{ $invitation->welcome_message }}
            </p>
            <div class="section-divider text-pink-600 mt-8"></div>
        </div>
    </section>
    @endif

    <!-- Couple Section -->
    @if($invitation->couple_image)
    <section class="py-20 px-4 hero-gradient">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <img src="{{ Storage::url($invitation->couple_image) }}" alt="Couple" 
                         class="rounded-lg shadow-2xl w-full h-auto">
                </div>
                <div class="order-1 md:order-2 text-center md:text-left">
                    <h2 class="font-cursive text-5xl md:text-6xl mb-6 text-gray-800">
                        Our Story
                    </h2>
                    @if($invitation->love_story)
                        <p class="text-lg text-gray-700 leading-relaxed">
                            {{ $invitation->love_story }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Wedding Details -->
    <section class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-serif text-4xl md:text-5xl text-center mb-16 text-gray-800">
                Wedding Details
            </h2>
            
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Date & Time -->
                <div class="text-center p-8 bg-gradient-to-br from-pink-50 to-purple-50 rounded-lg shadow-lg">
                    <svg class="w-16 h-16 mx-auto mb-4 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="font-serif text-2xl mb-4 text-gray-800">When</h3>
                    @if($invitation->wedding_date)
                        <p class="text-xl font-semibold text-gray-700">
                            {{ $invitation->wedding_date->format('l, F d, Y') }}
                        </p>
                    @endif
                    @if($invitation->ceremony_time)
                        <p class="text-lg text-gray-600 mt-2">
                            Ceremony: {{ $invitation->ceremony_time->format('g:i A') }}
                        </p>
                    @endif
                    @if($invitation->reception_time)
                        <p class="text-lg text-gray-600">
                            Reception: {{ $invitation->reception_time->format('g:i A') }}
                        </p>
                    @endif
                </div>

                <!-- Venue -->
                <div class="text-center p-8 bg-gradient-to-br from-purple-50 to-pink-50 rounded-lg shadow-lg">
                    <svg class="w-16 h-16 mx-auto mb-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <h3 class="font-serif text-2xl mb-4 text-gray-800">Where</h3>
                    @if($invitation->venue_name)
                        <p class="text-xl font-semibold text-gray-700 mb-2">
                            {{ $invitation->venue_name }}
                        </p>
                    @endif
                    @if($invitation->full_address)
                        <p class="text-gray-600 mb-4">
                            {{ $invitation->full_address }}
                        </p>
                    @endif
                    @if($invitation->google_maps_url)
                        <a href="{{ $invitation->google_maps_url }}" target="_blank" 
                           class="inline-block px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                            View on Google Maps
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    @if($invitation->google_maps_url)
    <section class="py-20 px-4 bg-gray-100">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-serif text-4xl md:text-5xl text-center mb-12 text-gray-800">
                Location
            </h2>
            @if($invitation->venue_latitude && $invitation->venue_longitude)
                <div class="rounded-lg overflow-hidden shadow-2xl">
                    <iframe 
                        width="100%" 
                        height="450" 
                        frameborder="0" 
                        style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q={{ $invitation->venue_latitude }},{{ $invitation->venue_longitude }}&zoom=15"
                        allowfullscreen>
                    </iframe>
                </div>
                <p class="text-center mt-4 text-sm text-gray-600">
                    Note: Replace YOUR_API_KEY with your actual Google Maps API key
                </p>
            @else
                <div class="text-center p-12 bg-white rounded-lg shadow-lg">
                    <p class="text-xl text-gray-700 mb-6">
                        {{ $invitation->full_address }}
                    </p>
                    <a href="{{ $invitation->google_maps_url }}" target="_blank" 
                       class="inline-flex items-center px-8 py-4 bg-blue-600 text-white text-lg rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                        Get Directions
                    </a>
                </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Photo Gallery -->
    @if($invitation->gallery_images && count($invitation->gallery_images) > 0)
    <section class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-serif text-4xl md:text-5xl text-center mb-16 text-gray-800">
                Our Moments
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($invitation->gallery_images as $image)
                    <div class="aspect-square overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
                        <img src="{{ Storage::url($image) }}" alt="Gallery" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Special Message -->
    @if($invitation->special_message)
    <section class="py-20 px-4 hero-gradient">
        <div class="max-w-4xl mx-auto text-center">
            <svg class="w-20 h-20 mx-auto mb-8 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
            </svg>
            <p class="text-2xl md:text-3xl font-light text-gray-700 italic leading-relaxed">
                "{{ $invitation->special_message }}"
            </p>
        </div>
    </section>
    @endif

    <!-- RSVP Section -->
    @if($invitation->enable_rsvp)
    <section class="py-20 px-4 bg-white">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="font-serif text-4xl md:text-5xl mb-8 text-gray-800">
                RSVP
            </h2>
            @if($invitation->rsvp_message)
                <p class="text-lg text-gray-600 mb-8">
                    {{ $invitation->rsvp_message }}
                </p>
            @endif
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 p-8 rounded-lg shadow-lg">
                <p class="text-xl text-gray-700 mb-6">
                    Please confirm your attendance
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="px-8 py-4 bg-green-600 text-white text-lg rounded-lg hover:bg-green-700 transition-colors">
                        I'll be there
                    </button>
                    <button class="px-8 py-4 bg-red-600 text-white text-lg rounded-lg hover:bg-red-700 transition-colors">
                        Can't make it
                    </button>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Footer -->
    <footer class="py-12 px-4 bg-gray-900 text-white">
        <div class="max-w-6xl mx-auto text-center">
            <p class="font-cursive text-4xl mb-4">
                {{ $invitation->couple_nickname ?? ($invitation->bride_name . ' & ' . $invitation->groom_name) }}
            </p>
            @if($invitation->wedding_date)
                <p class="text-lg text-gray-400">
                    {{ $invitation->wedding_date->format('F d, Y') }}
                </p>
            @endif
            <div class="mt-8 flex justify-center space-x-6">
                <!-- Social media icons can be added here -->
            </div>
            <p class="mt-8 text-sm text-gray-500">
                © {{ date('Y') }} All rights reserved
            </p>
        </div>
    </footer>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, observerOptions);

        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>
</html>
