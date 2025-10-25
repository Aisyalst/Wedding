<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Confirmation - {{ $guestbook->name }}</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .font-cursive { font-family: 'Great Vibes', cursive; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-modern { font-family: 'Montserrat', sans-serif; }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        @keyframes checkmark {
            0% {
                stroke-dashoffset: 100;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }

        .checkmark {
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: checkmark 0.8s ease-in-out 0.4s forwards;
        }

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

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .scale-in {
            animation: scaleIn 0.5s ease-out;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white py-8 px-6 text-center">
            <div class="scale-in mb-4">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto shadow-lg">
                    <svg class="w-16 h-16" viewBox="0 0 52 52">
                        <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" stroke="#4CAF50" stroke-width="2"/>
                        <path class="checkmark" fill="none" stroke="#4CAF50" stroke-width="4" stroke-linecap="round" d="M14 27l7.5 7.5L38 18"/>
                    </svg>
                </div>
            </div>
            <h1 class="font-cursive text-5xl mb-2 fade-in-up">Thank You!</h1>
            <p class="text-xl fade-in-up" style="animation-delay: 0.2s;">Your RSVP has been confirmed</p>
        </div>

        <!-- Content Section -->
        <div class="p-8">
            <div class="text-center mb-8">
                <div class="w-20 h-1 bg-gradient-to-r from-pink-500 to-purple-600 mx-auto rounded-full mb-6"></div>
                <h2 class="font-serif text-3xl text-gray-800 mb-2">Attendance Details</h2>
            </div>

            <!-- Guest Information Card -->
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl p-6 mb-6 border border-purple-100">
                <div class="grid gap-4">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-user text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Guest Name</p>
                            <p class="text-gray-900 text-xl font-semibold">{{ $guestbook->name }}</p>
                        </div>
                    </div>

                    @if($guestbook->email)
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-envelope text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Email</p>
                            <p class="text-gray-900 text-lg">{{ $guestbook->email }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-users text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Number of Guests</p>
                            <p class="text-gray-900 text-xl font-semibold">{{ $guestbook->visitor_number }} {{ $guestbook->visitor_number > 1 ? 'People' : 'Person' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            @if($guestbook->attendance === 'yes')
                                <i class="fas fa-check-circle text-white text-lg"></i>
                            @elseif($guestbook->attendance === 'no')
                                <i class="fas fa-times-circle text-white text-lg"></i>
                            @else
                                <i class="fas fa-question-circle text-white text-lg"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Attendance Status</p>
                            <p class="text-gray-900 text-xl font-semibold">
                                @if($guestbook->attendance === 'yes')
                                    <span class="text-green-600">✅ Attending</span>
                                @elseif($guestbook->attendance === 'no')
                                    <span class="text-red-600">❌ Not Attending</span>
                                @else
                                    <span class="text-yellow-600">🤔 Maybe</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    @if($guestbook->message)
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-purple-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-comment-dots text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Message</p>
                            <p class="text-gray-700 text-base mt-1 leading-relaxed">{{ $guestbook->message }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-calendar text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">RSVP Date</p>
                            <p class="text-gray-900 text-lg">{{ $guestbook->created_at->format('F d, Y - h:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wedding Information -->
            @if($guestbook->weddingInvitation)
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 mb-6 border border-indigo-100">
                <h3 class="font-serif text-2xl text-gray-800 mb-4 text-center">
                    <i class="fas fa-heart text-pink-500 mr-2"></i>
                    Wedding Details
                </h3>
                <div class="text-center space-y-3">
                    <p class="text-gray-700 text-lg">
                        <span class="font-semibold">Couple:</span>
                        {{ $guestbook->weddingInvitation->couple_nickname ?? 
                           ($guestbook->weddingInvitation->bride_name . ' & ' . $guestbook->weddingInvitation->groom_name) }}
                    </p>
                    @if($guestbook->weddingInvitation->wedding_date)
                    <p class="text-gray-700 text-lg">
                        <i class="fas fa-calendar-day text-purple-500 mr-2"></i>
                        {{ $guestbook->weddingInvitation->wedding_date->format('F d, Y') }}
                    </p>
                    @endif
                    @if($guestbook->weddingInvitation->venue_name)
                    <p class="text-gray-700 text-lg">
                        <i class="fas fa-map-marker-alt text-purple-500 mr-2"></i>
                        {{ $guestbook->weddingInvitation->venue_name }}
                    </p>
                    @endif
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="text-center space-y-4">
                <a href="{{ route('invitation.show', $guestbook->weddingInvitation->slug) }}" 
                   class="inline-block w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white py-4 px-8 rounded-full font-semibold text-lg hover:from-pink-600 hover:to-purple-700 transition-all transform hover:scale-105 shadow-lg">
                    <i class="fas fa-home mr-2"></i>Back to Invitation
                </a>

                <a href="{{ route('guestbook.download-qr', $guestbook->id) }}" 
                   class="inline-block w-full bg-white text-purple-600 py-4 px-8 rounded-full font-semibold text-lg border-2 border-purple-600 hover:bg-purple-50 transition-all transform hover:scale-105">
                    <i class="fas fa-download mr-2"></i>Download QR Code Again
                </a>
            </div>

            <!-- Footer Note -->
            <div class="mt-8 text-center">
                <p class="text-gray-500 text-sm">
                    <i class="fas fa-info-circle mr-1"></i>
                    Keep this QR code for check-in at the wedding venue
                </p>
            </div>
        </div>
    </div>
</body>
</html>
