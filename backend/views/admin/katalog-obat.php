<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Obat | Admin SIMRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'rs-orange': '#E67E22',
                        'rs-deep-green': '#628141',
                        'rs-light-green': '#8BAE66',
                        'rs-beige': '#EBD5AB',
                        'admin-dark': '#1e293b',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .admin-card { @apply bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden; }
        .form-input { @apply w-full px-6 py-4 rounded-2xl border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-rs-orange focus:ring-8 focus:ring-rs-orange/5 outline-none transition-all text-sm font-bold text-slate-800 placeholder:text-slate-300; }
    </style>
</head>
<body class="p-4 md:p-10" x-data="{ openMedicineModal: false, editMode: false }">

    <div class="max-w-7xl mx-auto space-y-10">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-down">
            <div class="space-y-2">
                <nav class="flex items-center text-[11px] font-black text-slate-400 uppercase tracking-[0.25em] mb-3">
                    <span>Logistik Farmasi</span>
                    <i data-lucide="chevron-right" class="w-3.5 h-3.5 mx-3"></i>
                    <span class="text-rs-orange">Katalog Obat</span>
                </nav>
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter">Inventaris Obat</h2>
                <p class="text-base text-slate-400 font-medium">Manajemen ketersediaan obat, kategori formularium, dan harga jual farmasi.</p>
            </div>
            <button @click="openMedicineModal = true; editMode = false" class="flex items-center px-10 py-5 bg-admin-dark text-white rounded-[2rem] text-xs font-black uppercase tracking-[0.3em] shadow-[0_20px_50px_-10px_rgba(30,41,59,0.3)] hover:bg-rs-orange hover:shadow-rs-orange/30 transition-all transform hover:-translate-y-1 active:scale-95">
                <i data-lucide="pill" class="w-5 h-5 mr-3"></i>
                Tambah Obat Baru
            </button>
        </div>

        <!-- Medicine Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6" data-aos="fade-up">
            <div class="admin-card !p-6 flex items-center justify-between group">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Item</p>
                    <h3 class="text-2xl font-black text-slate-800 tracking-tighter">842 Obat</h3>
                </div>
                <div class="w-12 h-12 bg-rs-orange/10 text-rs-orange rounded-2xl flex items-center justify-center">
                    <i data-lucide="boxes" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="admin-card !p-6 flex items-center justify-between group border-l-8 border-l-red-500">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1 text-nowrap">Staf Hampir Habis</p>
                    <h3 class="text-2xl font-black text-red-500 tracking-tighter">12 Item</h3>
                </div>
                <div class="w-12 h-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center">
                    <i data-lucide="alert-triangle" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="admin-card !p-6 flex items-center justify-between group">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Kategori Syrup</p>
                    <h3 class="text-2xl font-black text-slate-800 tracking-tighter">154 Item</h3>
                </div>
                <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center">
                    <i data-lucide="beaker" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="admin-card !p-6 flex items-center justify-between group">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Obat Generik</p>
                    <h3 class="text-2xl font-black text-rs-deep-green tracking-tighter">65%</h3>
                </div>
                <div class="w-12 h-12 bg-rs-deep-green/10 text-rs-deep-green rounded-2xl flex items-center justify-center">
                    <i data-lucide="activity" class="w-6 h-6"></i>
                </div>
            </div>
        </div>

        <!-- Medicine Catalog Table -->
        <div class="admin-card overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <!-- Table Action Bar -->
            <div class="p-8 border-b border-slate-50 flex flex-col lg:flex-row lg:items-center justify-between gap-6 bg-slate-50/30">
                <div class="relative flex-1 max-w-xl text-nowrap">
                    <i data-lucide="search" class="absolute left-6 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                    <input type="text" placeholder="Cari nama obat atau kandungan..." class="w-full pl-16 pr-8 py-4 bg-white border-2 border-slate-100 rounded-[1.5rem] text-sm font-bold focus:ring-4 focus:ring-rs-orange/10 outline-none transition-all">
                </div>
                <div class="flex items-center gap-4 text-nowrap">
                    <select class="px-6 py-4 bg-white border-2 border-slate-100 rounded-2xl text-[11px] font-black uppercase tracking-widest text-slate-500 outline-none focus:border-rs-orange transition-all">
                        <option>Semua Kategori</option>
                        <option>Tablet</option>
                        <option>Syrup</option>
                        <option>Injeksi</option>
                    </select>
                    <button class="p-4 bg-white border-2 border-slate-100 text-slate-400 rounded-2xl hover:border-rs-orange hover:text-rs-orange transition-all">
                        <i data-lucide="filter" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Data Obat</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Kategori & Tipe</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Stok Tersedia</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Harga Satuan</th>
                            <th class="px-10 py-6"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <!-- Item 1 -->
                        <tr class="hover:bg-slate-50/80 transition-all group">
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-6">
                                    <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center font-black text-slate-400 group-hover:bg-rs-orange group-hover:text-white transition-all">
                                        PC
                                    </div>
                                    <div>
                                        <p class="text-base font-black text-slate-800 tracking-tight">Paracetamol 500mg</p>
                                        <p class="text-[10px] text-slate-400 font-bold tracking-widest mt-1 uppercase">Generik • Kimia Farma</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest bg-blue-50 text-blue-500 border border-blue-100">Tablet</span>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex flex-col">
                                    <span class="text-sm font-black text-slate-800 tracking-tight">1.240 Butir</span>
                                    <div class="w-24 bg-slate-100 h-1.5 rounded-full mt-2">
                                        <div class="bg-rs-light-green h-full rounded-full" style="width: 80%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <span class="text-lg font-black text-slate-800 tracking-tighter italic">Rp 500</span>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all">
                                    <button class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all">
                                        <i data-lucide="edit-2" class="w-4 h-4"></i>
                                    </button>
                                    <button class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-red-500 hover:border-red-200 transition-all">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Item 2 (Stok Kritis) -->
                        <tr class="hover:bg-slate-50/80 transition-all group">
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-6">
                                    <div class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center font-black text-red-500 group-hover:bg-red-500 group-hover:text-white transition-all">
                                        AM
                                    </div>
                                    <div>
                                        <p class="text-base font-black text-slate-800 tracking-tight">Amoxicillin Syrup</p>
                                        <p class="text-[10px] text-slate-400 font-bold tracking-widest mt-1 uppercase">Antibiotik • Kalbe</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest bg-rs-beige/30 text-rs-orange border border-rs-orange/20">Syrup</span>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex flex-col">
                                    <span class="text-sm font-black text-red-500 tracking-tight">5 Botol</span>
                                    <div class="w-24 bg-slate-100 h-1.5 rounded-full mt-2">
                                        <div class="bg-red-500 h-full rounded-full" style="width: 10%"></div>
                                    </div>
                                    <span class="text-[9px] font-black text-red-400 uppercase tracking-widest mt-1 animate-pulse">Perlu Restock!</span>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <span class="text-lg font-black text-slate-800 tracking-tighter italic text-nowrap">Rp 25.000</span>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all">
                                    <button class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all">
                                        <i data-lucide="edit-2" class="w-4 h-4"></i>
                                    </button>
                                    <button class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-red-500 hover:border-red-200 transition-all">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: Medicine Editor -->
    <div x-show="openMedicineModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="fixed inset-0 z-50 flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-md"
         x-cloak>
        <div @click.away="openMedicineModal = false" class="bg-white rounded-[4rem] shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
            <!-- Header Modal -->
            <div class="bg-admin-dark p-12 text-white flex items-center justify-between shrink-0 relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-3xl font-black uppercase tracking-tight" x-text="editMode ? 'Edit Data Obat' : 'Tambah Katalog Obat'"></h3>
                    <p class="text-[11px] text-rs-orange font-bold uppercase tracking-[0.3em] mt-3">Manajemen Master Farmasi</p>
                </div>
                <button @click="openMedicineModal = false" class="p-4 hover:bg-white/10 rounded-full transition-colors relative z-10">
                    <i data-lucide="x" class="w-8 h-8"></i>
                </button>
                <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-white/5 rounded-full"></div>
            </div>

            <!-- Modal Body -->
            <div class="p-12 overflow-y-auto space-y-10">
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="md:col-span-2">
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Nama Obat & Kekuatan</label>
                        <input type="text" class="form-input" placeholder="Contoh: Paracetamol 500mg, Amoxicillin 250mg...">
                    </div>
                    <div>
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Kategori Sediaan</label>
                        <select class="form-input cursor-pointer appearance-none">
                            <option value="">Pilih Kategori</option>
                            <option value="1">Tablet / Kaplet</option>
                            <option value="2">Syrup / Drop</option>
                            <option value="3">Injeksi / Infus</option>
                            <option value="4">Salep / Cream</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Harga Jual (HET)</label>
                        <input type="number" class="form-input" placeholder="Rp 0">
                    </div>
                    <div>
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Stok Awal</label>
                        <input type="number" class="form-input" placeholder="0">
                    </div>
                    <div>
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Satuan</label>
                        <select class="form-input cursor-pointer appearance-none">
                            <option value="1">Butir / Tablet</option>
                            <option value="2">Botol / Vial</option>
                            <option value="3">Pcs / Box</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Produsen / Manufaktur</label>
                        <input type="text" class="form-input" placeholder="Contoh: Kimia Farma, Kalbe, Biofarma...">
                    </div>
                </div>

                <div class="pt-10 border-t border-slate-100 flex items-center justify-end gap-6">
                    <button @click="openMedicineModal = false" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] hover:text-slate-600 transition-colors">Batal</button>
                    <button class="px-12 py-5 bg-rs-orange text-white rounded-[2rem] text-xs font-black uppercase tracking-[0.3em] shadow-xl shadow-rs-orange/20 hover:scale-[1.02] active:scale-95 transition-all">Simpan Katalog</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AOS & Lucide Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        lucide.createIcons();
    </script>
</body>
</html>