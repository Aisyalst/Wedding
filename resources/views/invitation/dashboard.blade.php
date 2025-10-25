<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                    <svg class="w-6 h-6 mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    {{ __('My Wedding Invitation') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Create and manage your beautiful wedding invitation page</p>
            </div>
            <div class="flex gap-2 flex-wrap">
                @if($invitation->is_published)
                    <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" 
                       class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 transition-all shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        View Public Page
                    </a>
                @endif
                <a href="{{ route('invitation.preview') }}" target="_blank" 
                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:from-pink-600 hover:to-purple-600 transition-all shadow-sm hover:shadow-md">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Preview
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Tab Navigation -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex border-b border-gray-200">
                    <a href="{{ route('invitation.dashboard') }}" 
                       class="flex-1 px-6 py-4 text-center font-semibold bg-gradient-to-r from-pink-500 to-purple-500 text-white border-b-2 border-transparent transition-all">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Invitation
                    </a>
                    <a href="{{ route('guestbook.index') }}" 
                       class="flex-1 px-6 py-4 text-center font-semibold text-gray-600 hover:bg-gray-50 hover:text-gray-900 border-b-2 border-transparent hover:border-indigo-500 transition-all">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Guestbook
                        @php
                            $guestbookCount = $invitation->guestbooks()->count();
                        @endphp
                        @if($guestbookCount > 0)
                            <span class="ml-2 px-2 py-1 bg-indigo-500 text-white text-xs rounded-full">{{ $guestbookCount }}</span>
                        @endif
                    </a>
                </div>
            </div>
            
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold mb-2">✨ Welcome to Your Wedding Invitation Dashboard!</h3>
                        <p class="text-white/90 mb-4">
                            This is your personal space to create and customize your beautiful wedding invitation. 
                            Fill in the details below, upload photos, and share your special day with your loved ones.
                        </p>
                        <div class="flex flex-wrap gap-4 text-sm">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                One invitation per account
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Fully responsive design
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Interactive venue map
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <svg class="w-32 h-32 text-white/20" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Progress Indicator -->
            @php
                $completionSteps = [
                    'basic_info' => ($invitation->bride_name && $invitation->groom_name && $invitation->wedding_date),
                    'venue' => ($invitation->venue_name && $invitation->venue_address),
                    'images' => ($invitation->hero_image || $invitation->couple_image),
                    'published' => $invitation->is_published
                ];
                $completedCount = count(array_filter($completionSteps));
                $totalSteps = count($completionSteps);
                $progressPercentage = ($completedCount / $totalSteps) * 100;
            @endphp

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Setup Progress</h3>
                        <p class="text-sm text-gray-500">Complete all steps to have a perfect invitation</p>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-pink-600">{{ $completedCount }}/{{ $totalSteps }}</div>
                        <div class="text-xs text-gray-500">Steps Completed</div>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="w-full bg-gray-200 rounded-full h-3 mb-6">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 h-3 rounded-full transition-all duration-500" 
                         style="width: {{ $progressPercentage }}%"></div>
                </div>

                <!-- Progress Steps -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="flex items-start space-x-3 p-3 rounded-lg {{ $completionSteps['basic_info'] ? 'bg-green-50' : 'bg-gray-50' }}">
                        <div class="flex-shrink-0">
                            @if($completionSteps['basic_info'])
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium {{ $completionSteps['basic_info'] ? 'text-green-800' : 'text-gray-700' }}">
                                Basic Information
                            </p>
                            <p class="text-xs {{ $completionSteps['basic_info'] ? 'text-green-600' : 'text-gray-500' }}">
                                {{ $completionSteps['basic_info'] ? 'Completed' : 'Add couple names & date' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-3 rounded-lg {{ $completionSteps['venue'] ? 'bg-green-50' : 'bg-gray-50' }}">
                        <div class="flex-shrink-0">
                            @if($completionSteps['venue'])
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium {{ $completionSteps['venue'] ? 'text-green-800' : 'text-gray-700' }}">
                                Venue Details
                            </p>
                            <p class="text-xs {{ $completionSteps['venue'] ? 'text-green-600' : 'text-gray-500' }}">
                                {{ $completionSteps['venue'] ? 'Completed' : 'Add venue & address' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-3 rounded-lg {{ $completionSteps['images'] ? 'bg-green-50' : 'bg-gray-50' }}">
                        <div class="flex-shrink-0">
                            @if($completionSteps['images'])
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium {{ $completionSteps['images'] ? 'text-green-800' : 'text-gray-700' }}">
                                Photos
                            </p>
                            <p class="text-xs {{ $completionSteps['images'] ? 'text-green-600' : 'text-gray-500' }}">
                                {{ $completionSteps['images'] ? 'Completed' : 'Upload images' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-3 rounded-lg {{ $completionSteps['published'] ? 'bg-green-50' : 'bg-gray-50' }}">
                        <div class="flex-shrink-0">
                            @if($completionSteps['published'])
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium {{ $completionSteps['published'] ? 'text-green-800' : 'text-gray-700' }}">
                                Publish
                            </p>
                            <p class="text-xs {{ $completionSteps['published'] ? 'text-green-600' : 'text-gray-500' }}">
                                {{ $completionSteps['published'] ? 'Live!' : 'Make it public' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Basic Information -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="bg-gradient-to-r from-pink-50 to-purple-50 px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-pink-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Basic Information</h3>
                            <p class="text-xs text-gray-500">Tell us about your special day</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <form action="{{ route('invitation.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Bride's Name</label>
                                <input type="text" name="bride_name" value="{{ old('bride_name', $invitation->bride_name) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Groom's Name</label>
                                <input type="text" name="groom_name" value="{{ old('groom_name', $invitation->groom_name) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Couple Nickname</label>
                                <input type="text" name="couple_nickname" value="{{ old('couple_nickname', $invitation->couple_nickname) }}" 
                                       placeholder="e.g., John & Jane"
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <p class="text-xs text-gray-500 mt-1">This will be used in the URL</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Wedding Date</label>
                                <input type="date" name="wedding_date" value="{{ old('wedding_date', $invitation->wedding_date?->format('Y-m-d')) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ceremony Time</label>
                                <input type="time" name="ceremony_time" value="{{ old('ceremony_time', $invitation->ceremony_time?->format('H:i')) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Reception Time</label>
                                <input type="time" name="reception_time" value="{{ old('reception_time', $invitation->reception_time?->format('H:i')) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Welcome Message</label>
                            <textarea name="welcome_message" rows="3" 
                                      class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('welcome_message', $invitation->welcome_message) }}</textarea>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Love Story</label>
                            <textarea name="love_story" rows="4" 
                                      class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('love_story', $invitation->love_story) }}</textarea>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Special Message</label>
                            <textarea name="special_message" rows="3" 
                                      class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('special_message', $invitation->special_message) }}</textarea>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-lg hover:from-pink-600 hover:to-purple-600 font-semibold shadow-sm hover:shadow-md transition-all transform hover:scale-105">
                                💾 Save Basic Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Venue Information -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Venue Information</h3>
                            <p class="text-xs text-gray-500">📍 Add venue details for the interactive map</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <form action="{{ route('invitation.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Venue Name</label>
                                <input type="text" name="venue_name" value="{{ old('venue_name', $invitation->venue_name) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <input type="text" name="venue_address" value="{{ old('venue_address', $invitation->venue_address) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                <input type="text" name="venue_city" value="{{ old('venue_city', $invitation->venue_city) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">State</label>
                                <input type="text" name="venue_state" value="{{ old('venue_state', $invitation->venue_state) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Zipcode</label>
                                <input type="text" name="venue_zipcode" value="{{ old('venue_zipcode', $invitation->venue_zipcode) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Latitude (Optional)</label>
                                <input type="number" step="0.00000001" name="venue_latitude" value="{{ old('venue_latitude', $invitation->venue_latitude) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Longitude (Optional)</label>
                                <input type="number" step="0.00000001" name="venue_longitude" value="{{ old('venue_longitude', $invitation->venue_longitude) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-lg hover:from-blue-600 hover:to-indigo-600 font-semibold shadow-sm hover:shadow-md transition-all transform hover:scale-105">
                                📍 Save Venue Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Images -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-purple-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Images</h3>
                            <p class="text-xs text-gray-500">📸 Upload beautiful photos for your invitation</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    
                    <!-- Hero Image -->
                    <div class="mb-6 p-4 border border-gray-200 rounded-lg">
                        <h4 class="font-semibold mb-3 text-gray-700">Hero Image (Banner)</h4>
                        @if($invitation->hero_image)
                            <img src="{{ Storage::url($invitation->hero_image) }}" alt="Hero Image" class="mb-3 rounded-lg max-h-48 object-cover w-full">
                        @endif
                        <form action="{{ route('invitation.upload.hero') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex items-center gap-3">
                                <input type="file" name="hero_image" accept="image/*" 
                                       class="flex-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Couple Image -->
                    <div class="mb-6 p-4 border border-gray-200 rounded-lg">
                        <h4 class="font-semibold mb-3 text-gray-700">Couple Photo</h4>
                        @if($invitation->couple_image)
                            <img src="{{ Storage::url($invitation->couple_image) }}" alt="Couple Image" class="mb-3 rounded-lg max-h-48 object-cover w-full">
                        @endif
                        <form action="{{ route('invitation.upload.couple') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex items-center gap-3">
                                <input type="file" name="couple_image" accept="image/*" 
                                       class="flex-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Gallery Images -->
                    <div class="p-4 border border-gray-200 rounded-lg">
                        <h4 class="font-semibold mb-3 text-gray-700">Photo Gallery</h4>
                        
                        @if($invitation->gallery_images && count($invitation->gallery_images) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                                @foreach($invitation->gallery_images as $image)
                                    <div class="relative group">
                                        <img src="{{ Storage::url($image) }}" alt="Gallery Image" class="rounded-lg w-full h-32 object-cover">
                                        <form action="{{ route('invitation.delete.gallery') }}" method="POST" class="absolute top-2 right-2">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="image" value="{{ $image }}">
                                            <button type="submit" class="bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('invitation.upload.gallery') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex items-center gap-3">
                                <input type="file" name="gallery_images[]" accept="image/*" multiple 
                                       class="flex-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm">
                                    Upload
                                </button>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">You can select multiple images at once</p>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Template & Settings -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="bg-gradient-to-r from-green-50 to-teal-50 px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Template & Settings</h3>
                            <p class="text-xs text-gray-500">⚙️ Customize and publish your invitation</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <form action="{{ route('invitation.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Template Style</label>
                                <select name="template_style" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="classic" {{ $invitation->template_style == 'classic' ? 'selected' : '' }}>Classic</option>
                                    <option value="modern" {{ $invitation->template_style == 'modern' ? 'selected' : '' }}>Modern</option>
                                    <option value="elegant" {{ $invitation->template_style == 'elegant' ? 'selected' : '' }}>Elegant</option>
                                    <option value="rustic" {{ $invitation->template_style == 'rustic' ? 'selected' : '' }}>Rustic</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Color Scheme</label>
                                <input type="text" name="color_scheme" value="{{ old('color_scheme', $invitation->color_scheme) }}" 
                                       placeholder="e.g., pink, blue, gold"
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Font Style</label>
                                <input type="text" name="font_style" value="{{ old('font_style', $invitation->font_style) }}" 
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="mt-6 space-y-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="enable_rsvp" value="1" {{ $invitation->enable_rsvp ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                <label class="ml-2 text-sm text-gray-700">Enable RSVP Feature</label>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" name="is_published" value="1" {{ $invitation->is_published ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                <label class="ml-2 text-sm text-gray-700">Publish Invitation (Make it publicly accessible)</label>
                            </div>
                        </div>

                        @if($invitation->is_published)
                            <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                                <p class="text-sm text-gray-700 mb-2">Your invitation is live! Share this link:</p>
                                <div class="flex items-center gap-2">
                                    <input type="text" readonly value="{{ route('invitation.show', $invitation->slug) }}" 
                                           class="flex-1 text-sm p-2 border border-gray-300 rounded bg-white">
                                    <button type="button" onclick="copyToClipboard('{{ route('invitation.show', $invitation->slug) }}')" 
                                            class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm">
                                        Copy
                                    </button>
                                </div>
                            </div>
                        @endif

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-500 to-teal-500 text-white rounded-lg hover:from-green-600 hover:to-teal-600 font-semibold shadow-sm hover:shadow-md transition-all transform hover:scale-105">
                                ⚙️ Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help & Info Card -->
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold text-blue-800 mb-2">💡 Important Information</h4>
                        <ul class="text-sm text-blue-700 space-y-2">
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span><strong>One Invitation Per Account:</strong> Each user can create and manage only one wedding invitation to keep things simple and organized.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span><strong>Preview Before Publishing:</strong> Always click "Preview" to see how your invitation looks before making it public.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span><strong>Complete Venue Address:</strong> Add full venue address including city and state for accurate map display.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span><strong>High-Quality Images:</strong> Upload clear, high-resolution images (recommended: 1920x1080 or higher) for best results.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span><strong>Share Your Link:</strong> Once published, copy and share your unique invitation link with guests via email, SMS, or social media.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Link copied to clipboard!');
            });
        }
    </script>
</x-app-layout>
