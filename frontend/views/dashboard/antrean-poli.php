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
                <span class="text-rs-deep-green">Antrean Poli</span>
            </nav>
            <h2 class="text-2xl font-black text-gray-800 tracking-tight">Manajemen Antrean</h2>
            <p class="text-xs text-gray-500 font-medium mt-1">Kelola urutan pemeriksaan pasien di unit layanan poliklinik.</p>
        </div>
        <button @click="openQueueModal = true" class="flex items-center px-6 py-3 bg-rs-deep-green text-white rounded-2xl text-xs font-bold shadow-lg shadow-rs-deep-green/20 hover:scale-105 transition-all uppercase tracking-widest">
            <i data-lucide="plus-circle" class="w-4 h-4 mr-2"></i>
            Tambah Antrean
        </button>
    </div>

    <!-- Queue Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6" data-aos="fade-up">
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex items-center space-x-4">
            <div class="bg-rs-orange/10 p-4 rounded-2xl text-rs-orange">
                <i data-lucide="users" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Menunggu</p>
                <h4 class="text-2xl font-black text-gray-800">18</h4>
            </div>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex items-center space-x-4">
            <div class="bg-rs-light-green/10 p-4 rounded-2xl text-rs-light-green">
                <i data-lucide="activity" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Sedang Diperiksa</p>
                <h4 class="text-2xl font-black text-gray-800">04</h4>
            </div>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex items-center space-x-4">
            <div class="bg-gray-100 p-4 rounded-2xl text-gray-400">
                <i data-lucide="check-circle-2" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Selesai Hari Ini</p>
                <h4 class="text-2xl font-black text-gray-800">24</h4>
            </div>
        </div>
    </div>

    <!-- Control & List Section -->
    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden" data-aos="fade-up" data-aos-delay="100">
        <!-- Header Table -->
        <div class="p-8 border-b border-gray-50 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <select x-model="filterPoli" class="appearance-none pl-10 pr-10 py-2.5 bg-gray-50 border-none rounded-xl text-xs font-bold text-gray-600 focus:ring-2 focus:ring-rs-light-green/20 outline-none cursor-pointer">
                        <option>Semua Poli</option>
                        <option>Poli Umum</option>
                        <option>Poli Kandungan</option>
                        <option>Poli Mata</option>
                        <option>Poli Gigi</option>
                    </select>
                    <i data-lucide="layers" class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
                    <i data-lucide="chevron-down" class="absolute right-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
                </div>
                <div class="h-6 w-[1px] bg-gray-200"></div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Filter Aktif: <span class="text-rs-deep-green" x-text="filterPoli"></span></p>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center px-4 py-2.5 bg-gray-50 text-gray-500 rounded-xl text-[10px] font-bold uppercase tracking-widest hover:bg-rs-beige/20 transition-all">
                    <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Cetak Antrean
                </button>
                <button class="p-2.5 bg-rs-orange text-white rounded-xl hover:scale-105 transition-all shadow-lg shadow-rs-orange/20">
                    <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">No. Antrean</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Pasien & No. RM</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tujuan Layanan</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Waktu Daftar</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-8 py-5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <!-- Row 1 -->
                    <tr class="hover:bg-rs-beige/5 transition-colors group">
                        <td class="px-8 py-6">
                            <div class="w-12 h-12 flex items-center justify-center bg-rs-orange text-white rounded-2xl font-black text-lg shadow-lg shadow-rs-orange/20">
                                A01
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-xs font-black text-gray-800 tracking-tight">Budi Santoso</span>
                                <span class="text-[10px] font-bold text-rs-orange tracking-widest mt-0.5">RM: 00-12-45</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-rs-deep-green uppercase tracking-tighter">Poli Umum</span>
                                <span class="text-[10px] text-gray-400 font-medium">dr. Andi Wijaya, Sp.PD</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[10px] font-bold text-gray-500 bg-gray-100 px-3 py-1 rounded-lg tracking-widest">08:15 WIB</span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="px-4 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-widest bg-rs-beige/40 text-rs-orange">Menunggu</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all">
                                <button class="p-2.5 rounded-xl bg-gray-50 text-gray-400 hover:bg-rs-deep-green hover:text-white transition-all shadow-sm">
                                    <i data-lucide="bell-ring" class="w-4 h-4"></i>
                                </button>
                                <button class="p-2.5 rounded-xl bg-gray-50 text-gray-400 hover:bg-red-500 hover:text-white transition-all shadow-sm">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-rs-beige/5 transition-colors group">
                        <td class="px-8 py-6">
                            <div class="w-12 h-12 flex items-center justify-center bg-rs-light-green text-white rounded-2xl font-black text-lg shadow-lg shadow-rs-light-green/20">
                                B03
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-xs font-black text-gray-800 tracking-tight">Siti Aminah</span>
                                <span class="text-[10px] font-bold text-rs-orange tracking-widest mt-0.5">RM: 00-12-46</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-rs-deep-green uppercase tracking-tighter">Poli Gigi</span>
                                <span class="text-[10px] text-gray-400 font-medium">drg. Maya Sari</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[10px] font-bold text-gray-500 bg-gray-100 px-3 py-1 rounded-lg tracking-widest">08:20 WIB</span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="px-4 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-widest bg-rs-light-green/10 text-rs-light-green">Diperiksa</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all text-nowrap">
                                <button class="p-2.5 rounded-xl bg-gray-50 text-gray-400 hover:bg-rs-deep-green hover:text-white transition-all shadow-sm">
                                    <i data-lucide="check-square" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal Tambah Antrean -->
