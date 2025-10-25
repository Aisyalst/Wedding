<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->couple_nickname ?? 'Wedding Invitation' }} - You're Invited!</title>
    
    @php
        use Illuminate\Support\Facades\Storage;
    @endphp
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        .font-cursive { font-family: 'Great+Vibes', cursive; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-elegant { font-family: 'Cormorant Garamond', serif; }
        .font-modern { font-family: 'Montserrat', sans-serif; }
        
        body {
            font-family: 'Montserrat', sans-serif;
        }

        /* Gradient Overlays */
        .gradient-overlay {
            background: linear-gradient(135deg, rgba(219, 39, 119, 0.85) 0%, rgba(168, 85, 247, 0.85) 100%);
        }

        .gradient-overlay-light {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.95) 100%);
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.8s ease-out;
        }

        /* Hero Section Styles */
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(219, 39, 119, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(168, 85, 247, 0.1) 0%, transparent 50%);
        }

        /* Divider Styles */
        .ornament-divider {
            position: relative;
            text-align: center;
            margin: 3rem 0;
        }

        .ornament-divider::before,
        .ornament-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background: linear-gradient(to right, transparent, #d1d5db, transparent);
        }

        .ornament-divider::before {
            left: 0;
        }

        .ornament-divider::after {
            right: 0;
        }

        /* Card Styles */
        .card-elegant {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-elegant:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.12);
        }

        /* Countdown Styles */
        .countdown-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            color: white;
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
        }

        /* Gallery Styles */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        /* Map Container */
        .map-container {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        /* Music Player Button */
        .music-button {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 1000;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
            transition: transform 0.3s ease;
        }

        .music-button:hover {
            transform: scale(1.1);
        }

        .music-button.playing {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5); }
            50% { box-shadow: 0 8px 35px rgba(102, 126, 234, 0.8); }
        }

        /* Scroll to Top Button */
        .scroll-top {
            position: fixed;
            bottom: 2rem;
            left: 2rem;
            z-index: 1000;
            background: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        /* Responsive Typography */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 4rem !important;
            }
            .hero-subtitle {
                font-size: 1.5rem !important;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 3rem !important;
            }
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Loading Screen -->
    <div id="loading-screen" class="fixed inset-0 bg-white z-50 flex items-center justify-center">
        <div class="text-center">
            <div class="inline-block animate-spin rounded-full h-16 w-16 border-b-2 border-pink-600 mb-4"></div>
            <p class="font-elegant text-2xl text-gray-700">Loading Your Invitation...</p>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        @if($invitation->hero_image)
            <div class="absolute inset-0 z-0">
                <img src="{{ Storage::url($invitation->hero_image) }}" alt="Hero Background" class="w-full h-full object-cover">
                <div class="absolute inset-0 gradient-overlay"></div>
            </div>
        @else
            <div class="absolute inset-0 z-0 bg-gradient-to-br from-pink-100 via-purple-50 to-indigo-100 hero-pattern"></div>
        @endif
        
        <!-- Floating Hearts Decoration -->
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <i class="fas fa-heart absolute text-pink-300 opacity-20 text-4xl animate-float" style="top: 10%; left: 10%;"></i>
            <i class="fas fa-heart absolute text-purple-300 opacity-20 text-3xl animate-float" style="top: 20%; right: 15%; animation-delay: 1s;"></i>
            <i class="fas fa-heart absolute text-pink-300 opacity-20 text-5xl animate-float" style="bottom: 15%; left: 20%; animation-delay: 2s;"></i>
            <i class="fas fa-heart absolute text-purple-300 opacity-20 text-3xl animate-float" style="bottom: 25%; right: 10%; animation-delay: 1.5s;"></i>
        </div>

        <div class="relative z-10 text-center px-4 py-20 max-w-5xl mx-auto">
            <div data-aos="fade-down" data-aos-duration="1000">
                <p class="font-elegant text-white text-xl md:text-2xl mb-6 tracking-wider">
                    THE WEDDING OF
                </p>
            </div>

            <div data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="300">
                @if($invitation->couple_nickname)
                    <h1 class="hero-title font-cursive text-8xl md:text-9xl text-white mb-8 drop-shadow-2xl">
                        {{ $invitation->couple_nickname }}
                    </h1>
                @else
                    <div class="space-y-6">
                        <h2 class="font-cursive text-6xl md:text-7xl text-white drop-shadow-2xl">
                            {{ $invitation->bride_name ?? 'Bride' }}
                        </h2>
                        <div class="flex items-center justify-center space-x-4">
                            <div class="h-px w-16 bg-white"></div>
                            <i class="fas fa-heart text-white text-3xl"></i>
                            <div class="h-px w-16 bg-white"></div>
                        </div>
                        <h2 class="font-cursive text-6xl md:text-7xl text-white drop-shadow-2xl">
                            {{ $invitation->groom_name ?? 'Groom' }}
                        </h2>
                    </div>
                @endif
            </div>

            @if($invitation->wedding_date)
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600" class="mt-12">
                    <div class="inline-block bg-white/20 backdrop-blur-md rounded-2xl px-8 py-6 border border-white/30">
                        <p class="font-serif text-white text-3xl md:text-4xl mb-2">
                            {{ $invitation->wedding_date->format('F d, Y') }}
                        </p>
                        @if($invitation->venue_name)
                            <p class="text-white/90 text-lg md:text-xl font-light">
                                <i class="fas fa-map-marker-alt mr-2"></i>{{ $invitation->venue_name }}
                            </p>
                        @endif
                    </div>
                </div>
            @endif

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="900" class="mt-12">
                <a href="#details" class="inline-block bg-white text-purple-600 px-8 py-4 rounded-full font-semibold hover:bg-purple-50 transition-all transform hover:scale-105 shadow-xl">
                    <i class="fas fa-chevron-down mr-2"></i>View Details
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
            <i class="fas fa-chevron-down text-white text-2xl opacity-70"></i>
        </div>
    </section>

    <!-- Couple Section -->
    @if($invitation->bride_name || $invitation->groom_name)
    <section id="couple" class="py-20 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-cursive text-6xl text-gray-800 mb-4">The Happy Couple</h2>
                <div class="ornament-divider">
                    <i class="fas fa-heart text-pink-500 text-2xl"></i>
                </div>
                @if($invitation->love_story)
                    <p class="font-elegant text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                        {{ $invitation->love_story }}
                    </p>
                @endif
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Bride -->
                <div class="text-center" data-aos="fade-right" data-aos-duration="1000">
                    <div class="relative inline-block mb-6">
                        @if($invitation->couple_image)
                            <img src="{{ Storage::url($invitation->couple_image) }}" alt="{{ $invitation->bride_name }}" class="w-64 h-64 object-cover rounded-full border-8 border-pink-100 shadow-2xl mx-auto">
                        @else
                            <div class="w-64 h-64 bg-gradient-to-br from-pink-200 to-purple-200 rounded-full border-8 border-pink-100 shadow-2xl flex items-center justify-center mx-auto">
                                <i class="fas fa-user-circle text-white text-8xl"></i>
                            </div>
                        @endif
                        <div class="absolute -bottom-2 -right-2 bg-pink-500 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-female text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="font-cursive text-5xl text-gray-800 mb-2">{{ $invitation->bride_name ?? 'The Bride' }}</h3>
                    <div class="mt-4 flex justify-center space-x-4">
                        <div class="w-12 h-px bg-pink-300"></div>
                        <i class="fas fa-heart text-pink-500"></i>
                        <div class="w-12 h-px bg-pink-300"></div>
                    </div>
                </div>

                <!-- Groom -->
                <div class="text-center" data-aos="fade-left" data-aos-duration="1000">
                    <div class="relative inline-block mb-6">
                        @if($invitation->couple_image)
                            <img src="{{ Storage::url($invitation->couple_image) }}" alt="{{ $invitation->groom_name }}" class="w-64 h-64 object-cover rounded-full border-8 border-purple-100 shadow-2xl mx-auto">
                        @else
                            <div class="w-64 h-64 bg-gradient-to-br from-purple-200 to-indigo-200 rounded-full border-8 border-purple-100 shadow-2xl flex items-center justify-center mx-auto">
                                <i class="fas fa-user-circle text-white text-8xl"></i>
                            </div>
                        @endif
                        <div class="absolute -bottom-2 -right-2 bg-purple-500 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-male text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="font-cursive text-5xl text-gray-800 mb-2">{{ $invitation->groom_name ?? 'The Groom' }}</h3>
                    <div class="mt-4 flex justify-center space-x-4">
                        <div class="w-12 h-px bg-purple-300"></div>
                        <i class="fas fa-heart text-purple-500"></i>
                        <div class="w-12 h-px bg-purple-300"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Event Details Section -->
    @if($invitation->wedding_date)
    <section id="details" class="py-20 bg-gradient-to-br from-pink-50 via-purple-50 to-indigo-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-cursive text-6xl text-gray-800 mb-4">When & Where</h2>
                <div class="ornament-divider">
                    <i class="fas fa-calendar-heart text-pink-500 text-2xl"></i>
                </div>
            </div>

            <!-- Countdown Timer -->
            <div class="mb-16" data-aos="zoom-in">
                <div class="countdown-box max-w-4xl mx-auto">
                    <h3 class="font-elegant text-2xl mb-6">Counting Down To Our Big Day</h3>
                    <div id="countdown" class="grid grid-cols-4 gap-4 text-center">
                        <div>
                            <div class="text-5xl font-bold" id="days">0</div>
                            <div class="text-sm uppercase mt-2 opacity-90">Days</div>
                        </div>
                        <div>
                            <div class="text-5xl font-bold" id="hours">0</div>
                            <div class="text-sm uppercase mt-2 opacity-90">Hours</div>
                        </div>
                        <div>
                            <div class="text-5xl font-bold" id="minutes">0</div>
                            <div class="text-sm uppercase mt-2 opacity-90">Minutes</div>
                        </div>
                        <div>
                            <div class="text-5xl font-bold" id="seconds">0</div>
                            <div class="text-sm uppercase mt-2 opacity-90">Seconds</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Cards -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Ceremony Card -->
                @if($invitation->ceremony_time)
                <div class="card-elegant p-8" data-aos="fade-right" data-aos-duration="1000">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <i class="fas fa-ring text-white text-3xl"></i>
                        </div>
                        <h3 class="font-serif text-3xl text-gray-800 mb-4">Ceremony</h3>
                        <div class="space-y-3 text-gray-600">
                            <p class="flex items-center justify-center text-lg">
                                <i class="fas fa-calendar mr-3 text-pink-500"></i>
                                <span>{{ $invitation->wedding_date->format('l, F d, Y') }}</span>
                            </p>
                            <p class="flex items-center justify-center text-lg">
                                <i class="fas fa-clock mr-3 text-pink-500"></i>
                                <span>{{ $invitation->ceremony_time }}</span>
                            </p>
                            @if($invitation->venue_name)
                            <p class="flex items-center justify-center text-lg">
                                <i class="fas fa-map-marker-alt mr-3 text-pink-500"></i>
                                <span>{{ $invitation->venue_name }}</span>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Reception Card -->
                @if($invitation->reception_time)
                <div class="card-elegant p-8" data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <i class="fas fa-champagne-glasses text-white text-3xl"></i>
                        </div>
                        <h3 class="font-serif text-3xl text-gray-800 mb-4">Reception</h3>
                        <div class="space-y-3 text-gray-600">
                            <p class="flex items-center justify-center text-lg">
                                <i class="fas fa-calendar mr-3 text-purple-500"></i>
                                <span>{{ $invitation->wedding_date->format('l, F d, Y') }}</span>
                            </p>
                            <p class="flex items-center justify-center text-lg">
                                <i class="fas fa-clock mr-3 text-purple-500"></i>
                                <span>{{ $invitation->reception_time }}</span>
                            </p>
                            @if($invitation->venue_name)
                            <p class="flex items-center justify-center text-lg">
                                <i class="fas fa-map-marker-alt mr-3 text-purple-500"></i>
                                <span>{{ $invitation->venue_name }}</span>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    <!-- Venue Map Section -->
    @if($invitation->venue_address || $invitation->venue_name)
    <section id="venue" class="py-20 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-cursive text-6xl text-gray-800 mb-4">Find Us Here</h2>
                <div class="ornament-divider">
                    <i class="fas fa-map-marked-alt text-pink-500 text-2xl"></i>
                </div>
                @if($invitation->venue_address)
                    <p class="font-elegant text-gray-600 text-xl max-w-2xl mx-auto">
                        {{ $invitation->venue_address }}
                        @if($invitation->venue_city), {{ $invitation->venue_city }}@endif
                        @if($invitation->venue_state), {{ $invitation->venue_state }}@endif
                        @if($invitation->venue_zipcode) {{ $invitation->venue_zipcode }}@endif
                    </p>
                @endif
            </div>

            <div data-aos="zoom-in" data-aos-duration="1000">
                <div class="map-container">
                    @if($invitation->venue_address)
                        <!-- Generate Google Maps embed from address -->
                        <iframe 
                            src="https://maps.google.com/maps?q={{ urlencode($invitation->venue_address . ', ' . ($invitation->venue_city ?? '') . ', ' . ($invitation->venue_state ?? '')) }}&output=embed" 
                            width="100%" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy"
                            class="w-full">
                        </iframe>
                    @elseif($invitation->venue_name)
                        <!-- Generate Google Maps embed from venue name -->
                        <iframe 
                            src="https://maps.google.com/maps?q={{ urlencode($invitation->venue_name) }}&output=embed" 
                            width="100%" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy"
                            class="w-full">
                        </iframe>
                    @endif
                </div>

                <!-- Direction Buttons -->
                <div class="text-center mt-8 space-x-4">
                    @if($invitation->venue_address)
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($invitation->venue_address . ', ' . ($invitation->venue_city ?? '') . ', ' . ($invitation->venue_state ?? '')) }}" 
                           target="_blank" 
                           class="inline-block bg-gradient-to-r from-pink-500 to-purple-500 text-white px-8 py-4 rounded-full font-semibold hover:from-pink-600 hover:to-purple-600 transition-all transform hover:scale-105 shadow-lg">
                            <i class="fas fa-directions mr-2"></i>Get Directions
                        </a>
                    @elseif($invitation->venue_name)
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($invitation->venue_name) }}" 
                           target="_blank" 
                           class="inline-block bg-gradient-to-r from-pink-500 to-purple-500 text-white px-8 py-4 rounded-full font-semibold hover:from-pink-600 hover:to-purple-600 transition-all transform hover:scale-105 shadow-lg">
                            <i class="fas fa-directions mr-2"></i>Get Directions
                        </a>
                    @endif
                    <a href="https://maps.google.com" 
                       target="_blank" 
                       class="inline-block bg-white text-gray-700 px-8 py-4 rounded-full font-semibold border-2 border-gray-300 hover:bg-gray-50 transition-all transform hover:scale-105">
                        <i class="fas fa-map mr-2"></i>Open in Maps
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Gallery Section -->
    @if($invitation->gallery_images && count(json_decode($invitation->gallery_images)) > 0)
    <section id="gallery" class="py-20 bg-gradient-to-br from-purple-50 via-pink-50 to-indigo-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-cursive text-6xl text-gray-800 mb-4">Our Memories</h2>
                <div class="ornament-divider">
                    <i class="fas fa-images text-pink-500 text-2xl"></i>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach(json_decode($invitation->gallery_images) as $index => $image)
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                        <img src="{{ Storage::url($image) }}" alt="Gallery Image {{ $index + 1 }}" class="w-full h-64 object-cover">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- RSVP / Guestbook Section -->
    @if($invitation->enable_rsvp)
    <section id="rsvp" class="py-20 bg-white">
        <div class="container mx-auto px-4 max-w-3xl">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-cursive text-6xl text-gray-800 mb-4">Will You Join Us?</h2>
                <div class="ornament-divider">
                    <i class="fas fa-envelope-open-heart text-pink-500 text-2xl"></i>
                </div>
                <p class="font-elegant text-gray-600 text-lg">
                    Please let us know if you can make it to our special day
                </p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg mb-6 flex items-center" data-aos="fade-down">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="card-elegant p-10" data-aos="zoom-in">
                <form action="{{ route('guestbook.store', $invitation->slug) }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('name') border-red-500 @enderror" 
                               placeholder="Your full name">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Email <span class="text-gray-400 text-sm">(Optional)</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('email') border-red-500 @enderror" 
                               placeholder="your.email@example.com">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Will you attend? <span class="text-red-500">*</span>
                        </label>
                        <div class="flex flex-wrap gap-4">
                            <label class="flex items-center space-x-2 cursor-pointer px-4 py-2 border border-gray-300 rounded-lg hover:bg-green-50 hover:border-green-500 transition-all">
                                <input type="radio" name="attendance" value="yes" required class="w-5 h-5 text-green-600" {{ old('attendance') == 'yes' ? 'checked' : '' }}>
                                <span class="text-gray-700 font-medium">✅ Yes, I'll be there!</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer px-4 py-2 border border-gray-300 rounded-lg hover:bg-red-50 hover:border-red-500 transition-all">
                                <input type="radio" name="attendance" value="no" required class="w-5 h-5 text-red-600" {{ old('attendance') == 'no' ? 'checked' : '' }}>
                                <span class="text-gray-700 font-medium">❌ Sorry, can't make it</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer px-4 py-2 border border-gray-300 rounded-lg hover:bg-yellow-50 hover:border-yellow-500 transition-all">
                                <input type="radio" name="attendance" value="maybe" required class="w-5 h-5 text-yellow-600" {{ old('attendance') == 'maybe' ? 'checked' : '' }}>
                                <span class="text-gray-700 font-medium">🤔 Maybe</span>
                            </label>
                        </div>
                        @error('attendance')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Number of Guests <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="visitor_number" value="{{ old('visitor_number', 1) }}" min="1" max="50" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('visitor_number') border-red-500 @enderror" 
                               placeholder="Number of people attending">
                        @error('visitor_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Your Message <span class="text-red-500">*</span>
                        </label>
                        <textarea name="message" rows="4" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('message') border-red-500 @enderror" 
                                  placeholder="Share your wishes, congratulations, or any special message for the couple...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-purple-500 text-white py-4 rounded-full font-semibold text-lg hover:from-pink-600 hover:to-purple-600 transition-all transform hover:scale-105 shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>Send RSVP & Message
                    </button>
                </form>
            </div>
        </div>
    </section>
    @endif

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-pink-600 to-purple-600 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <div class="mb-6">
                <h3 class="font-cursive text-5xl mb-2">
                    {{ $invitation->couple_nickname ?? ($invitation->bride_name . ' & ' . $invitation->groom_name) }}
                </h3>
                <p class="font-elegant text-xl">
                    {{ $invitation->wedding_date ? $invitation->wedding_date->format('F d, Y') : 'Save the Date' }}
                </p>
            </div>

            <div class="flex justify-center space-x-6 mb-6">
                <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>

            <div class="border-t border-white/20 pt-6">
                <p class="text-sm opacity-80">
                    <i class="fas fa-heart text-pink-300 mx-2"></i>
                    Thank you for being part of our special day
                    <i class="fas fa-heart text-pink-300 mx-2"></i>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up text-purple-600 text-xl"></i>
    </div>

    <!-- Music Player Button (Optional) -->
    <div class="music-button" id="musicButton">
        <i class="fas fa-music text-2xl"></i>
    </div>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Hide loading screen
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loading-screen').style.opacity = '0';
                setTimeout(function() {
                    document.getElementById('loading-screen').style.display = 'none';
                }, 300);
            }, 1000);
        });

        // Countdown Timer
        @if($invitation->wedding_date)
        const weddingDate = new Date("{{ $invitation->wedding_date->format('Y-m-d') }}T{{ $invitation->ceremony_time ?? '00:00' }}").getTime();
        
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = weddingDate - now;

            if (distance > 0) {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('days').textContent = days;
                document.getElementById('hours').textContent = hours;
                document.getElementById('minutes').textContent = minutes;
                document.getElementById('seconds').textContent = seconds;
            } else {
                document.getElementById('countdown').innerHTML = '<div class="col-span-4 text-3xl">The Big Day is Here! 🎉</div>';
            }
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
        @endif

        // Scroll to Top Button
        const scrollTopBtn = document.getElementById('scrollTop');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Music Player Toggle
        const musicButton = document.getElementById('musicButton');
        let isPlaying = false;
        
        musicButton.addEventListener('click', function() {
            isPlaying = !isPlaying;
            if (isPlaying) {
                this.classList.add('playing');
                // Add your background music here
            } else {
                this.classList.remove('playing');
            }
        });

        // Smooth Scroll for Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Gallery Lightbox (Simple Implementation)
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('click', function() {
                const img = this.querySelector('img');
                const lightbox = document.createElement('div');
                lightbox.className = 'fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4';
                lightbox.innerHTML = `
                    <div class="relative max-w-4xl max-h-full">
                        <img src="${img.src}" class="max-w-full max-h-screen object-contain rounded-lg">
                        <button class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300">&times;</button>
                    </div>
                `;
                document.body.appendChild(lightbox);
                
                lightbox.addEventListener('click', function() {
                    document.body.removeChild(lightbox);
                });
            });
        });
    </script>
</body>
</html>
