<div class="max-w-5xl mx-auto space-y-6">
        
        <!-- Header Pasien -->
        <div class="bg-white p-6 rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6" data-aos="fade-down">
            <div class="flex items-center space-x-5">
                <div class="w-16 h-16 bg-rs-beige/30 rounded-3xl flex items-center justify-center text-rs-deep-green">
                    <i data-lucide="user" class="w-8 h-8"></i>
                </div>
                <div>
                    <div class="flex items-center gap-3">
                        <h2 class="text-xl font-black text-gray-800 tracking-tight">Budi Santoso</h2>
                        <span class="px-3 py-1 bg-rs-orange/10 text-rs-orange text-[10px] font-black rounded-lg uppercase">RM: 00-12-45</span>
                    </div>
                    <p class="text-xs text-gray-400 font-medium mt-1">Laki-laki • 34 Tahun • Umum • Poli Dalam</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button class="p-3 bg-gray-50 text-gray-400 rounded-2xl hover:bg-rs-beige/20 hover:text-rs-deep-green transition-all">
                    <i data-lucide="history" class="w-5 h-5"></i>
                </button>
                <div class="h-10 w-[1px] bg-gray-100"></div>
                <button class="px-6 py-3 bg-rs-deep-green text-white rounded-2xl text-xs font-bold shadow-lg shadow-rs-deep-green/20 hover:scale-105 transition-all uppercase tracking-widest">
                    Simpan Pemeriksaan
                </button>
            </div>
        </div>

        <!-- Form SOAP -->
        <div class="grid lg:grid-cols-3 gap-6">
            
            <!-- S & O (Left Column) -->
            <div class="lg:col-span-2 space-y-6" data-aos="fade-right">
                
                <!-- S: SUBJECTIVE -->
                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-rs-orange text-white rounded-xl flex items-center justify-center font-black text-xs">S</div>
                        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-widest">Subjective (Anamnesa)</h3>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="soap-label">Keluhan Utama</label>
                            <textarea class="soap-input h-24 resize-none" placeholder="Masukkan keluhan pasien..."></textarea>
                        </div>
                        <div>
                            <label class="soap-label">Riwayat Penyakit Sekarang</label>
                            <textarea class="soap-input h-24 resize-none" placeholder="Jelaskan kronologi keluhan..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- O: OBJECTIVE -->
                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-rs-light-green text-white rounded-xl flex items-center justify-center font-black text-xs">O</div>
                        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-widest">Objective (Fisik)</h3>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div>
                            <label class="soap-label">TD (mmHg)</label>
                            <input type="text" class="soap-input" placeholder="120/80">
                        </div>
                        <div>
                            <label class="soap-label">Suhu (°C)</label>
                            <input type="text" class="soap-input" placeholder="36.5">
                        </div>
                        <div>
                            <label class="soap-label">Nadi (/mnt)</label>
                            <input type="text" class="soap-input" placeholder="80">
                        </div>
                        <div>
                            <label class="soap-label">RR (/mnt)</label>
                            <input type="text" class="soap-input" placeholder="20">
                        </div>
                    </div>
                    
                    <div class="p-6 bg-rs-beige/20 rounded-3xl border border-rs-beige/30 grid md:grid-cols-3 gap-6">
                        <div>
                            <label class="soap-label">Berat Badan (kg)</label>
                            <input type="number" x-model="weight" class="soap-input !bg-white">
                        </div>
                        <div>
                            <label class="soap-label">Tinggi Badan (cm)</label>
                            <input type="number" x-model="height" class="soap-input !bg-white">
                        </div>
                        <div class="flex flex-col justify-center">
                            <p class="text-[10px] font-bold text-rs-deep-green uppercase tracking-widest mb-1">IMT (BMI)</p>
                            <div class="flex items-baseline space-x-2">
                                <span class="text-2xl font-black text-rs-deep-green" x-text="imt">0</span>
                                <span class="text-[9px] font-bold px-2 py-0.5 rounded-full bg-white text-rs-orange uppercase" x-text="imtStatus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- A & P (Right Column) -->
            <div class="space-y-6" data-aos="fade-left">
                
                <!-- A: ASSESSMENT -->
                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-rs-deep-green text-white rounded-xl flex items-center justify-center font-black text-xs">A</div>
                        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-widest text-nowrap">Assessment (Diagnosa)</h3>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="soap-label">Diagnosa Utama (ICD-10)</label>
                            <div class="relative">
                                <input type="text" class="soap-input pl-11" placeholder="Cari kode atau nama...">
                                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                            </div>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-rs-light-green/10 text-rs-light-green rounded-lg text-[10px] font-bold border border-rs-light-green/20">J00 - Common Cold</span>
                            </div>
                        </div>
                        <div>
                            <label class="soap-label">Diagnosa Sekunder</label>
                            <textarea class="soap-input h-20 resize-none" placeholder="Diagnosa tambahan..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- P: PLAN -->
                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-blue-500 text-white rounded-xl flex items-center justify-center font-black text-xs">P</div>
                        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-widest">Plan (Resep & Edukasi)</h3>
                    </div>
                    <div class="space-y-4">
                        <button class="w-full py-4 border-2 border-dashed border-gray-200 rounded-2xl text-gray-400 hover:border-rs-orange hover:text-rs-orange transition-all flex flex-col items-center group">
                            <i data-lucide="pill" class="w-5 h-5 mb-1 group-hover:scale-110 transition-transform"></i>
                            <span class="text-[10px] font-black uppercase tracking-widest">Tambah E-Prescribing</span>
                        </button>
                        
                        <div>
                            <label class="soap-label">Tindakan / Prosedur</label>
                            <input type="text" class="soap-input" placeholder="Nebulisasi, Heacting, dll">
                        </div>
                        
                        <div>
                            <label class="soap-label">Edukasi Pasien</label>
                            <textarea class="soap-input h-24 resize-none" placeholder="Saran perawatan di rumah..."></textarea>
                        </div>
                    </div>
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