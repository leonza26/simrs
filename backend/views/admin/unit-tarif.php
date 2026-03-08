<style>
    .admin-card { @apply bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden; }
    .form-input { @apply w-full px-6 py-4 rounded-2xl border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-rs-orange focus:ring-8 focus:ring-rs-orange/5 outline-none transition-all text-sm font-bold text-slate-800 placeholder:text-slate-300; }
</style>

<div x-data="{ openUnitModal: false, editMode: false }">
    <div class="max-w-7xl mx-auto space-y-10">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-down">
            <div class="space-y-2">
                <nav class="flex items-center text-[11px] font-black text-slate-400 uppercase tracking-[0.25em] mb-3">
                    <span>Master Data</span>
                    <i data-lucide="chevron-right" class="w-3.5 h-3.5 mx-3"></i>
                    <span class="text-rs-orange">Unit & Tarif</span>
                </nav>
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter">Konfigurasi Layanan</h2>
                <p class="text-base text-slate-400 font-medium">Atur poliklinik, spesialisasi, dan standarisasi tarif pendaftaran.</p>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/unit-tarif/create-unit']) ?>" class="flex items-center px-10 py-5 bg-admin-dark text-white rounded-[2rem] text-xs font-black uppercase tracking-[0.3em] shadow-[0_20px_50px_-10px_rgba(30,41,59,0.3)] hover:bg-rs-orange hover:shadow-rs-orange/30 transition-all transform hover:-translate-y-1 active:scale-95">
                <i data-lucide="layout-grid" class="w-5 h-5 mr-3"></i>
                Tambah Unit Baru
            </a>
        </div>

        <!-- Stats Grid (Contextual) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up">
            <div class="admin-card !p-8 flex items-center justify-between group">
                <div>
                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Total Poliklinik</p>
                    <h3 class="text-4xl font-black text-slate-800 tracking-tighter"><?= $countUnit ?> Unit</h3>
                </div>
                <div class="w-16 h-16 bg-rs-orange/10 text-rs-orange rounded-3xl flex items-center justify-center">
                    <i data-lucide="building-2" class="w-8 h-8"></i>
                </div>
            </div>
            <div class="admin-card !p-8 flex items-center justify-between group border-l-8 border-l-rs-light-green">
                <div>
                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Rata-rata Tarif</p>
                    <h3 class="text-4xl font-black text-slate-800 tracking-tighter">Rp 85rb</h3>
                </div>
                <div class="w-16 h-16 bg-rs-light-green/10 text-rs-light-green rounded-3xl flex items-center justify-center">
                    <i data-lucide="tag" class="w-8 h-8"></i>
                </div>
            </div>
            <div class="admin-card !p-8 flex items-center justify-between group">
                <div>
                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Unit Terpadat</p>
                    <h3 class="text-3xl font-black text-rs-deep-green tracking-tighter uppercase">Poli Umum</h3>
                </div>
                <div class="w-16 h-16 bg-rs-deep-green/10 text-rs-deep-green rounded-3xl flex items-center justify-center">
                    <i data-lucide="bar-chart-3" class="w-8 h-8"></i>
                </div>
            </div>
        </div>

        <!-- Unit List Table -->
        <div class="admin-card overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <!-- Table Action Bar -->
            <div class="p-10 border-b border-slate-50 flex flex-col lg:flex-row lg:items-center justify-between gap-6 bg-slate-50/30">
                <form method="GET" action="">
                    <div class="relative flex-1 max-w-xl">
                        <i data-lucide="search" class="absolute left-6 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                        <input type="text" name="search" value="<?= Yii::$app->request->get('search') ?>" placeholder="Cari nama unit atau spesialisasi..." class="w-full pl-16 pr-8 py-4 bg-white border-2 border-slate-100 rounded-[1.5rem] text-sm font-bold focus:ring-4 focus:ring-rs-orange/10 outline-none transition-all">
                    </div>
                </form>
                <div class="flex items-center gap-4">
                    <button class="flex items-center px-6 py-4 bg-white border-2 border-slate-100 rounded-2xl text-[11px] font-black uppercase tracking-widest text-slate-500 hover:border-rs-orange hover:text-rs-orange transition-all">
                        <i data-lucide="download-cloud" class="w-4 h-4 mr-2"></i> Ekspor PDF
                    </button>
                    <button class="p-4 bg-rs-orange text-white rounded-2xl shadow-lg shadow-rs-orange/20 hover:rotate-180 transition-all duration-500">
                        <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Kode & Unit Layanan</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Kategori Spesialis</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">Tarif Pendaftaran</th>
                            <th class="px-10 py-6 text-[12px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">Status</th>
                            <th class="px-10 py-6"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <!-- Unit 1 -->
                         <?php
                         use yii\helpers\Url;
                            use yii\helpers\Html;
                          foreach ($unitTarif as $unit): ?>
                        <tr class="hover:bg-slate-50/80 transition-all group">
                            <td class="px-10 py-8">
                                <div class="flex items-center space-x-6">
                                    <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center font-black text-slate-400 text-lg group-hover:bg-rs-orange group-hover:text-white transition-all">
                                        UM
                                    </div>
                                    <div>
                                        <p class="text-base font-black text-slate-800 tracking-tight uppercase"><?= $unit->nama_unit ?></p>
                                        <p class="text-xs text-slate-400 font-bold tracking-widest mt-1">ID: <?= $unit->kode_unit ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-rs-deep-green tracking-tight"><?= $unit->spesialisasi->nama_spesialisasi ?></span>
                                </div>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex flex-col">
                                    <span class="text-lg font-black text-slate-800 tracking-tighter italic">Rp. <?= number_format($unit->tarif_dasar, 0, ',', '.') ?></span>
                                    <span class="text-[9px] text-slate-400 font-black uppercase tracking-widest mt-1">Biaya Administrasi</span>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-center">
                                <?php if ($unit->status_aktif == 1): ?>
                                <span class="px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-rs-light-green/10 text-rs-light-green border border-rs-light-green/20">Aktif</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all">
                                    <a href="<?= Url::to(['/unit-tarif/update-unit', 'id' => $unit->id_unit]) ?>" class="p-3.5 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all shadow-sm">
                                        <i data-lucide="edit-2" class="w-5 h-5"></i>
                                    </a>
                                     <?= Html::a(
                                            '<i data-lucide="trash-2" class="w-4 h-4"></i>',
                                            ['/unit-tarif/delete-unit', 'id' => $unit->id_unit],
                                            [
                                                'class' => 'p-2.5 rounded-xl bg-white border border-slate-100 text-slate-400 hover:text-red-500 hover:border-red-200 transition-all shadow-sm',
                                                'data' => [
                                                    'method' => 'post',
                                                    'confirm' => 'Apakah Anda yakin ingin menghapus data unit tarif ini?',
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
            <div class="px-10 py-8 bg-slate-50/30 border-t border-slate-100 flex items-center justify-between">
                <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Menampilkan 2 dari 12 Unit Layanan</p>
                <div class="flex items-center gap-3">
                    <button class="px-5 py-3 rounded-xl bg-white border-2 border-slate-100 text-slate-400 hover:border-rs-orange hover:text-rs-orange transition-all text-[11px] font-black uppercase tracking-widest">Sebelumnya</button>
                    <button class="px-5 py-3 rounded-xl bg-rs-orange text-white text-[11px] font-black shadow-lg shadow-rs-orange/20">1</button>
                    <button class="px-5 py-3 rounded-xl bg-white border-2 border-slate-100 text-slate-400 hover:border-rs-orange hover:text-rs-orange transition-all text-[11px] font-black uppercase tracking-widest">Berikutnya</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Unit Editor -->
    <template x-teleport="body">
    <div x-show="openUnitModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="fixed inset-0 z-50 flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-md"
         x-cloak>
        <div @click.away="openUnitModal = false" class="bg-white rounded-[4rem] shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
            <!-- Modal Header -->
            <div class="bg-admin-dark p-12 text-white flex items-center justify-between shrink-0 relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-3xl font-black uppercase tracking-tight" x-text="editMode ? 'Edit Unit Layanan' : 'Tambah Unit Baru'"></h3>
                    <p class="text-[11px] text-rs-orange font-bold uppercase tracking-[0.3em] mt-3">Konfigurasi Poliklinik & Tarif</p>
                </div>
                <button @click="openUnitModal = false" class="p-4 hover:bg-white/10 rounded-full transition-colors relative z-10">
                    <i data-lucide="x" class="w-8 h-8"></i>
                </button>
                <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-white/5 rounded-full"></div>
            </div>

            <!-- Modal Body -->
            <div class="p-12 overflow-y-auto space-y-10">
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="md:col-span-2">
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Nama Poliklinik / Unit</label>
                        <input type="text" class="form-input" placeholder="Contoh: Poli Mata, Poli Gigi, IGD...">
                    </div>
                    <div>
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Kategori Spesialis</label>
                        <select class="form-input cursor-pointer appearance-none">
                            <option value="">Pilih Spesialisasi</option>
                            <option value="1">Umum</option>
                            <option value="2">Anak (Sp.A)</option>
                            <option value="3">Penyakit Dalam (Sp.PD)</option>
                            <option value="4">Bedah (Sp.B)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Tarif Pendaftaran (Rp)</label>
                        <input type="number" class="form-input" placeholder="Rp 0">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-[12px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-2">Status Operasional</label>
                        <div class="flex gap-6">
                            <label class="flex-1 p-6 border-2 border-slate-100 rounded-3xl flex items-center justify-between cursor-pointer hover:border-rs-light-green transition-all group has-[:checked]:border-rs-light-green has-[:checked]:bg-rs-light-green/5">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-rs-light-green/10 rounded-xl flex items-center justify-center mr-4">
                                        <i data-lucide="check-circle" class="w-6 h-6 text-rs-light-green"></i>
                                    </div>
                                    <span class="text-sm font-black text-slate-800 uppercase tracking-tight">Aktif</span>
                                </div>
                                <input type="radio" name="status_unit" class="w-6 h-6 accent-rs-light-green" checked>
                            </label>
                            <label class="flex-1 p-6 border-2 border-slate-100 rounded-3xl flex items-center justify-between cursor-pointer hover:border-red-500 transition-all group has-[:checked]:border-red-500 has-[:checked]:bg-red-50">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center mr-4">
                                        <i data-lucide="x-circle" class="w-6 h-6 text-red-500"></i>
                                    </div>
                                    <span class="text-sm font-black text-slate-800 uppercase tracking-tight">Non-Aktif</span>
                                </div>
                                <input type="radio" name="status_unit" class="w-6 h-6 accent-red-500">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pt-10 border-t border-slate-100 flex items-center justify-end gap-6">
                    <button @click="openUnitModal = false" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] hover:text-slate-600 transition-colors">Batal</button>
                    <button class="px-12 py-5 bg-rs-orange text-white rounded-[2rem] text-xs font-black uppercase tracking-[0.3em] shadow-xl shadow-rs-orange/20 hover:scale-[1.02] active:scale-95 transition-all">Simpan Konfigurasi</button>
                </div>
            </div>
        </div>
    </div>
    </template>

</div>