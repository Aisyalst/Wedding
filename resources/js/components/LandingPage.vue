<template>
  <div class="min-h-screen bg-gradient-to-br from-wedding-ivory-100 via-white to-wedding-pink-50">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-sm shadow-sm z-50">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20">
          <div class="flex items-center space-x-2">
            <svg class="w-8 h-8 text-wedding-pink-400" fill="currentColor" viewBox="0 0 20 20">
              <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
            </svg>
            <span class="text-xl md:text-2xl font-bold bg-gradient-to-r from-wedding-pink-500 to-wedding-gold-500 bg-clip-text text-transparent">
              Wedding Manager
            </span>
          </div>
          <div class="hidden md:flex space-x-8">
            <a href="#hero" class="text-gray-700 hover:text-wedding-pink-500 transition">Beranda</a>
            <a href="#about" class="text-gray-700 hover:text-wedding-pink-500 transition">Tentang</a>
            <a href="#features" class="text-gray-700 hover:text-wedding-pink-500 transition">Layanan</a>
            <a href="#contact" class="text-gray-700 hover:text-wedding-pink-500 transition">Kontak</a>
          </div>
          <a href="/login" class="bg-gradient-to-r from-wedding-pink-500 to-wedding-pink-600 text-white px-4 py-2 rounded-full hover:shadow-lg transition transform hover:scale-105">
            Masuk
          </a>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="pt-24 md:pt-32 pb-16 md:pb-24 px-4 sm:px-6 lg:px-8">
      <div class="container mx-auto text-center">
        <div class="max-w-4xl mx-auto">
          <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
            <span class="bg-gradient-to-r from-wedding-pink-500 via-wedding-gold-500 to-wedding-pink-500 bg-clip-text text-transparent">
              Kelola Pernikahan Impian Anda
            </span>
          </h1>
          <p class="text-lg sm:text-xl md:text-2xl text-gray-600 mb-8 md:mb-12 leading-relaxed">
            Sistem manajemen pernikahan yang modern, elegan, dan mudah digunakan untuk membuat hari spesial Anda menjadi sempurna
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="#features" class="w-full sm:w-auto bg-gradient-to-r from-wedding-pink-500 to-wedding-gold-500 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-2xl transition transform hover:scale-105">
              Jelajahi Layanan
            </a>
            <a href="#contact" class="w-full sm:w-auto bg-white text-wedding-pink-500 border-2 border-wedding-pink-500 px-8 py-4 rounded-full text-lg font-semibold hover:bg-wedding-pink-50 transition">
              Hubungi Kami
            </a>
          </div>
        </div>
        
        <!-- Hero Image/Decoration -->
        <div class="mt-12 md:mt-16 relative">
          <div class="absolute inset-0 bg-gradient-to-r from-wedding-pink-200 to-wedding-gold-200 opacity-20 blur-3xl rounded-full"></div>
          <div class="relative grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
              <div class="w-16 h-16 bg-gradient-to-br from-wedding-pink-400 to-wedding-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Perencanaan Mudah</h3>
              <p class="text-gray-600">Kelola semua detail pernikahan dalam satu tempat</p>
            </div>
            
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
              <div class="w-16 h-16 bg-gradient-to-br from-wedding-gold-400 to-wedding-gold-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Manajemen Tamu</h3>
              <p class="text-gray-600">Kelola daftar undangan dan konfirmasi kehadiran</p>
            </div>
            
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
              <div class="w-16 h-16 bg-gradient-to-br from-wedding-pink-400 to-wedding-gold-400 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Analitik & Laporan</h3>
              <p class="text-gray-600">Pantau progress dan budget pernikahan Anda</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-white">
      <div class="container mx-auto">
        <div class="max-w-6xl mx-auto">
          <div class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-wedding-pink-500 to-wedding-gold-500 bg-clip-text text-transparent">
              Tentang Wedding Manager
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
              Kami memahami bahwa merencanakan pernikahan adalah momen yang spesial dan memerlukan perhatian detail
            </p>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
            <div class="space-y-6">
              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-wedding-pink-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-wedding-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                </div>
                <div>
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Platform Terintegrasi</h3>
                  <p class="text-gray-600">Semua yang Anda butuhkan untuk merencanakan pernikahan dalam satu platform modern dan mudah digunakan</p>
                </div>
              </div>
              
              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-wedding-gold-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-wedding-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                  </div>
                </div>
                <div>
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Aman & Terpercaya</h3>
                  <p class="text-gray-600">Data Anda dilindungi dengan enkripsi tingkat enterprise dan backup otomatis</p>
                </div>
              </div>
              
              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <div class="w-12 h-12 bg-wedding-pink-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-wedding-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                  </div>
                </div>
                <div>
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Cepat & Responsif</h3>
                  <p class="text-gray-600">Akses dari perangkat apapun - desktop, tablet, atau smartphone dengan performa optimal</p>
                </div>
              </div>
            </div>
            
            <div class="relative">
              <div class="absolute inset-0 bg-gradient-to-br from-wedding-pink-200 to-wedding-gold-200 opacity-30 blur-2xl rounded-3xl"></div>
              <div class="relative bg-gradient-to-br from-wedding-pink-50 to-wedding-ivory-100 p-8 rounded-3xl shadow-xl">
                <div class="text-center space-y-6">
                  <div>
                    <div class="text-5xl font-bold text-wedding-pink-500 mb-2">1000+</div>
                    <div class="text-gray-600 font-medium">Pernikahan Sukses</div>
                  </div>
                  <div>
                    <div class="text-5xl font-bold text-wedding-gold-500 mb-2">50+</div>
                    <div class="text-gray-600 font-medium">Vendor Terpercaya</div>
                  </div>
                  <div>
                    <div class="text-5xl font-bold text-wedding-pink-500 mb-2">98%</div>
                    <div class="text-gray-600 font-medium">Kepuasan Pelanggan</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-wedding-ivory-50 to-wedding-pink-50">
      <div class="container mx-auto">
        <div class="text-center mb-12 md:mb-16">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-wedding-pink-500 to-wedding-gold-500 bg-clip-text text-transparent">
            Layanan Kami
          </h2>
          <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
            Fitur lengkap untuk membantu Anda merencanakan pernikahan impian dengan mudah dan efisien
          </p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 max-w-7xl mx-auto">
          <!-- Feature 1 -->
          <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <div class="w-14 h-14 bg-gradient-to-br from-wedding-pink-400 to-wedding-pink-500 rounded-xl flex items-center justify-center mb-4">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Jadwal Acara</h3>
            <p class="text-gray-600">Kelola timeline pernikahan Anda dengan kalender interaktif dan reminder otomatis</p>
          </div>
          
          <!-- Feature 2 -->
          <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <div class="w-14 h-14 bg-gradient-to-br from-wedding-gold-400 to-wedding-gold-500 rounded-xl flex items-center justify-center mb-4">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Manajemen Budget</h3>
            <p class="text-gray-600">Pantau pengeluaran dan budget pernikahan Anda secara real-time dengan laporan detail</p>
          </div>
          
          <!-- Feature 3 -->
          <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <div class="w-14 h-14 bg-gradient-to-br from-wedding-pink-400 to-wedding-gold-400 rounded-xl flex items-center justify-center mb-4">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Daftar Tamu</h3>
            <p class="text-gray-600">Kelola undangan, konfirmasi kehadiran, dan seating arrangement dengan mudah</p>
          </div>
          
          <!-- Feature 4 -->
          <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <div class="w-14 h-14 bg-gradient-to-br from-wedding-gold-400 to-wedding-pink-400 rounded-xl flex items-center justify-center mb-4">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Vendor Management</h3>
            <p class="text-gray-600">Kelola kontrak, pembayaran, dan komunikasi dengan vendor dalam satu platform</p>
          </div>
          
          <!-- Feature 5 -->
          <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <div class="w-14 h-14 bg-gradient-to-br from-wedding-pink-400 to-wedding-pink-500 rounded-xl flex items-center justify-center mb-4">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Checklist & To-Do</h3>
            <p class="text-gray-600">Jangan lewatkan detail penting dengan checklist komprehensif dan tracking progress</p>
          </div>
          
          <!-- Feature 6 -->
          <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <div class="w-14 h-14 bg-gradient-to-br from-wedding-gold-400 to-wedding-gold-500 rounded-xl flex items-center justify-center mb-4">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Galeri & Media</h3>
            <p class="text-gray-600">Simpan dan organisir foto, video, dan dokumen penting pernikahan Anda</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-white">
      <div class="container mx-auto">
        <div class="max-w-4xl mx-auto">
          <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-wedding-pink-500 to-wedding-gold-500 bg-clip-text text-transparent">
              Hubungi Kami
            </h2>
            <p class="text-lg md:text-xl text-gray-600">
              Punya pertanyaan? Tim kami siap membantu mewujudkan pernikahan impian Anda
            </p>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-gradient-to-br from-wedding-pink-50 to-wedding-pink-100 p-6 rounded-2xl text-center">
              <div class="w-12 h-12 bg-wedding-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <h3 class="font-bold text-gray-800 mb-2">Email</h3>
              <p class="text-gray-600">info@weddingmanager.id</p>
            </div>
            
            <div class="bg-gradient-to-br from-wedding-gold-50 to-wedding-gold-100 p-6 rounded-2xl text-center">
              <div class="w-12 h-12 bg-wedding-gold-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
              </div>
              <h3 class="font-bold text-gray-800 mb-2">Telepon</h3>
              <p class="text-gray-600">+62 812 3456 7890</p>
            </div>
            
            <div class="bg-gradient-to-br from-wedding-pink-50 to-wedding-gold-50 p-6 rounded-2xl text-center">
              <div class="w-12 h-12 bg-gradient-to-r from-wedding-pink-500 to-wedding-gold-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </div>
              <h3 class="font-bold text-gray-800 mb-2">Lokasi</h3>
              <p class="text-gray-600">Jakarta, Indonesia</p>
            </div>
          </div>
          
          <div class="bg-gradient-to-br from-wedding-ivory-50 to-white p-8 md:p-12 rounded-3xl shadow-xl">
            <form class="space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                  <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-wedding-pink-500 focus:ring-2 focus:ring-wedding-pink-200 transition" placeholder="John Doe">
                </div>
                <div>
                  <label class="block text-gray-700 font-semibold mb-2">Email</label>
                  <input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-wedding-pink-500 focus:ring-2 focus:ring-wedding-pink-200 transition" placeholder="john@example.com">
                </div>
              </div>
              
              <div>
                <label class="block text-gray-700 font-semibold mb-2">Subjek</label>
                <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-wedding-pink-500 focus:ring-2 focus:ring-wedding-pink-200 transition" placeholder="Pertanyaan tentang layanan">
              </div>
              
              <div>
                <label class="block text-gray-700 font-semibold mb-2">Pesan</label>
                <textarea rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-wedding-pink-500 focus:ring-2 focus:ring-wedding-pink-200 transition" placeholder="Tuliskan pesan Anda di sini..."></textarea>
              </div>
              
              <button type="submit" class="w-full bg-gradient-to-r from-wedding-pink-500 to-wedding-gold-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:shadow-xl transition transform hover:scale-[1.02]">
                Kirim Pesan
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-4 sm:px-6 lg:px-8">
      <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
          <div class="md:col-span-2">
            <div class="flex items-center space-x-2 mb-4">
              <svg class="w-8 h-8 text-wedding-pink-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
              </svg>
              <span class="text-2xl font-bold">Wedding Manager</span>
            </div>
            <p class="text-gray-400 mb-4 max-w-md">
              Platform manajemen pernikahan terpercaya untuk membuat hari spesial Anda menjadi sempurna.
            </p>
            <div class="flex space-x-4">
              <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-wedding-pink-500 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </a>
              <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-wedding-pink-500 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
              </a>
              <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-wedding-pink-500 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                </svg>
              </a>
            </div>
          </div>
          
          <div>
            <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
            <ul class="space-y-2">
              <li><a href="#hero" class="text-gray-400 hover:text-wedding-pink-400 transition">Beranda</a></li>
              <li><a href="#about" class="text-gray-400 hover:text-wedding-pink-400 transition">Tentang Kami</a></li>
              <li><a href="#features" class="text-gray-400 hover:text-wedding-pink-400 transition">Layanan</a></li>
              <li><a href="#contact" class="text-gray-400 hover:text-wedding-pink-400 transition">Kontak</a></li>
            </ul>
          </div>
          
          <div>
            <h3 class="text-lg font-bold mb-4">Legal</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-wedding-pink-400 transition">Syarat & Ketentuan</a></li>
              <li><a href="#" class="text-gray-400 hover:text-wedding-pink-400 transition">Kebijakan Privasi</a></li>
              <li><a href="#" class="text-gray-400 hover:text-wedding-pink-400 transition">FAQ</a></li>
              <li><a href="/login" class="text-gray-400 hover:text-wedding-pink-400 transition">Login Admin</a></li>
            </ul>
          </div>
        </div>
        
        <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
          <p>&copy; 2025 Wedding Manager. Semua hak cipta dilindungi.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  name: 'LandingPage',
  mounted() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  }
}
</script>

<style scoped>
/* Additional custom styles if needed */
</style>
