<?php

/* @var $this yii\web\View */

?>
<div class="max-w-7xl mx-auto space-y-8">

    <!-- Welcome Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4" data-aos="fade-down">
        <div class="space-y-1">
            <h2 class="text-xl font-bold text-gray-800">Halo, Leonza Norisevick 👋</h2>
            <p class="text-xs text-gray-500 font-medium">Selamat datang kembali di sistem operasional RSU Sehat Medika.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="px-4 py-2 bg-white border border-rs-beige/50 rounded-xl flex items-center shadow-sm">
                <i data-lucide="calendar" class="w-4 h-4 text-rs-orange mr-2"></i>
                <span class="text-[11px] font-bold text-gray-600 uppercase tracking-wider">Kamis, 26 Feb 2024</span>
            </div>
            <button class="px-5 py-2.5 bg-rs-orange text-white rounded-xl text-[11px] font-bold shadow-lg shadow-rs-orange/20 hover:scale-105 transition-all uppercase tracking-widest flex items-center">
                <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                Registrasi Baru
            </button>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat 1 -->
        <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition-all group" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-rs-orange p-2.5 rounded-2xl text-white shadow-lg shadow-orange-500/20">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                </div>
                <span class="text-[10px] font-bold text-rs-light-green bg-rs-light-green/10 px-2 py-1 rounded-lg">+12%</span>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.1em] mb-1">Total Registrasi</p>
                <h3 class="text-2xl font-black text-gray-800">42</h3>
            </div>
        </div>
        <!-- Stat 2 -->
        <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition-all group" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-rs-deep-green p-2.5 rounded-2xl text-white shadow-lg shadow-green-800/20">
                    <i data-lucide="clock" class="w-5 h-5"></i>
                </div>
                <span class="text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-1 rounded-lg">Normal</span>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.1em] mb-1">Antrean Aktif</p>
                <h3 class="text-2xl font-black text-gray-800">12</h3>
            </div>
        </div>
        <!-- Stat 3 -->
        <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition-all group" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-rs-light-green p-2.5 rounded-2xl text-white shadow-lg shadow-green-500/20">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                </div>
                <span class="text-[10px] font-bold text-rs-light-green bg-rs-light-green/10 px-2 py-1 rounded-lg">80%</span>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.1em] mb-1">Selesai Periksa</p>
                <h3 class="text-2xl font-black text-gray-800">30</h3>
            </div>
        </div>
        <!-- Stat 4 -->
        <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition-all group" data-aos="fade-up" data-aos-delay="400">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-blue-500 p-2.5 rounded-2xl text-white shadow-lg shadow-blue-500/20">
                    <i data-lucide="users" class="w-5 h-5"></i>
                </div>
                <span class="text-[10px] font-bold text-blue-500 bg-blue-500/10 px-2 py-1 rounded-lg">+2</span>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.1em] mb-1">Pasien Baru</p>
                <h3 class="text-2xl font-black text-gray-800">08</h3>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">

        <!-- Table Antrean -->
        <div class="lg:col-span-2 bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden" data-aos="fade-right">
            <div class="p-6 border-b border-gray-50 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-gray-800">Monitor Antrean Pasien</h3>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">Data Real-time Hari Ini</p>
                </div>
                <button class="text-[10px] font-bold text-rs-deep-green hover:text-rs-orange transition-colors uppercase tracking-widest">Selengkapnya</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">No. RM</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Nama Pasien</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Poli / Dokter</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center">Status</th>
                            <th class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-xs">
                        <tr class="hover:bg-rs-beige/10 transition-colors group">
                            <td class="px-6 py-4 font-bold text-rs-orange">00-12-45</td>
                            <td class="px-6 py-4 font-bold text-gray-700">Budi Santoso</td>
                            <td class="px-6 py-4">
                                <p class="font-medium text-gray-600">Umum</p>
                                <p class="text-[10px] text-gray-400 italic text-nowrap">dr. Andi</p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-[9px] font-bold uppercase tracking-tighter bg-rs-beige/40 text-rs-orange">Menunggu</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="p-2 rounded-lg bg-gray-50 text-gray-400 opacity-0 group-hover:opacity-100 transition-all hover:bg-rs-deep-green hover:text-white">
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-rs-beige/10 transition-colors group">
                            <td class="px-6 py-4 font-bold text-rs-orange">00-12-46</td>
                            <td class="px-6 py-4 font-bold text-gray-700">Siti Aminah</td>
                            <td class="px-6 py-4">
                                <p class="font-medium text-gray-600">Gigi</p>
                                <p class="text-[10px] text-gray-400 italic text-nowrap">drg. Maya</p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-[9px] font-bold uppercase tracking-tighter bg-rs-light-green/10 text-rs-light-green">Diperiksa</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="p-2 rounded-lg bg-gray-50 text-gray-400 opacity-0 group-hover:opacity-100 transition-all hover:bg-rs-deep-green hover:text-white">
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Sidebar Right -->
        <div class="space-y-6" data-aos="fade-left">
            <!-- Info Box -->
            <div class="bg-rs-deep-green p-6 rounded-3xl text-white relative overflow-hidden shadow-xl shadow-rs-deep-green/10">
                <div class="relative z-10">
                    <h4 class="text-sm font-bold mb-2">Info Kapasitas</h4>
                    <p class="text-[11px] text-white/70 leading-relaxed mb-6">Poli Mata dan Kandungan saat ini sedang dalam volume tinggi. Estimasi antrean +45 menit.</p>
                    <div class="w-full bg-white/10 h-1.5 rounded-full mb-4 text-nowrap">
                        <div class="bg-rs-orange h-full rounded-full" style="width: 85%"></div>
                    </div>
                    <p class="text-[9px] font-bold uppercase tracking-widest text-rs-beige">Okupansi: 85%</p>
                </div>
                <i data-lucide="activity" class="absolute -bottom-4 -right-4 w-24 h-24 text-white/5 transform rotate-12"></i>
            </div>

            <!-- Quick Access Grid -->
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4">Akses Cepat</h4>
                <div class="grid grid-cols-2 gap-3">
                    <button class="flex flex-col items-center p-4 rounded-2xl bg-gray-50 hover:bg-rs-beige/20 border border-transparent hover:border-rs-beige transition-all group">
                        <i data-lucide="printer" class="w-5 h-5 text-gray-400 group-hover:text-rs-orange mb-2"></i>
                        <span class="text-[9px] font-bold text-gray-600 uppercase tracking-tighter">Cetak Tracer</span>
                    </button>
                    <button class="flex flex-col items-center p-4 rounded-2xl bg-gray-50 hover:bg-rs-beige/20 border border-transparent hover:border-rs-beige transition-all group">
                        <i data-lucide="search" class="w-5 h-5 text-gray-400 group-hover:text-rs-orange mb-2"></i>
                        <span class="text-[9px] font-bold text-gray-600 uppercase tracking-tighter">Cari Pasien</span>
                    </button>
                    <button class="flex flex-col items-center p-4 rounded-2xl bg-gray-50 hover:bg-rs-beige/20 border border-transparent hover:border-rs-beige transition-all group">
                        <i data-lucide="file-text" class="w-5 h-5 text-gray-400 group-hover:text-rs-orange mb-2"></i>
                        <span class="text-[9px] font-bold text-gray-600 uppercase tracking-tighter">Laporan RM</span>
                    </button>
                    <button class="flex flex-col items-center p-4 rounded-2xl bg-gray-50 hover:bg-rs-beige/20 border border-transparent hover:border-rs-beige transition-all group">
                        <i data-lucide="shield-check" class="w-5 h-5 text-gray-400 group-hover:text-rs-orange mb-2"></i>
                        <span class="text-[9px] font-bold text-gray-600 uppercase tracking-tighter text-nowrap">Verifikasi</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
    lucide.createIcons();
</script>