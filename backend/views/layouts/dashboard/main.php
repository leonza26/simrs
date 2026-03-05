<?php
/** @var yii\web\View $this */
/** @var string $content */


use yii\helpers\Html;
use yii\helpers\Url;

// Data Admin (Simulasi Yii::$app->user->identity)
$adminName = "M. Leonza Norisevick";
$adminRole = "System Administrator (IT)";

?>
<?php
use backend\assets\AppAsset;
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-full bg-slate-50">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | Admin SIMRS</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
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
                        'admin-dark': '#1e293b',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .sidebar-item-active { @apply bg-white/10 text-white border-r-4 border-rs-orange; }
        /* Custom scrollbar for admin */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
    <?php $this->head() ?>
</head>
<body class="h-full overflow-hidden text-sm text-slate-600" x-data="{ sidebarOpen: true }">
<?php $this->beginBody() ?>

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR (ADMIN CONTROL PANEL) -->
        <aside 
            class="bg-admin-dark text-slate-300 transition-all duration-300 flex-shrink-0 z-50 flex flex-col shadow-2xl"
            :class="sidebarOpen ? 'w-64' : 'w-20'">
            
            <!-- Admin Brand -->
            <div class="h-20 flex items-center px-6 border-b border-white/5 shrink-0 bg-black/20">
                <div class="p-2 bg-rs-orange rounded-lg shrink-0 shadow-lg shadow-rs-orange/20">
                    <i data-lucide="shield-check" class="text-white w-6 h-6"></i>
                </div>
                <div class="ml-3 overflow-hidden whitespace-nowrap" x-show="sidebarOpen" x-transition>
                    <p class="font-extrabold text-sm leading-none text-white tracking-tight uppercase">Control Center</p>
                    <p class="text-[9px] text-rs-orange font-bold tracking-[0.2em] mt-1 uppercase">RSU SEHAT MEDIKA</p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 overflow-y-auto py-6 space-y-1">
                
                <!-- Group: Dashboard -->
                <a href="<?= Url::to(['/admin/index']) ?>" class="flex items-center px-6 py-3 hover:bg-white/5 hover:text-white transition-all group border-r-4 border-transparent">
                    <i data-lucide="pie-chart" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-semibold" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Dashboard Analitik</span>
                </a>

                <!-- Group: Master Data Management -->
                <div class="px-6 mt-8 mb-2" x-show="sidebarOpen">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Master Data</p>
                </div>
                
                <a href="<?= Url::to(['/admin/management-staff']) ?>" class="flex items-center px-6 py-3 hover:bg-white/5 hover:text-white transition-all group border-r-4 border-transparent">
                    <i data-lucide="users-2" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-semibold" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Manajemen Staf</span>
                </a>  

                <a href="<?= Url::to(['/admin/unit-tarif']) ?>" class="flex items-center px-6 py-3 hover:bg-white/5 hover:text-white transition-all group border-r-4 border-transparent">
                    <i data-lucide="map" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-semibold" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Unit & Tarif</span>
                </a>

                <a href="<?= Url::to(['/admin/katalog-obat']) ?>" class="flex items-center px-6 py-3 hover:bg-white/5 hover:text-white transition-all group border-r-4 border-transparent">
                    <i data-lucide="package" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-semibold" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Katalog Obat</span>
                </a>

                <!-- Group: System Security -->
                <div class="px-6 mt-8 mb-2" x-show="sidebarOpen">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Sistem & Keamanan</p>
                </div>

                <a href="<?= Url::to(['/admin/hak-akses']) ?>" class="flex items-center px-6 py-3 hover:bg-white/5 hover:text-white transition-all group border-r-4 border-transparent">
                    <i data-lucide="key-round" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-semibold" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Hak Akses (RBAC)</span>
                </a>

                <a href="<?= Url::to(['admin/audit-trail']) ?>" class="flex items-center px-6 py-3 hover:bg-white/5 hover:text-white transition-all group border-r-4 border-transparent">
                    <i data-lucide="scroll-text" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-semibold" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Audit Trail</span>
                </a>

                <!-- Group: Reporting -->
                <div class="px-6 mt-8 mb-2" x-show="sidebarOpen">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Pelaporan</p>
                </div>

                <a href="<?= Url::to(['/admin/laporan-kunjungan']) ?>" class="flex items-center px-6 py-3 hover:bg-white/5 hover:text-white transition-all group border-r-4 border-transparent">
                    <i data-lucide="file-bar-chart" class="w-5 h-5 shrink-0 group-hover:text-rs-orange"></i>
                    <span class="ml-4 font-semibold" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible whitespace-nowrap'">Laporan Kunjungan</span>
                </a>
            </nav>

            <!-- Admin Profile Section -->
            <div class="p-4 border-t border-white/5 bg-black/30">
                <div class="flex items-center p-3 rounded-2xl bg-white/5">
                    <div class="w-10 h-10 rounded-xl bg-rs-orange flex items-center justify-center font-black text-white shrink-0">
                        <?= substr($adminName, 0, 1) ?>
                    </div>
                    <div class="ml-3 overflow-hidden" x-show="sidebarOpen">
                        <p class="text-xs font-bold text-white truncate"><?= $adminName ?></p>
                        <p class="text-[9px] text-rs-light-green font-bold uppercase tracking-widest truncate">Root Admin</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="flex-1 flex flex-col min-w-0 bg-slate-50 overflow-hidden">
            
            <!-- Top Header (Admin) -->
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="p-2.5 rounded-xl hover:bg-slate-100 text-slate-400 transition-colors">
                        <i data-lucide="align-left" class="w-5 h-5"></i>
                    </button>
                    <div class="ml-6 hidden md:flex items-center text-slate-300 text-[10px] font-black uppercase tracking-widest">
                        <span>Backend Admin</span>
                        <i data-lucide="chevron-right" class="w-3 h-3 mx-3 text-slate-200"></i>
                        <span class="text-slate-900"><?= Html::encode($this->title) ?></span>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <!-- Global Search -->
                    <div class="hidden lg:flex items-center bg-slate-100 px-4 py-2.5 rounded-xl border border-slate-200 focus-within:bg-white focus-within:ring-4 focus-within:ring-rs-orange/10 transition-all">
                        <i data-lucide="search" class="w-4 h-4 text-slate-400"></i>
                        <input type="text" placeholder="Cari fungsi sistem..." class="bg-transparent border-none outline-none ml-3 text-xs w-56 text-slate-600 font-medium">
                    </div>

                    <!-- System Health -->
                    <div class="hidden sm:flex items-center px-4 py-2 bg-green-50 rounded-full border border-green-100">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse mr-2"></span>
                        <span class="text-[10px] font-bold text-green-600 uppercase">System Online</span>
                    </div>

                    <div class="h-8 w-[1px] bg-slate-200"></div>

                    <a href="<?= Url::to(['/site/logout']) ?>" data-method="post" class="flex items-center px-4 py-2 bg-slate-100 text-slate-600 rounded-xl hover:bg-red-50 hover:text-red-500 transition-all group font-bold text-[10px] uppercase tracking-widest">
                        <i data-lucide="power" class="w-4 h-4 mr-2 group-hover:rotate-90 transition-transform"></i>
                        Logout
                    </a>
                </div>
            </header>

            <!-- Main Page Content -->
            <div class="flex-1 overflow-y-auto p-8 relative">
                <div class="max-w-7xl mx-auto" data-aos="fade-in">
                    <?= $content ?>
                </div>
                
                <!-- Admin Footer -->
                <div class="mt-20 py-8 border-t border-slate-200 text-center">
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.4em]">
                        RSU Sehat Medika Nusantara • SIMRS Admin Kernel v1.0
                    </p>
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