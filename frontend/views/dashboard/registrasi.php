<?php

/* @var $this yii\web\View */

?> 
 <div class="max-w-7xl mx-auto space-y-6">
        
        <!-- Breadcrumb & Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4" data-aos="fade-down">
            <div>
                <nav class="flex items-center text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">
                    <a href="#" class="hover:text-rs-deep-green">Dashboard</a>
                    <i data-lucide="chevron-right" class="w-3 h-3 mx-2"></i>
                    <span class="text-rs-deep-green">Registrasi Pasien</span>
                </nav>
                <h2 class="text-2xl font-black text-gray-800 tracking-tight">Manajemen Pasien</h2>
                <p class="text-xs text-gray-500 font-medium mt-1">Kelola data rekam medis dan pendaftaran pasien baru.</p>
            </div>
            <button @click="openModal = true" class="flex items-center px-6 py-3 bg-rs-orange text-white rounded-2xl text-xs font-bold shadow-lg shadow-rs-orange/20 hover:scale-105 transition-all uppercase tracking-widest">
                <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i>
                Daftar Pasien Baru
            </button>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4" data-aos="fade-up">
            <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Pasien</p>
                <h4 class="text-xl font-black text-gray-800">1,284</h4>
            </div>
            <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Hari Ini</p>
                <h4 class="text-xl font-black text-rs-deep-green">+12</h4>
            </div>
            <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Laki-laki</p>
                <h4 class="text-xl font-black text-gray-800">542</h4>
            </div>
            <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Perempuan</p>
                <h4 class="text-xl font-black text-gray-800">742</h4>
            </div>
        </div>

        <!-- Filter & Table Card -->
        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <!-- Table Header / Search Area -->
            <div class="p-6 border-b border-gray-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="relative flex-1 max-w-md">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                    <input type="text" placeholder="Cari Nama, NIK, atau No. RM..." class="w-full pl-11 pr-4 py-2.5 bg-gray-50 rounded-xl border-none text-xs focus:ring-2 focus:ring-rs-light-green/20 outline-none">
                </div>
                <div class="flex items-center gap-2">
                    <button class="p-2.5 rounded-xl bg-gray-50 text-gray-500 hover:bg-rs-beige/20 transition-colors">
                        <i data-lucide="filter" class="w-4 h-4"></i>
                    </button>
                    <button class="p-2.5 rounded-xl bg-gray-50 text-gray-500 hover:bg-rs-beige/20 transition-colors">
                        <i data-lucide="download" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <!-- Table Body -->
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">No. RM</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Identitas Pasien</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Kontak & Alamat</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center">Status</th>
                            <th class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <tr class="hover:bg-rs-beige/5 transition-colors group">
                            <td class="px-6 py-4">
                                <span class="text-xs font-black text-rs-orange bg-rs-orange/10 px-3 py-1.5 rounded-lg tracking-tighter">00-12-45</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-700">Budi Santoso</span>
                                    <span class="text-[10px] text-gray-400 font-medium uppercase tracking-tight">NIK: 3501xxxxxxxxxxxx</span>
                                    <span class="text-[10px] text-gray-500 italic mt-1">Laki-laki, 34 Thn</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center text-[10px] text-gray-500">
                                        <i data-lucide="phone" class="w-3 h-3 mr-1.5 text-rs-light-green"></i>
                                        0812-3456-7890
                                    </div>
                                    <div class="flex items-start text-[10px] text-gray-500 max-w-[200px]">
                                        <i data-lucide="map-pin" class="w-3 h-3 mr-1.5 text-rs-light-green mt-0.5"></i>
                                        <span>Jl. Merak No. 12, Pekanbaru</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-[9px] font-bold uppercase tracking-tighter bg-rs-light-green/10 text-rs-light-green">Aktif</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button @click="showCard = true; selectedPasien = 'Budi Santoso'" class="p-2 rounded-lg bg-gray-50 text-gray-400 hover:bg-rs-orange hover:text-white transition-all shadow-sm">
                                        <i data-lucide="credit-card" class="w-4 h-4"></i>
                                    </button>
                                    <button class="p-2 rounded-lg bg-gray-50 text-gray-400 hover:bg-rs-deep-green hover:text-white transition-all shadow-sm">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer Pagination -->
            <div class="p-6 bg-gray-50/30 border-t border-gray-50 flex items-center justify-between">
                <p class="text-[10px] font-medium text-gray-400 uppercase tracking-widest">Menampilkan 1-10 dari 1,284 pasien</p>
                <div class="flex items-center gap-2">
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-400 hover:border-rs-orange transition-all"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-rs-orange text-white font-bold text-[10px]">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-400 hover:border-rs-orange transition-all"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
                </div>
            </div>
        </div>

    </div>

    <!-- Registration Modal -->
    <div x-show="openModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
         x-cloak>
        <div @click.away="openModal = false" class="bg-white rounded-[2.5rem] shadow-2xl w-full max-w-2xl overflow-hidden max-h-[90vh] flex flex-col">
            <div class="bg-rs-deep-green p-8 text-white flex items-center justify-between shrink-0">
                <div>
                    <h3 class="text-xl font-black uppercase tracking-tight">Daftar Pasien Baru</h3>
                    <p class="text-[10px] text-rs-light-green font-bold uppercase tracking-[0.2em] mt-1">Rekam Medis Digital</p>
                </div>
                <button @click="openModal = false" class="p-2 hover:bg-white/10 rounded-full transition-colors">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
            <div class="p-8 overflow-y-auto">
                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">NIK (Sesuai KTP)</label>
                        <input type="text" class="form-input" placeholder="3501xxxxxxxxxxxx">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                        <input type="text" class="form-input" placeholder="Masukkan nama pasien...">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Jenis Kelamin</label>
                        <select class="form-input">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Tempat Lahir</label>
                        <input type="text" class="form-input" placeholder="Pekanbaru">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Tanggal Lahir</label>
                        <input type="date" class="form-input">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Alamat Domisili</label>
                        <textarea class="form-input h-24 resize-none" placeholder="Alamat lengkap..."></textarea>
                    </div>
                    <div class="md:col-span-2 flex items-center justify-end gap-3 mt-4">
                        <button type="button" @click="openModal = false" class="px-6 py-3 text-xs font-bold text-gray-400 uppercase tracking-widest hover:text-gray-600">Batal</button>
                        <button type="button" class="px-8 py-3 bg-rs-orange text-white rounded-xl text-xs font-bold shadow-lg shadow-rs-orange/20 hover:bg-opacity-90 transition-all uppercase tracking-widest">Simpan Data Pasien</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Print Card Modal -->
    <div x-show="showCard" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/60 backdrop-blur-md"
         x-cloak>
        <div @click.away="showCard = false" class="bg-white rounded-[2rem] p-8 max-w-sm w-full text-center">
            <h4 class="text-sm font-bold text-gray-800 mb-6">Pratinjau Kartu Pasien</h4>
            
            <div class="bg-gradient-to-br from-rs-deep-green to-green-800 p-6 rounded-2xl text-white text-left shadow-2xl relative overflow-hidden mb-8 aspect-[1.6/1]">
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-[8px] font-bold tracking-[0.2em] uppercase opacity-70">RSU SEHAT MEDIKA</p>
                            <p class="text-[10px] font-black tracking-tight mt-0.5">NUSANTARA</p>
                        </div>
                        <i data-lucide="hospital" class="w-6 h-6 opacity-30"></i>
                    </div>
                    <div>
                        <p class="text-[14px] font-black tracking-widest mb-1">00-12-45</p>
                        <p class="text-[12px] font-bold uppercase truncate" x-text="selectedPasien"></p>
                    </div>
                </div>
                <!-- Decoration -->
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/5 rounded-full"></div>
            </div>

            <button class="w-full py-3 bg-rs-orange text-white rounded-xl text-xs font-bold shadow-lg shadow-rs-orange/20 flex items-center justify-center uppercase tracking-widest">
                <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                Cetak Kartu
            </button>
            <button @click="showCard = false" class="mt-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest hover:text-gray-600">Tutup</button>
        </div>
    </div>

    <!-- AOS & Lucide Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        lucide.createIcons();
    </script>