<?php

/* @var $this yii\web\View */

?>
<!-- Hero Section -->
        <!-- Statistics Section -->
    <div class="max-w-7xl mx-auto px-4 -mt-12 relative z-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white p-6 rounded-2xl shadow-xl border border-rs-beige/50 text-center hover:shadow-2xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
                <p class="text-rs-orange font-bold text-3xl mb-1">24/7</p>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-tighter">Layanan IGD</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-xl border border-rs-beige/50 text-center hover:shadow-2xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                <p class="text-rs-deep-green font-bold text-3xl mb-1">C</p>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-tighter">Tipe Rumah Sakit</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-xl border border-rs-beige/50 text-center hover:shadow-2xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="300">
                <p class="text-rs-orange font-bold text-3xl mb-1">10+</p>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-tighter">Unit Layanan</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-xl border border-rs-beige/50 text-center hover:shadow-2xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="400">
                <p class="text-rs-deep-green font-bold text-3xl mb-1">100%</p>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-tighter">Digital EMR</p>
            </div>
        </div>
    </div>

    <!-- Role Selection Portal -->
    <section id="portal" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Portal Akses Pegawai</h2>
                <div class="w-20 h-1.5 bg-rs-orange mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600">Pilih modul akses sesuai dengan peran dan tanggung jawab Anda.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card: Perawat -->
                <button @click="openLogin = true; selectedRole = 'Perawat'" 
                        class="group p-8 bg-rs-beige/20 rounded-3xl border border-transparent hover:border-rs-light-green hover:bg-white transition-all duration-300 text-left"
                        data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-white p-4 rounded-2xl shadow-sm group-hover:bg-rs-light-green group-hover:text-white transition-colors duration-300 mb-6 inline-block">
                        <i data-lucide="clipboard-list" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Perawat / Admisi</h3>
                    <p class="text-sm text-gray-500 mb-4">Pendaftaran pasien baru, antrean poli, dan registrasi pemeriksaan.</p>
                    <span class="text-rs-deep-green font-bold text-sm flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Masuk Modul <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </span>
                </button>

                <!-- Card: Dokter -->
                <button @click="openLogin = true; selectedRole = 'Dokter'" 
                        class="group p-8 bg-rs-beige/20 rounded-3xl border border-transparent hover:border-rs-light-green hover:bg-white transition-all duration-300 text-left"
                        data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white p-4 rounded-2xl shadow-sm group-hover:bg-rs-light-green group-hover:text-white transition-colors duration-300 mb-6 inline-block">
                        <i data-lucide="stethoscope" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Dokter / EMR</h3>
                    <p class="text-sm text-gray-500 mb-4">Pemeriksaan klinis (SOAP), diagnosis ICD-10, dan E-Prescribing.</p>
                    <span class="text-rs-deep-green font-bold text-sm flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Masuk Modul <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </span>
                </button>

                <!-- Card: Kasir -->
                <button @click="openLogin = true; selectedRole = 'Kasir'" 
                        class="group p-8 bg-rs-beige/20 rounded-3xl border border-transparent hover:border-rs-light-green hover:bg-white transition-all duration-300 text-left"
                        data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-white p-4 rounded-2xl shadow-sm group-hover:bg-rs-light-green group-hover:text-white transition-colors duration-300 mb-6 inline-block">
                        <i data-lucide="banknote" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Kasir / Billing</h3>
                    <p class="text-sm text-gray-500 mb-4">Penyelesaian tagihan, kalkulasi biaya, dan cetak kwitansi resmi.</p>
                    <span class="text-rs-deep-green font-bold text-sm flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Masuk Modul <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </span>
                </button>

                <!-- Card: Admin IT -->
                <button @click="window.location.href='/backend/web/index.php'" 
                        class="group p-8 bg-gray-100 rounded-3xl border border-transparent hover:border-gray-300 hover:bg-white transition-all duration-300 text-left"
                        data-aos="fade-up" data-aos-delay="400">
                    <div class="bg-white p-4 rounded-2xl shadow-sm group-hover:bg-gray-800 group-hover:text-white transition-colors duration-300 mb-6 inline-block">
                        <i data-lucide="settings-2" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Admin IT</h3>
                    <p class="text-sm text-gray-500 mb-4">Manajemen pengguna, audit trail, master data unit, dan tarif.</p>
                    <span class="text-gray-700 font-bold text-sm flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Control Panel <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </span>
                </button>
            </div>
        </div>
    </section>