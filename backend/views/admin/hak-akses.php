<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hak Akses RBAC | Admin SIMRS</title>
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
        .permission-badge { @apply px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-wider border; }
    </style>
</head>
<body class="p-4 md:p-10" x-data="{ openUserModal: false, editMode: false, selectedRole: 'Perawat' }">

    <div class="max-w-7xl mx-auto space-y-10">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-down">
            <div class="space-y-2">
                <nav class="flex items-center text-[11px] font-black text-slate-400 uppercase tracking-[0.25em] mb-3">
                    <span>Keamanan & Kepegawaian</span>
                    <i data-lucide="chevron-right" class="w-3.5 h-3.5 mx-3"></i>
                    <span class="text-rs-orange">Hak Akses RBAC</span>
                </nav>
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter">Otorisasi Pengguna</h2>
                <p class="text-base text-slate-400 font-medium">Konfigurasi akun login, pembagian peran (Role), dan izin akses modul.</p>
            </div>
            <button @click="openUserModal = true; editMode = false" class="flex items-center px-10 py-5 bg-admin-dark text-white rounded-[2rem] text-xs font-black uppercase tracking-[0.3em] shadow-[0_20px_50px_-10px_rgba(30,41,59,0.3)] hover:bg-rs-orange hover:shadow-rs-orange/30 transition-all transform hover:-translate-y-1 active:scale-95">
                <i data-lucide="key-round" class="w-5 h-5 mr-3"></i>
                Buat Akses Baru
            </button>
        </div>

        <!-- Security Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6" data-aos="fade-up">
            <div class="admin-card !p-6 flex items-center justify-between group">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Akun</p>
                    <h3 class="text-2xl font-black text-slate-800 tracking-tighter">48 User</h3>
                </div>
                <div class="w-12 h-12 bg-rs-orange/10 text-rs-orange rounded-2xl flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="admin-card !p-6 flex items-center justify-between group">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Sedang Login</p>
                    <h3 class="text-2xl font-black text-rs-light-green tracking-tighter">12 Sesi</h3>
                </div>
                <div class="w-12 h-12 bg-rs-light-green/10 text-rs-light-green rounded-2xl flex items-center justify-center">
                    <i data-lucide="activity" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="admin-card !p-6 flex items-center justify-between group border-l-8 border-l-red-500">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Terblokir</p>
                    <h3 class="text-2xl font-black text-red-500 tracking-tighter">0 User</h3>
                </div>
                <div class="w-12 h-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center">
                    <i data-lucide="lock" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="admin-card !p-6 flex items-center justify-between group">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Definisi Role</p>
                    <h3 class="text-2xl font-black text-slate-800 tracking-tighter">4 Peran</h3>
                </div>
                <div class="w-12 h-12 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center">
                    <i data-lucide="layers" class="w-6 h-6"></i>
                </div>
            </div>
        </div>

        <!-- User Access Table -->
        <div class="admin-card overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="p-8 border-b border-slate-50 flex flex-col lg:flex-row lg:items-center justify-between gap-6 bg-slate-50/30 text-nowrap">
                <div class="relative flex-1 max-w-xl">
                    <i data-lucide="search" class="absolute left-6 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                    <input type="text" placeholder="Cari nama atau username..." class="w-full pl-16 pr-8 py-4 bg-white border-2 border-slate-100 rounded-[1.5rem] text-sm font-bold focus:ring-4 focus:ring-rs-orange/10 outline-none transition-all">
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-4 bg-white border-2 border-slate-100 text-slate-400 rounded-2xl hover:border-rs-orange hover:text-rs-orange transition-all">
                        <i data-lucide="sliders-horizontal" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Pengguna</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Peran (Role)</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Hak Akses Modul</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em] text-center text-nowrap">Terakhir Login</th>
                            <th class="px-10 py-6"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <!-- User 1 -->
                        <tr class="hover:bg-slate-50/80 transition-all group">
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-6">
                                    <div class="w-14 h-14 bg-rs-orange rounded-2xl flex items-center justify-center font-black text-white text-lg shadow-lg shadow-rs-orange/20">
                                        AW
                                    </div>
                                    <div>
                                        <p class="text-base font-black text-slate-800 tracking-tight">dr. Andi Wijaya</p>
                                        <p class="text-[10px] text-rs-orange font-black tracking-widest mt-1 uppercase">User: andi.wijaya</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <span class="px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-rs-orange/10 text-rs-orange border border-rs-orange/20">Dokter</span>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex flex-wrap gap-2 max-w-[250px]">
                                    <span class="permission-badge bg-rs-light-green/10 text-rs-light-green border-rs-light-green/20">EMR Poli</span>
                                    <span class="permission-badge bg-rs-light-green/10 text-rs-light-green border-rs-light-green/20">Resep Obat</span>
                                    <span class="permission-badge bg-slate-100 text-slate-400 border-slate-200">Billing (Locked)</span>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-center">
                                <p class="text-xs font-bold text-slate-500">26 Feb 2024</p>
                                <p class="text-[10px] text-slate-400 font-medium">14:20 WIB</p>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all">
                                    <button @click="openUserModal = true; editMode = true" class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </button>
                                    <button class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-red-500 hover:border-red-200 transition-all">
                                        <i data-lucide="shield-off" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- User 2 -->
                        <tr class="hover:bg-slate-50/80 transition-all group">
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-6">
                                    <div class="w-14 h-14 bg-rs-deep-green rounded-2xl flex items-center justify-center font-black text-white text-lg shadow-lg shadow-rs-deep-green/20">
                                        LN
                                    </div>
                                    <div>
                                        <p class="text-base font-black text-slate-800 tracking-tight">Leonza Norisevick</p>
                                        <p class="text-[10px] text-rs-deep-green font-black tracking-widest mt-1 uppercase">User: leonza_nurse</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <span class="px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-rs-deep-green/10 text-rs-deep-green border border-rs-deep-green/20">Perawat</span>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex flex-wrap gap-2 max-w-[250px]">
                                    <span class="permission-badge bg-rs-light-green/10 text-rs-light-green border-rs-light-green/20">Registrasi Pasien</span>
                                    <span class="permission-badge bg-rs-light-green/10 text-rs-light-green border-rs-light-green/20">Manajemen Antrean</span>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-center">
                                <p class="text-xs font-bold text-slate-500">26 Feb 2024</p>
                                <p class="text-[10px] text-slate-400 font-medium">11:05 WIB</p>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all">
                                    <button class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </button>
                                    <button class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-red-500 hover:border-red-200 transition-all">
                                        <i data-lucide="shield-off" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: User & RBAC Editor -->
    <div x-show="openUserModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="fixed inset-0 z-50 flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-md"
         x-cloak>
        <div @click.away="openUserModal = false" class="bg-white rounded-[4rem] shadow-2xl w-full max-w-3xl overflow-hidden flex flex-col max-h-[90vh]">
            <!-- Header Modal -->
            <div class="bg-admin-dark p-12 text-white flex items-center justify-between shrink-0 relative overflow-hidden text-nowrap">
                <div class="relative z-10">
                    <h3 class="text-3xl font-black uppercase tracking-tight" x-text="editMode ? 'Edit Akses User' : 'Buat Akun Pengguna'"></h3>
                    <p class="text-[11px] text-rs-orange font-bold uppercase tracking-[0.3em] mt-3">Keamanan & Kontrol RBAC</p>
                </div>
                <button @click="openUserModal = false" class="p-4 hover:bg-white/10 rounded-full transition-colors relative z-10">
                    <i data-lucide="x" class="w-8 h-8"></i>
                </button>
                <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-white/5 rounded-full"></div>
            </div>

            <!-- Modal Body -->
            <div class="p-12 overflow-y-auto space-y-10">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Link ke Data Pegawai -->
                    <div class="md:col-span-2">
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Pilih Pegawai (Master Data)</label>
                        <select class="form-input cursor-pointer appearance-none">
                            <option value="">-- Pilih Pegawai --</option>
                            <option value="1">dr. Andi Wijaya - Dokter</option>
                            <option value="2">Leonza Norisevick - Perawat</option>
                        </select>
                    </div>

                    <!-- Kredensial -->
                    <div>
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Username</label>
                        <input type="text" class="form-input" placeholder="contoh: andi.wijaya">
                    </div>
                    <div>
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Password</label>
                        <input type="password" class="form-input" placeholder="••••••••">
                    </div>

                    <!-- Peran / Role -->
                    <div class="md:col-span-2">
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Tentukan Peran (Role)</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <button @click="selectedRole = 'Admin'" :class="selectedRole === 'Admin' ? 'border-rs-orange bg-rs-orange/5 text-rs-orange' : 'border-slate-100 bg-slate-50 text-slate-400'" class="p-5 border-2 rounded-3xl text-[10px] font-black uppercase tracking-widest transition-all">Admin IT</button>
                            <button @click="selectedRole = 'Dokter'" :class="selectedRole === 'Dokter' ? 'border-rs-orange bg-rs-orange/5 text-rs-orange' : 'border-slate-100 bg-slate-50 text-slate-400'" class="p-5 border-2 rounded-3xl text-[10px] font-black uppercase tracking-widest transition-all text-nowrap">Dokter / EMR</button>
                            <button @click="selectedRole = 'Perawat'" :class="selectedRole === 'Perawat' ? 'border-rs-orange bg-rs-orange/5 text-rs-orange' : 'border-slate-100 bg-slate-50 text-slate-400'" class="p-5 border-2 rounded-3xl text-[10px] font-black uppercase tracking-widest transition-all text-nowrap">Perawat / Admisi</button>
                            <button @click="selectedRole = 'Kasir'" :class="selectedRole === 'Kasir' ? 'border-rs-orange bg-rs-orange/5 text-rs-orange' : 'border-slate-100 bg-slate-50 text-slate-400'" class="p-5 border-2 rounded-3xl text-[10px] font-black uppercase tracking-widest transition-all">Kasir / Billing</button>
                        </div>
                    </div>

                    <!-- Modul Permissions -->
                    <div class="md:col-span-2">
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Izin Akses Modul Khusus</label>
                        <div class="p-8 bg-slate-50 rounded-[2.5rem] border border-slate-100 grid md:grid-cols-2 gap-6">
                            <label class="flex items-center space-x-4 cursor-pointer group">
                                <input type="checkbox" checked class="w-6 h-6 rounded-lg border-2 border-slate-200 text-rs-orange focus:ring-rs-orange/20 transition-all">
                                <div>
                                    <p class="text-xs font-bold text-slate-700">Modul Registrasi Pasien</p>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Akses Baca & Tulis</p>
                                </div>
                            </label>
                            <label class="flex items-center space-x-4 cursor-pointer group">
                                <input type="checkbox" checked class="w-6 h-6 rounded-lg border-2 border-slate-200 text-rs-orange focus:ring-rs-orange/20 transition-all">
                                <div>
                                    <p class="text-xs font-bold text-slate-700">Manajemen Antrean Poli</p>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Akses Baca & Tulis</p>
                                </div>
                            </label>
                            <label class="flex items-center space-x-4 cursor-pointer group">
                                <input type="checkbox" class="w-6 h-6 rounded-lg border-2 border-slate-200 text-rs-orange focus:ring-rs-orange/20 transition-all">
                                <div>
                                    <p class="text-xs font-bold text-slate-700">Billing & Kasir</p>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Izin Ditolak</p>
                                </div>
                            </label>
                            <label class="flex items-center space-x-4 cursor-pointer group">
                                <input type="checkbox" class="w-6 h-6 rounded-lg border-2 border-slate-200 text-rs-orange focus:ring-rs-orange/20 transition-all">
                                <div>
                                    <p class="text-xs font-bold text-slate-700">Laporan Keuangan</p>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Izin Ditolak</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pt-10 border-t border-slate-100 flex items-center justify-end gap-6">
                    <button @click="openUserModal = false" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] hover:text-slate-600 transition-colors">Batal</button>
                    <button class="px-12 py-5 bg-rs-orange text-white rounded-[2rem] text-xs font-black uppercase tracking-[0.3em] shadow-xl shadow-rs-orange/20 hover:scale-[1.02] active:scale-95 transition-all">Simpan Hak Akses</button>
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