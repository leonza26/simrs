<?php
/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
use yii\helpers\Url;

// Simulasi data user (Nanti diganti dengan Yii::$app->user->identity)
$userName = "M. Leonza Norisevick";
$userRole = "Perawat / Admisi"; // Bisa dinamis: Dokter, Kasir, dll.
$hospitalName = "RSU SEHAT MEDIKA";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-full bg-gray-50">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | SIMRS</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind & Plugins -->
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
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
        .nav-active { @apply bg-white/10 text-white border-l-4 border-rs-orange; }
    </style>
    <?php $this->head() ?>
</head>
<body class="h-full overflow-hidden text-sm text-gray-700" x-data="{ sidebarOpen: true }" x-data="{ 
    weight: 0, 
    height: 0, 
    get imt() { 
        if (!this.weight || !this.height) return 0;
        let hMeters = this.height / 100;
        return (this.weight / (hMeters * hMeters)).toFixed(2);
    },
    get imtStatus() {
        if (this.imt < 18.5) return 'Berat Badan Kurang';
        if (this.imt < 25) return 'Normal (Ideal)';
        if (this.imt < 30) return 'Kelebihan Berat Badan';
        return 'Obesitas';
    }

    showInvoice: false, 
    paymentMethod: 'Tunai',
    selectedPatient: {
        nama: 'Budi Santoso',
        rm: '00-12-45',
        poli: 'Poli Dalam',
        dokter: 'dr. Andi Wijaya, Sp.PD',
        items: [
            { desc: 'Konsultasi Dokter Spesialis', qty: 1, price: 150000 },
            { desc: 'Tindakan Nebulisasi', qty: 1, price: 75000 },
            { desc: 'Amoxicillin 500mg', qty: 10, price: 5000 },
            { desc: 'Paracetamol Syrup', qty: 1, price: 25000 }
        ]
    },
    get subtotal() {
        return this.selectedPatient.items.reduce((acc, item) => acc + (item.qty * item.price), 0);
    },
    get tax() { return this.subtotal * 0.11; },
    get total() { return this.subtotal + this.tax; }
}">
<?php $this->beginBody() ?>

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside 
            class="bg-rs-deep-green text-white transition-all duration-300 flex-shrink-0 z-50 flex flex-col"
            :class="sidebarOpen ? 'w-64' : 'w-20'">
            
            <!-- Logo Area -->
            <div class="h-20 flex items-center px-6 border-b border-white/10 shrink-0">
                <i data-lucide="hospital" class="w-8 h-8 text-rs-light-green shrink-0"></i>
                <div class="ml-3 overflow-hidden whitespace-nowrap" x-show="sidebarOpen" x-transition>
                    <p class="font-bold text-sm leading-none tracking-tight">SEHAT MEDIKA</p>
                    <p class="text-[10px] text-rs-beige font-semibold tracking-widest mt-0.5 uppercase">Nusantara</p>
                </div>
            </div>

            <!-- Menu Navigation -->
            <nav class="flex-1 overflow-y-auto sidebar-scroll py-6 space-y-1">
                
                <!-- Group: Core Operasional -->
                <div class="px-4 mb-4" x-show="sidebarOpen"><p class="text-[10px] font-bold text-rs-light-green uppercase tracking-widest">Utama</p></div>
                
                <a href="<?= Url::to(['/dashboard/index']) ?>" class="flex items-center px-6 py-3 text-white/70 hover:bg-white/5 hover:text-white transition-all group">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-medium transition-opacity" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Dashboard</span>
                </a>

                <!-- Modul Registrasi (Perawat) -->
                <a href="<?= Url::to(['/dashboard/registrasi-pasien']) ?>" class="flex items-center px-6 py-3 text-white/70 hover:bg-white/5 hover:text-white transition-all group">
                    <i data-lucide="user-plus" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Registrasi Pasien</span>
                </a>

                <a href="<?= Url::to(['/dashboard/antrean-poli']) ?>" class="flex items-center px-6 py-3 text-white/70 hover:bg-white/5 hover:text-white transition-all group">
                    <i data-lucide="users" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Antrean Poli</span>
                </a>

                <!-- Modul EMR (Dokter) -->
                <div class="px-4 mt-6 mb-4" x-show="sidebarOpen"><p class="text-[10px] font-bold text-rs-light-green uppercase tracking-widest">Medis</p></div>
                
                <a href="<?= Url::to(['/dashboard/pemeriksaan-soap']) ?>" class="flex items-center px-6 py-3 text-white/70 hover:bg-white/5 hover:text-white transition-all group">
                    <i data-lucide="stethoscope" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Pemeriksaan (SOAP)</span>
                </a>

                <!-- Modul Billing (Kasir) -->
                <div class="px-4 mt-6 mb-4" x-show="sidebarOpen"><p class="text-[10px] font-bold text-rs-light-green uppercase tracking-widest">Keuangan</p></div>
                
                <a href="<?= Url::to(['/dashboard/billing']) ?>" class="flex items-center px-6 py-3 text-white/70 hover:bg-white/5 hover:text-white transition-all group">
                    <i data-lucide="receipt" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-medium" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Pembayaran / Billing</span>
                </a>
            </nav>

            <!-- Bottom User Profil -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center p-2 rounded-xl bg-black/20">
                    <div class="w-10 h-10 rounded-lg bg-rs-light-green flex items-center justify-center font-bold text-white shrink-0">
                        <?= substr($userName, 0, 1) ?>
                    </div>
                    <div class="ml-3 overflow-hidden" x-show="sidebarOpen">
                        <p class="text-xs font-bold truncate"><?= $userName ?></p>
                        <p class="text-[10px] text-white/50 truncate"><?= $userRole ?></p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 flex flex-col min-w-0 bg-gray-50 overflow-hidden">
            
            <!-- Top Header -->
            <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8 shrink-0">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-gray-100 text-gray-500 transition-colors">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <div class="ml-6 flex items-center text-gray-400 text-xs">
                        <span>SIMRS</span>
                        <i data-lucide="chevron-right" class="w-3 h-3 mx-2"></i>
                        <span class="text-gray-900 font-medium"><?= Html::encode($this->title) ?></span>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-400 hover:text-rs-orange transition-colors">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-rs-orange rounded-full border-2 border-white"></span>
                    </button>
                    
                    <!-- Search -->
                    <div class="hidden sm:flex items-center bg-gray-100 px-4 py-2 rounded-xl border border-gray-200 focus-within:bg-white focus-within:ring-2 focus-within:ring-rs-light-green/20 transition-all">
                        <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
                        <input type="text" placeholder="Cari No. RM / Pasien..." class="bg-transparent border-none outline-none ml-3 text-xs w-48 text-gray-600">
                    </div>

                    <div class="h-8 w-[1px] bg-gray-200"></div>

                    <a href="<?= Url::to(['/site/logout']) ?>" data-method="post" class="flex items-center text-gray-500 hover:text-red-500 transition-colors">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                        <span class="ml-2 font-bold text-xs uppercase tracking-wider">Keluar</span>
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="flex-1 overflow-y-auto p-8 relative">
                <div class="max-w-7xl mx-auto">
                    <?= $content ?>
                </div>
                
                <!-- Footer Support -->
                <div class="mt-20 py-8 border-t border-gray-200 text-center">
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.2em]">IT Support RSU Sehat Medika &copy; 2024</p>
                </div>
            </div>
        </main>

    </div>

<?php $this->endBody() ?>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    lucide.createIcons();
    AOS.init({ duration: 600, once: true });
</script>
</body>
</html>
<?php $this->endPage() ?>