<div x-show="openQueueModal"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
    x-cloak>
    <div @click.away="openQueueModal = false" class="bg-white rounded-[2.5rem] shadow-2xl w-full max-w-lg overflow-hidden flex flex-col">
        <div class="bg-rs-deep-green p-8 text-white flex items-center justify-between">
            <div>
                <h3 class="text-xl font-black uppercase tracking-tight">Daftarkan Antrean</h3>
                <p class="text-[10px] text-rs-light-green font-bold uppercase tracking-[0.2em] mt-1">Registrasi Pelayanan Medis</p>
            </div>
            <button @click="openQueueModal = false" class="p-2 hover:bg-white/10 rounded-full transition-colors">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        <div class="p-8 space-y-6">
            <!-- Search Pasien -->
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Cari Pasien Terdaftar (Nama/No.RM)</label>
                <div class="relative">
                    <input type="text" class="form-input pl-11" placeholder="Masukkan nama atau nomor RM...">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                </div>
                <p class="text-[9px] text-gray-400 mt-2 px-1">Tip: Gunakan spasi untuk memisahkan pencarian.</p>
            </div>

            <!-- Pilih Poli -->
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1 text-nowrap">Pilih Unit Layanan (Poliklinik)</label>
                <select class="form-input">
                    <option value="">-- Pilih Poliklinik --</option>
                    <option value="1">Poli Umum</option>
                    <option value="2">Poli Kandungan</option>
                    <option value="3">Poli Gigi</option>
                    <option value="4">Poli Mata</option>
                </select>
            </div>

            <!-- Pilih Dokter -->
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Pilih Dokter Jaga</label>
                <select class="form-input">
                    <option value="">-- Pilih Dokter --</option>
                    <option value="1">dr. Andi Wijaya, Sp.PD</option>
                    <option value="2">drg. Maya Sari</option>
                </select>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3">
                <button @click="openQueueModal = false" class="px-6 py-3 text-xs font-bold text-gray-400 uppercase tracking-widest hover:text-gray-600 transition-colors">Batal</button>
                <button class="px-8 py-3 bg-rs-orange text-white rounded-xl text-xs font-bold shadow-lg shadow-rs-orange/20 hover:bg-opacity-90 transition-all uppercase tracking-widest">Daftarkan Pasien</button>
            </div>
        </div>
    </div>
</div>

<!-- AOS & Lucide Init -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
    lucide.createIcons();
</script>