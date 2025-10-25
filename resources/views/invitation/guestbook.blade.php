<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Guestbook Entries
                </h2>
                <p class="text-sm text-gray-500 mt-1">View and manage RSVP responses from your guests</p>
            </div>
            <a href="{{ route('invitation.dashboard') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition-all">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Tab Navigation -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex border-b border-gray-200">
                    <a href="{{ route('invitation.dashboard') }}" 
                       class="flex-1 px-6 py-4 text-center font-semibold text-gray-600 hover:bg-gray-50 hover:text-gray-900 border-b-2 border-transparent hover:border-pink-500 transition-all">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Invitation
                    </a>
                    <button onclick="showTab('guestbook')" 
                       id="tab-guestbook"
                       class="flex-1 px-6 py-4 text-center font-semibold bg-gradient-to-r from-indigo-500 to-purple-500 text-white border-b-2 border-transparent transition-all">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Guestbook
                        @if($stats['total'] > 0)
                            <span class="ml-2 px-2 py-1 bg-white text-indigo-600 text-xs rounded-full">{{ $stats['total'] }}</span>
                        @endif
                    </button>
                    <button onclick="showTab('presence')" 
                       id="tab-presence"
                       class="flex-1 px-6 py-4 text-center font-semibold text-gray-600 hover:bg-gray-50 hover:text-gray-900 border-b-2 border-transparent hover:border-pink-500 transition-all">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                        </svg>
                        Presence Scanner
                    </button>
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

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Responses</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Attending</p>
                            <p class="text-3xl font-bold text-green-600 mt-2">{{ $stats['attending'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Not Attending</p>
                            <p class="text-3xl font-bold text-red-600 mt-2">{{ $stats['not_attending'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Maybe</p>
                            <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $stats['maybe'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Guests</p>
                            <p class="text-3xl font-bold text-purple-600 mt-2">{{ $stats['total_guests'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guestbook Entries Tab -->
            <div id="guestbook-tab" class="tab-content">
                <!-- Guestbook Entries -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800">All Guestbook Entries</h3>
                        <p class="text-xs text-gray-500">Responses from your wedding guests</p>
                    </div>
                    
                    <div class="p-6">
                        @if($guestbooks->count() > 0)
                            <div class="space-y-4">
                                @foreach($guestbooks as $entry)
                                    <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                        <div class="flex justify-between items-start mb-4">
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <h4 class="text-lg font-semibold text-gray-800">{{ $entry->name }}</h4>
                                                    @if($entry->attendance === 'yes')
                                                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                                            ✅ Attending
                                                        </span>
                                                    @elseif($entry->attendance === 'no')
                                                        <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">
                                                            ❌ Not Attending
                                                        </span>
                                                    @else
                                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">
                                                            🤔 Maybe
                                                        </span>
                                                    @endif
                                                    @if($entry->checked_in_at)
                                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">
                                                            ✓ Checked In
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-3">
                                                    @if($entry->email)
                                                        <div class="flex items-center">
                                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                            </svg>
                                                            {{ $entry->email }}
                                                        </div>
                                                    @endif
                                                    <div class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                                        </svg>
                                                        {{ $entry->visitor_number }} {{ Str::plural('guest', $entry->visitor_number) }}
                                                    </div>
                                                    <div class="flex items-center text-gray-400">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        {{ $entry->created_at->diffForHumans() }}
                                                    </div>
                                                    @if($entry->checked_in_at)
                                                        <div class="flex items-center text-blue-600">
                                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                            </svg>
                                                            Checked in {{ $entry->checked_in_at->diffForHumans() }}
                                                        </div>
                                                    @endif
                                                </div>

                                                @if($entry->message)
                                                    <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-purple-500">
                                                        <p class="text-gray-700 italic">"{{ $entry->message }}"</p>
                                                    </div>
                                                @endif
                                            </div>

                                            <form action="{{ route('guestbook.destroy', $entry->id) }}" method="POST" 
                                                  onsubmit="return confirm('Are you sure you want to delete this entry?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6">
                                {{ $guestbooks->links() }}
                            </div>
                        @else
                            <div class="text-center py-12">
                                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <h3 class="text-xl font-semibold text-gray-600 mb-2">No Entries Yet</h3>
                                <p class="text-gray-500">Your guestbook entries will appear here once guests start responding.</p>
                                <p class="text-sm text-gray-400 mt-2">Make sure your invitation is published and RSVP is enabled!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Presence Scanner Tab -->
            <div id="presence-tab" class="tab-content hidden">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                    <div class="bg-gradient-to-r from-green-50 to-blue-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800">QR Code Scanner - Guest Check-In</h3>
                        <p class="text-xs text-gray-500">Scan guest QR codes to mark their attendance</p>
                    </div>
                    
                    <div class="p-6">
                        <!-- Scanner Instructions -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-blue-800 mb-2">How to use the scanner:</h4>
                                    <ol class="text-sm text-blue-700 space-y-1 list-decimal list-inside">
                                        <li>Click "Start Scanner" button below</li>
                                        <li>Allow camera access when prompted</li>
                                        <li>Hold the guest's QR code in front of the camera</li>
                                        <li>The system will automatically check them in</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Scanner Controls -->
                        <div class="text-center mb-6">
                            <button id="start-scanner-btn" 
                                    class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:from-green-600 hover:to-blue-600 transition-all transform hover:scale-105 shadow-lg">
                                <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                </svg>
                                Start Scanner
                            </button>
                            <button id="stop-scanner-btn" 
                                    class="bg-red-500 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-red-600 transition-all transform hover:scale-105 shadow-lg hidden ml-4">
                                <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"/>
                                </svg>
                                Stop Scanner
                            </button>
                        </div>

                        <!-- QR Scanner Container -->
                        <div id="qr-reader" class="hidden mx-auto max-w-2xl border-4 border-gray-300 rounded-lg overflow-hidden shadow-xl"></div>

                        <!-- Scanner Status -->
                        <div id="scanner-status" class="mt-4 text-center text-sm text-gray-600 hidden">
                            <div class="flex items-center justify-center">
                                <svg class="animate-spin h-5 w-5 mr-2 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Scanner is ready. Position QR code in the frame...</span>
                            </div>
                        </div>

                        <!-- Scan Result -->
                        <div id="scan-result" class="mt-6 hidden"></div>

                        <!-- Recent Scans -->
                        <div id="recent-scans" class="mt-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Recent Check-ins</h4>
                            <div id="recent-scans-list" class="space-y-3">
                                <!-- Recent scans will be added here dynamically -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Html5Qrcode CDN -->
    <script src="https://unpkg.com/html5-qrcode"></script>
    
    <script>
        let html5QrcodeScanner = null;
        let isScanning = false;

        // Tab switching
        function showTab(tabName) {
            // Hide all tabs
            document.getElementById('guestbook-tab').classList.add('hidden');
            document.getElementById('presence-tab').classList.add('hidden');
            
            // Remove active styles from all tab buttons
            document.getElementById('tab-guestbook').classList.remove('bg-gradient-to-r', 'from-indigo-500', 'to-purple-500', 'text-white');
            document.getElementById('tab-guestbook').classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900', 'hover:border-pink-500');
            document.getElementById('tab-presence').classList.remove('bg-gradient-to-r', 'from-indigo-500', 'to-purple-500', 'text-white');
            document.getElementById('tab-presence').classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900', 'hover:border-pink-500');
            
            // Show selected tab
            if (tabName === 'guestbook') {
                document.getElementById('guestbook-tab').classList.remove('hidden');
                document.getElementById('tab-guestbook').classList.add('bg-gradient-to-r', 'from-indigo-500', 'to-purple-500', 'text-white');
                document.getElementById('tab-guestbook').classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900', 'hover:border-pink-500');
            } else if (tabName === 'presence') {
                document.getElementById('presence-tab').classList.remove('hidden');
                document.getElementById('tab-presence').classList.add('bg-gradient-to-r', 'from-indigo-500', 'to-purple-500', 'text-white');
                document.getElementById('tab-presence').classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900', 'hover:border-pink-500');
            }
        }

        // Start QR Scanner
        document.getElementById('start-scanner-btn').addEventListener('click', function() {
            if (isScanning) return;
            
            isScanning = true;
            document.getElementById('qr-reader').classList.remove('hidden');
            document.getElementById('scanner-status').classList.remove('hidden');
            document.getElementById('start-scanner-btn').classList.add('hidden');
            document.getElementById('stop-scanner-btn').classList.remove('hidden');
            
            html5QrcodeScanner = new Html5Qrcode("qr-reader");
            
            html5QrcodeScanner.start(
                { facingMode: "environment" },
                {
                    fps: 10,
                    qrbox: { width: 500, height: 500 }
                },
                onScanSuccess,
                onScanError
            ).catch(err => {
                console.error('Unable to start scanner:', err);
                showNotification('error', 'Unable to start camera. Please ensure you have granted camera permissions.');
                stopScanner();
            });
        });

        // Stop QR Scanner
        document.getElementById('stop-scanner-btn').addEventListener('click', function() {
            stopScanner();
        });

        function stopScanner() {
            if (html5QrcodeScanner && isScanning) {
                html5QrcodeScanner.stop().then(() => {
                    isScanning = false;
                    document.getElementById('qr-reader').classList.add('hidden');
                    document.getElementById('scanner-status').classList.add('hidden');
                    document.getElementById('start-scanner-btn').classList.remove('hidden');
                    document.getElementById('stop-scanner-btn').classList.add('hidden');
                }).catch(err => {
                    console.error('Error stopping scanner:', err);
                });
            }
        }

        // Handle successful QR scan
        function onScanSuccess(decodedText, decodedResult) {
            console.log('QR Code detected:', decodedText);
            
            // Extract guestbook ID from URL
            const urlPattern = /\/attendance\/(\d+)/;
            const match = decodedText.match(urlPattern);
            
            if (match && match[1]) {
                const guestbookId = match[1];
                checkInGuest(guestbookId);
            } else {
                showNotification('error', 'Invalid QR code. Please scan a valid guest QR code.');
            }
        }

        // Handle scan errors (ignore most errors as they're just "no QR found" messages)
        function onScanError(errorMessage) {
            // Ignore "No MultiFormat Readers were able to detect the code" errors
            if (!errorMessage.includes('No MultiFormat')) {
                console.log('Scan error:', errorMessage);
            }
        }

        // Check in guest via AJAX
        function checkInGuest(guestbookId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                showNotification('error', 'CSRF token not found. Please refresh the page.');
                return;
            }

            fetch(`/guestbook/${guestbookId}/check-in`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.content
                },
                body: JSON.stringify({ guestbook_id: guestbookId })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(data.message || `HTTP error! status: ${response.status}`);
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showNotification('success', data.message);
                    addRecentScan(data.guest);
                    
                    // Pause scanning briefly to show result
                    setTimeout(() => {
                        // Scanner continues automatically
                    }, 2000);
                } else {
                    showNotification('error', data.message || 'Failed to check in guest.');
                }
            })
            .catch(error => {
                console.error('Check-in error:', error);
                showNotification('error', error.message || 'An error occurred while checking in the guest.');
            });
        }

        // Show notification
        function showNotification(type, message) {
            const resultDiv = document.getElementById('scan-result');
            resultDiv.classList.remove('hidden');
            
            const bgColor = type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700';
            const icon = type === 'success' 
                ? '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>'
                : '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>';
            
            resultDiv.innerHTML = `
                <div class="border ${bgColor} px-4 py-3 rounded-lg flex items-center animate-fade-in">
                    ${icon}
                    <span class="ml-3 font-semibold">${message}</span>
                </div>
            `;
            
            // Hide notification after 5 seconds
            setTimeout(() => {
                resultDiv.classList.add('hidden');
            }, 5000);
        }

        // Add recent scan to list
        function addRecentScan(guest) {
            const recentList = document.getElementById('recent-scans-list');
            const scanItem = document.createElement('div');
            scanItem.className = 'border border-gray-200 rounded-lg p-4 bg-green-50 animate-fade-in';
            scanItem.innerHTML = `
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="font-semibold text-gray-800">${guest.name}</h5>
                        <p class="text-sm text-gray-600">${guest.visitor_number} ${guest.visitor_number > 1 ? 'guests' : 'guest'}</p>
                    </div>
                    <div class="text-right">
                        <span class="px-3 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">
                            ✓ Checked In
                        </span>
                        <p class="text-xs text-gray-500 mt-1">Just now</p>
                    </div>
                </div>
            `;
            
            recentList.insertBefore(scanItem, recentList.firstChild);
            
            // Keep only last 10 scans
            while (recentList.children.length > 10) {
                recentList.removeChild(recentList.lastChild);
            }
        }

        // Add fade-in animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fade-in {
                from { opacity: 0; transform: translateY(-10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in {
                animation: fade-in 0.3s ease-out;
            }
        `;
        document.head.appendChild(style);
    </script>
</x-app-layout>
