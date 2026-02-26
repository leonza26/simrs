
<?php

/* @var $this yii\web\View */

?>
<div class="max-w-7xl mx-auto space-y-6">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4" data-aos="fade-down">
            <div>
                <nav class="flex items-center text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">
                    <a href="#" class="hover:text-rs-deep-green">Dashboard</a>
                    <i data-lucide="chevron-right" class="w-3 h-3 mx-2"></i>
                    <span class="text-rs-deep-green">Billing & Kasir</span>
                </nav>
                <h2 class="text-2xl font-black text-gray-800 tracking-tight text-nowrap">Sistem Kasir Utama</h2>
                <p class="text-xs text-gray-500 font-medium mt-1">Penyelesaian administrasi dan pembayaran pasien.</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="px-5 py-3 bg-white border border-gray-100 rounded-2xl flex items-center shadow-sm">
                    <i data-lucide="info" class="w-4 h-4 text-rs-orange mr-3"></i>
                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">3 Tagihan Menunggu</span>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- List Pasien Belum Bayar -->
            <div class="lg:col-span-2 space-y-6" data-aos="fade-right">
                <div class="billing-card">
                    <div class="p-6 border-b border-gray-50 flex items-center justify-between">
                        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-widest">Daftar Tunggu Pembayaran</h3>
                        <div class="relative">
                            <input type="text" placeholder="Cari No. RM..." class="pl-10 pr-4 py-2 bg-gray-50 rounded-xl border-none text-[10px] focus:ring-2 focus:ring-rs-orange/20 outline-none w-48">
                            <i data-lucide="search" class="absolute left-3.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50/50">
                                <tr>
                                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Pasien</th>
                                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Unit / Dokter</th>
                                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Estimasi Tagihan</th>
                                    <th class="px-6 py-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                <tr class="hover:bg-rs-beige/10 transition-colors group">
                                    <td class="px-6 py-5">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-rs-orange/10 text-rs-orange rounded-xl flex items-center justify-center font-bold text-xs shrink-0">BS</div>
                                            <div>
                                                <p class="text-xs font-bold text-gray-800">Budi Santoso</p>
                                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">RM: 00-12-45</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <p class="text-[10px] font-bold text-rs-deep-green uppercase tracking-tighter">Poli Dalam</p>
                                        <p class="text-[10px] text-gray-400 italic">dr. Andi Wijaya</p>
                                    </td>
                                    <td class="px-6 py-5">
                                        <p class="text-xs font-black text-gray-700">Rp 333.000</p>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <button @click="showInvoice = true" class="px-4 py-2 bg-rs-orange text-white rounded-lg text-[10px] font-bold uppercase tracking-widest hover:scale-105 transition-all shadow-lg shadow-rs-orange/20">
                                            Proses
                                        </button>
                                    </td>
                                </tr>
                                <!-- Dummy Rows -->
                                <tr class="hover:bg-rs-beige/10 transition-colors group">
                                    <td class="px-6 py-5">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-rs-light-green/10 text-rs-light-green rounded-xl flex items-center justify-center font-bold text-xs shrink-0">SA</div>
                                            <div>
                                                <p class="text-xs font-bold text-gray-800">Siti Aminah</p>
                                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">RM: 00-12-46</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <p class="text-[10px] font-bold text-rs-deep-green uppercase tracking-tighter">Poli Gigi</p>
                                        <p class="text-[10px] text-gray-400 italic text-nowrap">drg. Maya Sari</p>
                                    </td>
                                    <td class="px-6 py-5">
                                        <p class="text-xs font-black text-gray-700">Rp 150.000</p>
                                    </td>
                                    <td class="px-6 py-5 text-right text-nowrap">
                                        <button class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg text-[10px] font-bold uppercase tracking-widest cursor-not-allowed">
                                            Menunggu
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Kasir (Side) -->
            <div class="space-y-6" data-aos="fade-left">
                <div class="bg-rs-deep-green p-8 rounded-[2.5rem] text-white shadow-xl shadow-rs-deep-green/20 relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8">
                            <h4 class="text-xs font-bold uppercase tracking-[0.2em] text-rs-beige">Pendapatan Hari Ini</h4>
                            <i data-lucide="trending-up" class="w-4 h-4 text-rs-light-green"></i>
                        </div>
                        <p class="text-3xl font-black mb-2">Rp 4.250.000</p>
                        <p class="text-[10px] text-white/50 font-medium">Data diperbarui otomatis dari sistem billing.</p>
                        
                        <div class="mt-10 grid grid-cols-2 gap-4">
                            <div class="bg-white/10 p-4 rounded-2xl border border-white/5">
                                <p class="text-[9px] font-bold text-rs-light-green uppercase mb-1">Pasien Lunas</p>
                                <p class="text-lg font-black">28</p>
                            </div>
                            <div class="bg-white/10 p-4 rounded-2xl border border-white/5">
                                <p class="text-[9px] font-bold text-rs-orange uppercase mb-1">Pending</p>
                                <p class="text-lg font-black">03</p>
                            </div>
                        </div>
                    </div>
                    <i data-lucide="banknote" class="absolute -bottom-6 -right-6 w-32 h-32 text-white/5 transform -rotate-12"></i>
                </div>

                <!-- Quick Actions -->
                <div class="billing-card p-8">
                    <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-6">Fungsi Kasir</h4>
                    <div class="space-y-3">
                        <button class="w-full flex items-center justify-between p-4 rounded-2xl bg-gray-50 hover:bg-rs-beige/20 transition-all group">
                            <div class="flex items-center">
                                <i data-lucide="file-text" class="w-4 h-4 text-gray-400 mr-3 group-hover:text-rs-orange"></i>
                                <span class="text-xs font-bold text-gray-600">Laporan Shift</span>
                            </div>
                            <i data-lucide="chevron-right" class="w-3 h-3 text-gray-300"></i>
                        </button>
                        <button class="w-full flex items-center justify-between p-4 rounded-2xl bg-gray-50 hover:bg-rs-beige/20 transition-all group">
                            <div class="flex items-center">
                                <i data-lucide="calculator" class="w-4 h-4 text-gray-400 mr-3 group-hover:text-rs-orange"></i>
                                <span class="text-xs font-bold text-gray-600">Penyesuaian Tarif</span>
                            </div>
                            <i data-lucide="chevron-right" class="w-3 h-3 text-gray-300"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Billing Detail (Invoice) -->
    <div x-show="showInvoice" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-md"
         x-cloak>
        <div @click.away="showInvoice = false" class="bg-white rounded-[3rem] shadow-2xl w-full max-w-4xl overflow-hidden max-h-[90vh] flex flex-col">
            <div class="bg-rs-deep-green p-8 text-white flex flex-col md:flex-row md:items-center justify-between shrink-0 gap-4">
                <div class="flex items-center gap-4">
                    <div class="bg-white/10 p-3 rounded-2xl">
                        <i data-lucide="receipt" class="w-8 h-8 text-rs-orange"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-black uppercase tracking-tight">Rincian Tagihan</h3>
                        <p class="text-[10px] text-rs-light-green font-bold uppercase tracking-[0.2em] mt-1">Invoice: INV/20240226/001</p>
                    </div>
                </div>
                <button @click="showInvoice = false" class="p-2 hover:bg-white/10 rounded-full transition-colors self-end md:self-auto">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
            
            <div class="flex-1 overflow-y-auto p-8 grid md:grid-cols-5 gap-8">
                <!-- Left: Itemized Bill -->
                <div class="md:col-span-3 space-y-8">
                    <div>
                        <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4">Informasi Layanan</h4>
                        <div class="bg-gray-50 p-6 rounded-3xl border border-gray-100 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-[9px] text-gray-400 uppercase font-bold">Nama Pasien</p>
                                <p class="text-sm font-bold text-gray-800" x-text="selectedPatient.nama"></p>
                            </div>
                            <div>
                                <p class="text-[9px] text-gray-400 uppercase font-bold">No. Rekam Medis</p>
                                <p class="text-sm font-bold text-rs-orange" x-text="selectedPatient.rm"></p>
                            </div>
                            <div class="col-span-2 pt-2 border-t border-gray-200/50">
                                <p class="text-[9px] text-gray-400 uppercase font-bold">Unit Pelayanan</p>
                                <p class="text-xs font-medium text-gray-600" x-text="`${selectedPatient.poli} (${selectedPatient.dokter})`"></p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4">Rincian Biaya</h4>
                        <table class="w-full text-left text-xs">
                            <thead class="border-b border-gray-100">
                                <tr>
                                    <th class="py-3 font-bold text-gray-400 uppercase tracking-tighter">Deskripsi</th>
                                    <th class="py-3 font-bold text-gray-400 uppercase tracking-tighter text-center">Qty</th>
                                    <th class="py-3 font-bold text-gray-400 uppercase tracking-tighter text-right">Harga</th>
                                    <th class="py-3 font-bold text-gray-400 uppercase tracking-tighter text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                <template x-for="item in selectedPatient.items" :key="item.desc">
                                    <tr>
                                        <td class="py-4 font-medium text-gray-700" x-text="item.desc"></td>
                                        <td class="py-4 text-center font-bold text-gray-500" x-text="item.qty"></td>
                                        <td class="py-4 text-right text-gray-500" x-text="new Intl.NumberFormat('id-ID').format(item.price)"></td>
                                        <td class="py-4 text-right font-bold text-gray-800" x-text="new Intl.NumberFormat('id-ID').format(item.qty * item.price)"></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Right: Payment & Total -->
                <div class="md:col-span-2 flex flex-col justify-between">
                    <div class="bg-gray-50 p-8 rounded-[2.5rem] border border-gray-100 space-y-6">
                        <div class="space-y-3">
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-400">Subtotal</span>
                                <span class="font-bold text-gray-700" x-text="`Rp ${new Intl.NumberFormat('id-ID').format(subtotal)}`"></span>
                            </div>
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-400">PPN (11%)</span>
                                <span class="font-bold text-gray-700" x-text="`Rp ${new Intl.NumberFormat('id-ID').format(tax)}`"></span>
                            </div>
                            <div class="pt-4 border-t border-gray-200 flex justify-between items-baseline">
                                <span class="text-[10px] font-bold text-gray-400 uppercase">Total Tagihan</span>
                                <span class="text-2xl font-black text-rs-orange" x-text="`Rp ${new Intl.NumberFormat('id-ID').format(total)}`"></span>
                            </div>
                        </div>

                        <div class="pt-6">
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4 ml-1">Metode Pembayaran</label>
                            <div class="grid grid-cols-2 gap-3">
                                <button @click="paymentMethod = 'Tunai'" :class="paymentMethod === 'Tunai' ? 'bg-rs-orange text-white' : 'bg-white text-gray-400 border border-gray-100'" class="py-3 rounded-2xl text-[10px] font-bold uppercase transition-all shadow-sm">Tunai</button>
                                <button @click="paymentMethod = 'Non-Tunai'" :class="paymentMethod === 'Non-Tunai' ? 'bg-rs-orange text-white' : 'bg-white text-gray-400 border border-gray-100'" class="py-3 rounded-2xl text-[10px] font-bold uppercase transition-all shadow-sm">QRIS / Debit</button>
                            </div>
                        </div>

                        <button class="w-full py-5 bg-rs-deep-green text-white rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-rs-deep-green/20 hover:scale-[1.02] transition-all flex items-center justify-center">
                            Konfirmasi Lunas <i data-lucide="check-circle" class="w-4 h-4 ml-3"></i>
                        </button>
                    </div>

                    <div class="mt-8 text-center">
                        <p class="text-[10px] text-gray-400 leading-relaxed italic">Dengan menekan konfirmasi, sistem akan mencetak kwitansi dan mengubah status antrean menjadi 'Selesai'.</p>
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