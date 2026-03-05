<?php use yii\helpers\Url; ?>
<?php use yii\helpers\Html; ?>

<!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manajemen Staf | Admin SIMRS</title>
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
                @apply bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden;
            }

            .form-input {
                @apply w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-rs-orange focus:ring-4 focus:ring-rs-orange/10 outline-none transition-all text-xs font-medium;
            }
        </style>
    </head>

    <body class="p-4 md:p-8" x-data="{ openAddModal: false, selectedRole: 'Dokter' }">

        <div class="max-w-7xl mx-auto space-y-8">

            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6" data-aos="fade-down">
                <div class="space-y-1">
                    <nav class="flex items-center text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-2">
                        <span>Master Data</span>
                        <i data-lucide="chevron-right" class="w-3 h-3 mx-2"></i>
                        <span class="text-rs-orange">Manajemen Staf</span>
                    </nav>
                    <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Direktori Pegawai</h2>
                    <p class="text-xs text-slate-400 font-medium">Kelola seluruh data dokter, perawat, dan staf operasional rumah sakit.</p>
                </div>
                <!-- add link -->
                <a href="<?= \yii\helpers\Url::to(['/manage-staff/create-staff']) ?>" class="flex items-center px-6 py-3.5 bg-admin-dark text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-xl shadow-slate-200 hover:bg-rs-orange transition-all transform hover:-translate-y-1">
                    <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i>
                    Tambah Pegawai Baru
                </a>
            </div>

            <!-- Filter & Search Bar -->
            <div class="admin-card !p-6 flex flex-col lg:flex-row lg:items-center gap-4" data-aos="fade-up">
                <div class="relative flex-1">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                    <input type="text" placeholder="Cari berdasarkan nama, NIP, atau spesialisasi..." class="w-full pl-12 pr-4 py-3 bg-slate-50 border-none rounded-2xl text-xs font-medium focus:ring-2 focus:ring-rs-orange/20 outline-none">
                </div>
                <div class="flex items-center gap-3">
                    <select class="px-4 py-3 bg-slate-50 border-none rounded-2xl text-[10px] font-bold text-slate-500 uppercase tracking-widest outline-none focus:ring-2 focus:ring-rs-orange/20 cursor-pointer">
                        <option>Semua Peran</option>
                        <option>Dokter</option>
                        <option>Perawat</option>
                        <option>Kasir</option>
                        <option>Admin IT</option>
                    </select>
                    <select class="px-4 py-3 bg-slate-50 border-none rounded-2xl text-[10px] font-bold text-slate-500 uppercase tracking-widest outline-none focus:ring-2 focus:ring-rs-orange/20 cursor-pointer text-nowrap">
                        <option>Status: Aktif</option>
                        <option>Status: Non-Aktif</option>
                    </select>
                    <button class="p-3 bg-slate-100 text-slate-400 rounded-2xl hover:bg-rs-beige/30 transition-colors">
                        <i data-lucide="sliders-horizontal" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <!-- Staff Table -->
            <div class="admin-card overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Identitas Pegawai</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Peran & Unit</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Kontak</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">Status Akses</th>
                                <th class="px-8 py-5"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php foreach ($dataStaff as $staff): ?>
                                <!-- Dokter -->
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-rs-orange/10 rounded-2xl flex items-center justify-center font-black text-rs-orange shadow-inner">
                                                AW
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-slate-800"><?= $staff->nama_pegawai ?></p>
                                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">NIP: 19850320202401</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex flex-col">
                                            <span class="px-3 py-1 bg-rs-orange/10 text-rs-orange text-[9px] font-black rounded-lg uppercase w-fit mb-1.5"><?= $staff->peran->nama_peran ?></span>
                                            <span class="text-[11px] font-bold text-slate-500 uppercase tracking-tighter">Loket Poli Dalam</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="space-y-1">
                                            <p class="text-[11px] font-medium text-slate-600 flex items-center">
                                                <i data-lucide="mail" class="w-3 h-3 mr-2 text-slate-300"></i> jamelahsalim@rsusehat.id
                                            </p>
                                            <p class="text-[11px] font-medium text-slate-600 flex items-center">
                                                <i data-lucide="phone" class="w-3 h-3 mr-2 text-slate-300"></i> <?= $staff->no_hp ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        <div class="inline-flex items-center px-3 py-1 bg-green-50 text-green-600 rounded-full border border-green-100">
                                            <?php if ($staff->status_aktif == 1): ?>
                                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>
                                                <span class="text-[9px] font-black uppercase tracking-widest">Aktif</span>
                                            <?php else: ?>
                                                <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-2"></span>
                                                <span class="text-[9px] font-black uppercase tracking-widest text-red-600">Non-Aktif</span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all">
                                            <a href="<?= Url::to(['/manage-staff/update-staff', 'id' => $staff->id_pegawai]) ?>" class="p-2.5 rounded-xl bg-white border border-slate-100 text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all shadow-sm">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>
                                            <?= Html::a(
                                            '<i data-lucide="trash-2" class="w-4 h-4"></i>',
                                            ['/manage-staff/delete-staff', 'id' => $staff->id_pegawai],
                                            [
                                                'class' => 'p-2.5 rounded-xl bg-white border border-slate-100 text-slate-400 hover:text-red-500 hover:border-red-200 transition-all shadow-sm',
                                                'data' => [
                                                    'method' => 'post',
                                                    'confirm' => 'Apakah Anda yakin ingin menghapus data pegawai ini?',
                                                ],
                                            ]
                                        ) ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-8 py-6 bg-slate-50/30 border-t border-slate-50 flex items-center justify-between">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Menampilkan 2 dari 48 Pegawai</p>
                    <div class="flex items-center gap-2">
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:border-rs-orange transition-all"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-rs-orange text-white font-bold text-[10px]">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:border-rs-orange transition-all"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Pegawai -->
        <div x-show="openAddModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm"
            x-cloak>
            <div @click.away="openAddModal = false" class="bg-white rounded-[2.5rem] shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
                <div class="bg-admin-dark p-8 text-white flex items-center justify-between shrink-0">
                    <div>
                        <h3 class="text-xl font-extrabold uppercase tracking-tight">Tambah Pegawai</h3>
                        <p class="text-[10px] text-rs-orange font-bold uppercase tracking-[0.2em] mt-1">Registrasi SDM & Hak Akses</p>
                    </div>
                    <button @click="openAddModal = false" class="p-2 hover:bg-white/10 rounded-full transition-colors">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                </div>
                <div class="p-8 overflow-y-auto space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Lengkap & Gelar</label>
                            <input type="text" class="form-input" placeholder="Contoh: dr. Nama Pegawai, Sp.A">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">NIP / ID Pegawai</label>
                            <input type="text" class="form-input" placeholder="Masukkan nomor identitas...">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Peran Utama (Role)</label>
                            <select x-model="selectedRole" class="form-input cursor-pointer">
                                <option value="Dokter">Dokter</option>
                                <option value="Perawat">Perawat</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Admin IT">Admin IT</option>
                            </select>
                        </div>

                        <!-- Dinamis jika Dokter -->
                        <template x-if="selectedRole === 'Dokter'">
                            <div class="md:col-span-2 grid md:grid-cols-2 gap-6 p-6 bg-rs-beige/20 rounded-3xl border border-rs-beige/30">
                                <div>
                                    <label class="block text-[10px] font-black text-rs-deep-green uppercase tracking-widest mb-2 ml-1">Spesialisasi</label>
                                    <input type="text" class="form-input !bg-white" placeholder="Contoh: Penyakit Dalam">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-rs-deep-green uppercase tracking-widest mb-2 ml-1">Nomor STR</label>
                                    <input type="text" class="form-input !bg-white" placeholder="Masukkan No. STR...">
                                </div>
                            </div>
                        </template>

                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Email Resmi</label>
                            <input type="email" class="form-input" placeholder="username@rsusehat.id">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nomor WhatsApp</label>
                            <input type="text" class="form-input" placeholder="0812xxxx">
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" class="w-4 h-4 text-rs-orange border-slate-200 rounded focus:ring-rs-orange/20">
                            <span class="text-[11px] font-bold text-slate-500">Kirim detail login ke email pegawai</span>
                        </div>
                        <div class="flex gap-3">
                            <button @click="openAddModal = false" class="px-6 py-3 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Batal</button>
                            <button class="px-8 py-3 bg-rs-orange text-white rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-rs-orange/20 hover:bg-opacity-90 transition-all">Simpan Pegawai</button>
                        </div>
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