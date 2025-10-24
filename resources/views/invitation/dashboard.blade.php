<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Wedding Invitation') }}
            </h2>
            <div class="flex gap-2">
                @if($invitation->is_published)
                    <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" 
                       class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        View Public Page
                    </a>
                @endif
                <a href="{{ route('invitation.preview') }}" target="_blank" 
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Basic Information</h3>
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
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Save Basic Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Venue Information -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Venue Information</h3>
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
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Save Venue Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Images -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Images</h3>
                    
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Template & Settings</h3>
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
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Save Settings
                            </button>
                        </div>
                    </form>
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
