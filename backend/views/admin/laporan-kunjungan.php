<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kunjungan | Admin SIMRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        .admin-card {
            @apply bg-white rounded-[3rem] border border-slate-100 shadow-sm overflow-hidden;
        }

        .filter-input {
            @apply w-full px-6 py-4 rounded-2xl border-2 border-slate-100 bg-white focus:border-rs-orange focus:ring-8 focus:ring-rs-orange/5 outline-none transition-all text-sm font-bold text-slate-800;
        }
    </style>
</head>

<body class="p-4 md:p-10" x-data="{ showTrend: true }">

    <div class="max-w-7xl mx-auto space-y-10">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-down">
            <div class="space-y-2">
                <nav class="flex items-center text-[11px] font-black text-slate-400 uppercase tracking-[0.25em] mb-3">
                    <span>Pelaporan Sistem</span>
                    <i data-lucide="chevron-right" class="w-3.5 h-3.5 mx-3"></i>
                    <span class="text-rs-orange">Laporan Kunjungan</span>
                </nav>
                <h2 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tighter">Analitik Pasien</h2>
                <p class="text-lg text-slate-400 font-medium">Rekapitulasi kunjungan harian, mingguan, dan bulanan seluruh unit layanan.</p>
            </div>
            <div class="flex items-center gap-4">
                <button class="flex items-center px-10 py-5 bg-rs-orange text-white rounded-[2rem] text-xs font-black uppercase tracking-[0.3em] shadow-xl shadow-rs-orange/30 hover:scale-[1.02] active:scale-95 transition-all">
                    <i data-lucide="printer" class="w-5 h-5 mr-3 text-nowrap"></i>
                    Cetak Laporan
                </button>
                <button class="p-5 bg-white border-2 border-slate-100 text-slate-400 rounded-3xl hover:border-rs-orange hover:text-rs-orange transition-all">
                    <i data-lucide="share-2" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

        <!-- Comprehensive Filters -->
        <div class="admin-card p-10 bg-slate-50/50 border-none" data-aos="fade-up">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-3">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest ml-2">Rentang Tanggal</label>
                    <div class="relative">
                        <input type="date" class="filter-input">
                    </div>
                </div>
                <div class="space-y-3">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest ml-2">Hingga Tanggal</label>
                    <input type="date" class="filter-input">
                </div>
                <div class="space-y-3 text-nowrap">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest ml-2">Unit Layanan (Poli)</label>
                    <select class="filter-input cursor-pointer appearance-none">
                        <option>Semua Unit</option>
                        <option>Poliklinik Umum</option>
                        <option>Poli Penyakit Dalam</option>
                        <option>Poli Kandungan</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button class="w-full py-5 bg-admin-dark text-white rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] hover:bg-rs-deep-green transition-all shadow-lg shadow-slate-200">
                        <i data-lucide="filter" class="w-4 h-4 inline mr-2"></i> Terapkan Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Highlight Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
            <div class="admin-card !p-8 border-l-8 border-l-rs-orange">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Total Kunjungan</p>
                    <div class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[10px] font-black">+12%</div>
                </div>
                <div class="flex items-baseline space-x-3">
                    <h3 class="text-5xl font-black text-slate-800 tracking-tighter">1,482</h3>
                    <span class="text-sm font-bold text-slate-400 uppercase">Pasien</span>
                </div>
            </div>
            <div class="admin-card !p-8 border-l-8 border-l-rs-deep-green">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Kunjungan Baru</p>
                    <div class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-[10px] font-black">Stable</div>
                </div>
                <div class="flex items-baseline space-x-3">
                    <h3 class="text-5xl font-black text-slate-800 tracking-tighter">342</h3>
                    <span class="text-sm font-bold text-slate-400 uppercase">Pasien</span>
                </div>
            </div>
            <div class="admin-card !p-8 border-l-8 border-l-rs-light-green">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Selesai Layanan</p>
                    <div class="px-3 py-1 bg-rs-orange/10 text-rs-orange rounded-full text-[10px] font-black">98%</div>
                </div>
                <div class="flex items-baseline space-x-3">
                    <h3 class="text-5xl font-black text-slate-800 tracking-tighter">1,450</h3>
                    <span class="text-sm font-bold text-slate-400 uppercase">Pasien</span>
                </div>
            </div>
        </div>

        <!-- Detailed Table Section -->
        <div class="admin-card overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="p-10 border-b border-slate-50 flex items-center justify-between bg-slate-50/20">
                <div>
                    <h4 class="text-xl font-black text-slate-800 tracking-tight">Detail Kunjungan Harian</h4>
                    <p class="text-[11px] text-slate-400 font-bold uppercase tracking-widest mt-1">Data Periode: 01 Feb - 26 Feb 2024</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-4 bg-white border-2 border-slate-100 text-slate-400 rounded-2xl hover:border-rs-orange transition-all">
                        <i data-lucide="download" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Tgl Kunjungan</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Pasien & RM</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Unit & Dokter</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">Status</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <tr class="hover:bg-slate-50/80 transition-all group">
                            <td class="px-10 py-8">
                                <p class="text-sm font-black text-slate-800 tracking-tight text-nowrap">26 Feb 2024</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Pkl 14:20 WIB</p>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center font-black text-slate-400 text-xs">BS</div>
                                    <div>
                                        <p class="text-base font-black text-slate-800 tracking-tight">Budi Santoso</p>
                                        <p class="text-[10px] text-rs-orange font-black tracking-widest mt-1">RM: 00-12-45</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <p class="text-sm font-bold text-rs-deep-green uppercase tracking-tighter">Poli Penyakit Dalam</p>
                                <p class="text-[10px] text-slate-400 font-bold tracking-widest mt-1">dr. Andi Wijaya, Sp.PD</p>
                            </td>
                            <td class="px-10 py-8 text-center text-nowrap">
                                <span class="px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-rs-light-green/10 text-rs-light-green border border-rs-light-green/20">Selesai</span>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <p class="text-lg font-black text-slate-800 tracking-tighter italic">Lunas</p>
                                <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest mt-1">Tunai / Cash</p>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition-all group">
                            <td class="px-10 py-8">
                                <p class="text-sm font-black text-slate-800 tracking-tight text-nowrap">26 Feb 2024</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1 text-nowrap">Pkl 13:05 WIB</p>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center font-black text-slate-400 text-xs">SA</div>
                                    <div>
                                        <p class="text-base font-black text-slate-800 tracking-tight">Siti Aminah</p>
                                        <p class="text-[10px] text-rs-orange font-black tracking-widest mt-1">RM: 00-12-46</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <p class="text-sm font-bold text-rs-deep-green uppercase tracking-tighter">Poli Umum</p>
                                <p class="text-[10px] text-slate-400 font-bold tracking-widest mt-1">dr. Surya Bakti</p>
                            </td>
                            <td class="px-10 py-8 text-center">
                                <span class="px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-rs-orange/10 text-rs-orange border border-rs-orange/20 text-nowrap">Dalam Antrean</span>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <p class="text-lg font-black text-slate-300 tracking-tighter italic">Pending</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="px-10 py-10 bg-slate-50/30 border-t border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-6 text-nowrap">
                <div class="flex items-center space-x-6">
                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Halaman 1 dari 14</p>
                    <div class="h-6 w-[1px] bg-slate-200"></div>
                    <p class="text-[11px] font-black text-rs-orange uppercase tracking-widest">Total 1,482 Baris Data</p>
                </div>
                <div class="flex items-center gap-3">
                    <button class="px-6 py-4 rounded-2xl bg-white border-2 border-slate-100 text-[11px] font-black uppercase tracking-widest text-slate-400 hover:border-rs-orange hover:text-rs-orange transition-all">Sebelumnya</button>
                    <button class="px-6 py-4 rounded-2xl bg-admin-dark text-white text-[11px] font-black uppercase tracking-widest shadow-lg shadow-slate-200">Selanjutnya</button>
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
</body>

</html>