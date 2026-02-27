<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Trail | Admin SIMRS</title>
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
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        .admin-card {
            @apply bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden;
        }

        .log-type-badge {
            @apply px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest border shadow-sm;
        }

        .json-viewer {
            @apply font-mono text-[10px] bg-slate-900 text-green-400 p-4 rounded-xl overflow-x-auto border border-white/10;
        }
    </style>
</head>

<body class="p-4 md:p-10" x-data="{ openLogDetail: false, selectedLog: null }">

    <div class="max-w-7xl mx-auto space-y-10">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-down">
            <div class="space-y-2">
                <nav class="flex items-center text-[11px] font-black text-slate-400 uppercase tracking-[0.25em] mb-3">
                    <span>Sistem & Keamanan</span>
                    <i data-lucide="chevron-right" class="w-3.5 h-3.5 mx-3"></i>
                    <span class="text-rs-orange">Audit Trail Log</span>
                </nav>
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter">Jejak Aktivitas</h2>
                <p class="text-base text-slate-400 font-medium text-nowrap">Pemantauan riwayat perubahan data dan log keamanan sistem secara real-time.</p>
            </div>
            <div class="flex items-center gap-4 text-nowrap">
                <button class="flex items-center px-8 py-5 bg-white border-2 border-slate-100 text-slate-500 rounded-[2rem] text-xs font-black uppercase tracking-[0.2em] hover:border-rs-orange hover:text-rs-orange transition-all shadow-sm">
                    <i data-lucide="download-cloud" class="w-5 h-5 mr-3"></i>
                    Export CSV
                </button>
            </div>
        </div>

        <!-- Security Metrics Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6" data-aos="fade-up">
            <div class="admin-card !p-6 flex items-center justify-between group border-l-8 border-l-rs-orange">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Log (24j)</p>
                    <h3 class="text-2xl font-black text-slate-800 tracking-tighter">2,482</h3>
                </div>
                <div class="w-12 h-12 bg-rs-orange/10 text-rs-orange rounded-2xl flex items-center justify-center">
                    <i data-lucide="scroll-text" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="admin-card !p-6 flex items-center justify-between group border-l-8 border-l-red-500">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Failed Login</p>
                    <h3 class="text-2xl font-black text-red-500 tracking-tighter">04</h3>
                </div>
                <div class="w-12 h-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center">
                    <i data-lucide="shield-alert" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="admin-card !p-6 flex items-center justify-between group border-l-8 border-l-rs-deep-green">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Perubahan Medis</p>
                    <h3 class="text-2xl font-black text-rs-deep-green tracking-tighter">142</h3>
                </div>
                <div class="w-12 h-12 bg-rs-deep-green/10 text-rs-deep-green rounded-2xl flex items-center justify-center">
                    <i data-lucide="stethoscope" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="admin-card !p-6 flex items-center justify-between group border-l-8 border-l-blue-500">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Uptime Server</p>
                    <h3 class="text-2xl font-black text-blue-500 tracking-tighter">99.9%</h3>
                </div>
                <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center">
                    <i data-lucide="server" class="w-6 h-6"></i>
                </div>
            </div>
        </div>

        <!-- Audit Trail Log Table -->
        <div class="admin-card overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <!-- Table Filter Bar -->
            <div class="p-8 border-b border-slate-50 flex flex-col lg:flex-row lg:items-center justify-between gap-6 bg-slate-50/30">
                <div class="flex items-center gap-4 flex-1 max-w-2xl text-nowrap">
                    <div class="relative flex-1">
                        <i data-lucide="search" class="absolute left-6 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                        <input type="text" placeholder="Cari aktivitas, user, atau IP..." class="w-full pl-16 pr-8 py-4 bg-white border-2 border-slate-100 rounded-[1.5rem] text-sm font-bold focus:ring-4 focus:ring-rs-orange/10 outline-none transition-all">
                    </div>
                    <select class="px-6 py-4 bg-white border-2 border-slate-100 rounded-2xl text-[11px] font-black uppercase tracking-widest text-slate-500 outline-none focus:border-rs-orange transition-all">
                        <option>Semua Modul</option>
                        <option>EMR (SOAP)</option>
                        <option>Farmasi</option>
                        <option>Billing</option>
                        <option>RBAC</option>
                    </select>
                </div>
                <div class="flex items-center gap-3">
                    <button class="p-4 bg-white border-2 border-slate-100 text-slate-400 rounded-2xl hover:border-rs-orange hover:text-rs-orange transition-all">
                        <i data-lucide="calendar" class="w-5 h-5"></i>
                    </button>
                    <button class="p-4 bg-rs-orange text-white rounded-2xl shadow-lg shadow-rs-orange/20 hover:rotate-180 transition-all duration-700">
                        <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50 text-nowrap">
                        <tr>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Timestamp & IP</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Pengguna</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Aktivitas / Modul</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">Tipe Aksi</th>
                            <th class="px-10 py-6"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <!-- Log 1: Update Medis (Sensitive) -->
                        <tr class="hover:bg-slate-50/80 transition-all group">
                            <td class="px-10 py-8">
                                <div class="flex flex-col">
                                    <span class="text-sm font-black text-slate-800 tracking-tight">26 Feb, 14:22:10</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">IP: 192.168.1.42</span>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-rs-orange rounded-xl flex items-center justify-center font-black text-white text-[10px] shadow-md">AW</div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-700">dr. Andi Wijaya</p>
                                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Dokter / EMR</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-nowrap">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-600">Update SOAP Pasien RM:00-12-45</span>
                                    <span class="text-[10px] text-rs-deep-green font-black uppercase tracking-[0.1em] mt-1">Modul: Medical EMR</span>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-center">
                                <span class="log-type-badge bg-blue-50 text-blue-500 border-blue-100">UPDATE</span>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <button @click="openLogDetail = true; selectedLog = 'soap_update'" class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all group-hover:shadow-lg">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Log 2: Create Pasien -->
                        <tr class="hover:bg-slate-50/80 transition-all group">
                            <td class="px-10 py-8">
                                <div class="flex flex-col">
                                    <span class="text-sm font-black text-slate-800 tracking-tight">26 Feb, 14:15:05</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">IP: 192.168.1.18</span>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-rs-deep-green rounded-xl flex items-center justify-center font-black text-white text-[10px] shadow-md">LN</div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-700">Leonza (Admisi)</p>
                                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Perawat / Front Office</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-600">Registrasi Pasien Baru (NIK: 3501...)</span>
                                    <span class="text-[10px] text-rs-deep-green font-black uppercase tracking-[0.1em] mt-1">Modul: Registration</span>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-center">
                                <span class="log-type-badge bg-rs-light-green/10 text-rs-light-green border-rs-light-green/20">CREATE</span>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <button class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all group-hover:shadow-lg">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Log 3: Delete (Alert) -->
                        <tr class="hover:bg-red-50/30 transition-all group">
                            <td class="px-10 py-8">
                                <div class="flex flex-col">
                                    <span class="text-sm font-black text-slate-800 tracking-tight">26 Feb, 13:50:42</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">IP: 192.168.1.5</span>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-admin-dark rounded-xl flex items-center justify-center font-black text-white text-[10px] shadow-md">ADM</div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-700">Leonza (System)</p>
                                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Root Admin</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-red-600">Penghapusan Hak Akses (User: kasir_01)</span>
                                    <span class="text-[10px] text-rs-deep-green font-black uppercase tracking-[0.1em] mt-1">Modul: Security RBAC</span>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-center">
                                <span class="log-type-badge bg-red-50 text-red-500 border-red-100">DELETE</span>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <button class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all group-hover:shadow-lg">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: Log Detail Viewer (Diff JSON) -->
    <div x-show="openLogDetail"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        class="fixed inset-0 z-50 flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-md"
        x-cloak>
        <div @click.away="openLogDetail = false" class="bg-white rounded-[4rem] shadow-2xl w-full max-w-3xl overflow-hidden flex flex-col max-h-[90vh]">
            <!-- Header Modal -->
            <div class="bg-admin-dark p-12 text-white flex items-center justify-between shrink-0 relative overflow-hidden">
                <div class="relative z-10 text-nowrap">
                    <h3 class="text-3xl font-black uppercase tracking-tight">Rincian Perubahan Data</h3>
                    <p class="text-[11px] text-rs-orange font-bold uppercase tracking-[0.3em] mt-3 uppercase">Event ID: LOG-4284-SMN</p>
                </div>
                <button @click="openLogDetail = false" class="p-4 hover:bg-white/10 rounded-full transition-colors relative z-10">
                    <i data-lucide="x" class="w-8 h-8"></i>
                </button>
                <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-white/5 rounded-full"></div>
            </div>

            <!-- Modal Body -->
            <div class="p-12 overflow-y-auto space-y-10">
                <div class="grid md:grid-cols-2 gap-10">
                    <!-- Event Metadata -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center">
                                <i data-lucide="clock" class="w-6 h-6 text-slate-400"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Waktu Kejadian</p>
                                <p class="text-sm font-bold text-slate-800 mt-1">26 Februari 2024, 14:22:10</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-nowrap">
                                <i data-lucide="user" class="w-6 h-6 text-slate-400"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Oleh Pengguna</p>
                                <p class="text-sm font-bold text-slate-800 mt-1">dr. Andi Wijaya (ID: D-402)</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center">
                                <i data-lucide="globe" class="w-6 h-6 text-slate-400"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">IP Address</p>
                                <p class="text-sm font-bold text-slate-800 mt-1">192.168.1.42 (Local Network)</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center">
                                <i data-lucide="monitor" class="w-6 h-6 text-slate-400"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">User Agent</p>
                                <p class="text-sm font-bold text-slate-800 mt-1">Chrome 122.0.x / Windows 11</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparison View -->
                <div class="space-y-6">
                    <div>
                        <h4 class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-1">JSON Snapshot (Data Perubahan)</h4>
                        <div class="grid gap-4">
                            <div class="space-y-2">
                                <p class="text-[10px] font-bold text-red-500 uppercase ml-4 tracking-widest">[-] Data Lama</p>
                                <pre class="json-viewer !bg-red-500/10 !text-red-400">
{
  "diagnosa": "J00 - Common Cold",
  "tensi": "120/80",
  "keterangan": "Pasien mengeluh pusing"
}</pre>
                            </div>
                            <div class="space-y-2">
                                <p class="text-[10px] font-bold text-rs-light-green uppercase ml-4 tracking-widest text-nowrap">[+] Data Baru (Updated)</p>
                                <pre class="json-viewer">
{
  "diagnosa": "J00 - Common Cold",
  "tensi": "140/90",
  "keterangan": "Tensi meningkat, pusing berat"
}</pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-6 flex items-center justify-end gap-6 border-t border-slate-100">
                    <button @click="openLogDetail = false" class="px-10 py-5 bg-admin-dark text-white rounded-[2rem] text-[10px] font-black uppercase tracking-[0.3em] shadow-xl shadow-admin-dark/20 hover:scale-[1.02] active:scale-95 transition-all">Tutup Pratinjau</button>
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