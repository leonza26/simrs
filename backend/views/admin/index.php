<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Analitik | Admin SIMRS</title>
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
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .admin-card { @apply bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden p-8; }
    </style>
</head>
<body class="p-4 md:p-8" x-data="{ activeTab: 'visits' }">

    <div class="max-w-7xl mx-auto space-y-8">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6" data-aos="fade-down">
            <div class="space-y-1">
                <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Dashboard Analitik System</h2>
                <p class="text-xs text-slate-400 font-bold uppercase tracking-[0.2em]">Monitoring Infrastruktur & Operasional</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="px-4 py-2 bg-white border border-slate-200 rounded-xl flex items-center shadow-sm">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-[10px] font-bold text-slate-500 uppercase">Server: Pekanbaru-Node-01</span>
                </div>
                <button class="p-2.5 bg-admin-dark text-white rounded-xl hover:bg-rs-orange transition-all shadow-lg shadow-slate-200">
                    <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

        <!-- KPI Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Metric 1 -->
            <div class="admin-card !p-6 flex items-center justify-between group hover:border-rs-orange transition-all" data-aos="fade-up" data-aos-delay="100">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kunjungan Hari Ini</p>
                    <h3 class="text-3xl font-black text-slate-800">128</h3>
                    <p class="text-[10px] font-bold text-green-500 flex items-center">
                        <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i> +14.2% dari kemarin
                    </p>
                </div>
                <div class="w-14 h-14 bg-rs-orange/10 text-rs-orange rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
            </div>
            <!-- Metric 2 -->
            <div class="admin-card !p-6 flex items-center justify-between group hover:border-rs-deep-green transition-all" data-aos="fade-up" data-aos-delay="200">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Revenue (IDR)</p>
                    <h3 class="text-3xl font-black text-slate-800">4.2M</h3>
                    <p class="text-[10px] font-bold text-rs-orange flex items-center">
                        <i data-lucide="activity" class="w-3 h-3 mr-1"></i> Target tercapai 85%
                    </p>
                </div>
                <div class="w-14 h-14 bg-rs-deep-green/10 text-rs-deep-green rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i data-lucide="wallet" class="w-6 h-6"></i>
                </div>
            </div>
            <!-- Metric 3 -->
            <div class="admin-card !p-6 flex items-center justify-between group hover:border-rs-light-green transition-all" data-aos="fade-up" data-aos-delay="300">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">System Health</p>
                    <h3 class="text-3xl font-black text-slate-800">99.8%</h3>
                    <p class="text-[10px] font-bold text-rs-light-green flex items-center">
                        <i data-lucide="shield-check" class="w-3 h-3 mr-1"></i> Uptime optimal
                    </p>
                </div>
                <div class="w-14 h-14 bg-rs-light-green/10 text-rs-light-green rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i data-lucide="server" class="w-6 h-6"></i>
                </div>
            </div>
            <!-- Metric 4 -->
            <div class="admin-card !p-6 flex items-center justify-between group hover:border-slate-400 transition-all" data-aos="fade-up" data-aos-delay="400">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Security Log</p>
                    <h3 class="text-3xl font-black text-slate-800">2.4k</h3>
                    <p class="text-[10px] font-bold text-slate-400 flex items-center">
                        <i data-lucide="eye" class="w-3 h-3 mr-1"></i> 0 ancaman terdeteksi
                    </p>
                </div>
                <div class="w-14 h-14 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i data-lucide="lock" class="w-6 h-6"></i>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Visit & Revenue Chart -->
            <div class="lg:col-span-2 admin-card" data-aos="fade-right">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">Tren Kunjungan Pasien</h4>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Laporan Mingguan</p>
                    </div>
                    <div class="flex gap-2">
                        <button @click="activeTab = 'visits'" :class="activeTab === 'visits' ? 'bg-rs-orange text-white' : 'bg-slate-50 text-slate-400'" class="px-4 py-1.5 rounded-lg text-[10px] font-bold uppercase transition-all">Visits</button>
                        <button @click="activeTab = 'revenue'" :class="activeTab === 'revenue' ? 'bg-rs-orange text-white' : 'bg-slate-50 text-slate-400'" class="px-4 py-1.5 rounded-lg text-[10px] font-bold uppercase transition-all">Revenue</button>
                    </div>
                </div>
                <div class="h-[300px] w-full relative">
                    <canvas id="mainChart"></canvas>
                </div>
            </div>

            <!-- Unit Distribution -->
            <div class="admin-card" data-aos="fade-left">
                <h4 class="text-sm font-bold text-slate-800 mb-2">Okupansi Poliklinik</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-8 text-nowrap">Distribusi Pasien Per Unit</p>
                <div class="h-[250px] w-full relative mb-8">
                    <canvas id="unitChart"></canvas>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-[10px] font-bold uppercase tracking-tighter">
                        <span class="text-slate-500">Poli Umum</span>
                        <span class="text-rs-deep-green">45%</span>
                    </div>
                    <div class="w-full bg-slate-50 h-1.5 rounded-full">
                        <div class="bg-rs-deep-green h-full rounded-full" style="width: 45%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section: Audit Trail & Active Users -->
        <div class="grid lg:grid-cols-3 gap-8 pb-12">
            <!-- Audit Trail Snippet -->
            <div class="lg:col-span-2 admin-card !p-0" data-aos="fade-up">
                <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">Audit Trail (Security Log)</h4>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Aktifitas Sistem Terkini</p>
                    </div>
                    <button class="text-[10px] font-bold text-rs-orange hover:underline uppercase tracking-widest">Lihat Semua Log</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-8 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Timestamp</th>
                                <th class="px-8 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">User</th>
                                <th class="px-8 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-nowrap">Aksi / Event</th>
                                <th class="px-8 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Modul</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-8 py-4 text-[11px] font-medium text-slate-400">26 Feb, 14:22:10</td>
                                <td class="px-8 py-4 font-bold text-slate-700 text-xs text-nowrap text-nowrap">dr. Andi Wijaya</td>
                                <td class="px-8 py-4 text-[11px] font-medium text-slate-500">
                                    <span class="px-2 py-0.5 rounded-md bg-rs-light-green/10 text-rs-light-green font-bold">UPDATE</span> 
                                    Update SOAP Pasien RM:00-12-45
                                </td>
                                <td class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-tighter">EMR Engine</td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-8 py-4 text-[11px] font-medium text-slate-400">26 Feb, 14:15:05</td>
                                <td class="px-8 py-4 font-bold text-slate-700 text-xs">Leonza (Admisi)</td>
                                <td class="px-8 py-4 text-[11px] font-medium text-slate-500">
                                    <span class="px-2 py-0.5 rounded-md bg-rs-orange/10 text-rs-orange font-bold">CREATE</span> 
                                    Registrasi Pasien Baru NIK:3501...
                                </td>
                                <td class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-tighter">Front Office</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- System Resource Status -->
            <div class="admin-card bg-admin-dark text-white shadow-xl shadow-admin-dark/20 border-none" data-aos="fade-up" data-aos-delay="200">
                <h4 class="text-xs font-bold uppercase tracking-widest text-rs-orange mb-6">Server Status</h4>
                <div class="space-y-8">
                    <!-- CPU -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] font-bold text-white/50 uppercase">CPU Usage</span>
                            <span class="text-xs font-black">24%</span>
                        </div>
                        <div class="w-full bg-white/5 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-rs-light-green h-full rounded-full" style="width: 24%"></div>
                        </div>
                    </div>
                    <!-- RAM -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-nowrap">
                            <span class="text-[10px] font-bold text-white/50 uppercase">RAM (8GB Used)</span>
                            <span class="text-xs font-black text-nowrap">62%</span>
                        </div>
                        <div class="w-full bg-white/5 h-1.5 rounded-full overflow-hidden text-nowrap">
                            <div class="bg-rs-orange h-full rounded-full" style="width: 62%"></div>
                        </div>
                    </div>
                    <!-- Storage -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] font-bold text-white/50 uppercase">DB Storage (PostgreSQL)</span>
                            <span class="text-xs font-black">12.5GB</span>
                        </div>
                        <div class="w-full bg-white/5 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-rs-beige h-full rounded-full" style="width: 40%"></div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/5">
                        <button class="w-full py-4 bg-white/10 rounded-2xl text-[10px] font-bold uppercase tracking-widest hover:bg-white hover:text-admin-dark transition-all">
                            Maintenance Mode
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts for Charts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        lucide.createIcons();

        // Main Visit Chart
        const ctxMain = document.getElementById('mainChart').getContext('2d');
        new Chart(ctxMain, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Kunjungan Pasien',
                    data: [65, 59, 80, 81, 56, 40, 30],
                    borderColor: '#E67E22',
                    backgroundColor: 'rgba(230, 126, 34, 0.1)',
                    borderWidth: 4,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 0,
                    pointHoverRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { display: false },
                    x: { grid: { display: false }, ticks: { font: { size: 10, weight: 'bold' }, color: '#94a3b8' } }
                }
            }
        });

        // Unit Distribution Chart
        const ctxUnit = document.getElementById('unitChart').getContext('2d');
        new Chart(ctxUnit, {
            type: 'doughnut',
            data: {
                labels: ['Umum', 'Gigi', 'Kandungan', 'Lainnya'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: ['#628141', '#E67E22', '#8BAE66', '#EBD5AB'],
                    borderWidth: 0,
                    cutout: '75%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });
    </script>
</body>
</html>