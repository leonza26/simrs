<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\LoginForm;

AppAsset::register($this);

$loginModel = $this->params['loginModel'] ?? new LoginForm();
$openLogin = !empty($this->params['openLogin']);
$selectedRole = $this->params['selectedRole'] ?? '';
?>
<?php $this->beginPage() ?> 
<!DOCTYPE html>    
<html lang="<?= Yii::$app->language ?>" class="h-full">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title>SIMRS - RSU Sehat Medika Nusantara</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine JS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Lucide Icons -->
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
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #fcfaf5; 
        }
        /* Penyesuaian scroll margin agar tidak tertutup navbar saat scroll ke anchor */
        section {
            scroll-margin-top: 5rem;
        }
    </style>
</head>
<body x-data="{ openLogin: <?= $openLogin ? "true" : "false" ?>, selectedRole: <?= json_encode($selectedRole) ?> }">

    <!-- Top Navigation -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-rs-beige sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-rs-deep-green p-2 rounded-lg">
                        <i data-lucide="hospital" class="text-white w-8 h-8"></i>
                    </div>
                    <div>
                        <h1 class="text-rs-deep-green font-bold text-xl leading-none uppercase">RSU SEHAT MEDIKA</h1>
                        <p class="text-xs text-rs-orange font-semibold tracking-widest mt-1 uppercase">Nusantara</p>
                    </div>
                </div>
                <div class="hidden md:flex space-x-8 text-sm font-medium text-gray-600">
                    <a href="#" class="hover:text-rs-deep-green transition-colors duration-300">Beranda</a>
                    <a href="#portal" class="hover:text-rs-deep-green transition-colors duration-300">Portal Staf</a>
                    <a href="#kontak" class="hover:text-rs-deep-green transition-colors duration-300">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative bg-rs-beige/30 overflow-hidden pt-16 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right" data-aos-duration="1000">
                    <span class="inline-block px-4 py-1.5 bg-rs-light-green/20 text-rs-deep-green rounded-full text-xs font-bold uppercase tracking-wider mb-6">
                        Rumah Sakit Umum Tipe C
                    </span>
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                        Sistem Informasi <br>
                        <span class="text-rs-deep-green">Manajemen Rumah Sakit</span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-8 max-w-lg">
                        Integritas layanan medis berbasis digital untuk meningkatkan efisiensi operasional dan kualitas pelayanan pasien di RSU Sehat Medika Nusantara.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#portal" class="px-8 py-4 bg-rs-orange text-white font-bold rounded-xl shadow-lg shadow-rs-orange/30 hover:bg-opacity-90 transition-all transform hover:-translate-y-1 active:scale-95">
                            Masuk Portal SIMRS
                        </a>
                        <div class="flex items-center space-x-4 text-rs-deep-green font-semibold px-4">
                            <i data-lucide="phone-call" class="w-5 h-5"></i>
                            <span>(0761) 123456</span>
                        </div>
                    </div>
                </div>
                <div class="relative" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="bg-rs-deep-green/10 rounded-3xl p-8 absolute -inset-4 transform -rotate-3"></div>
                    <img src="<?= Yii::getAlias('@web') ?>/images/home.jpg" 
                         alt="Teknologi Medis" 
                         class="relative rounded-2xl shadow-2xl object-cover w-full h-[400px]">
                </div>
            </div>
        </div>
    </header>

    <!-- Main Section-->
    <main><?= $content ?></main>

    <!-- Footer -->
    <footer id="kontak" class="bg-rs-deep-green text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <i data-lucide="hospital" class="w-8 h-8 text-rs-light-green"></i>
                        <h2 class="text-xl font-bold">RSU SEHAT MEDIKA</h2>
                    </div>
                    <p class="text-rs-beige/80 text-sm leading-relaxed">
                        Jl. Sudirman No. 125, Pekanbaru, Riau, Indonesia<br>
                        Email: info@rsusehatmedika.id<br>
                        Telp: (0761) 123456
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-6">Jam Operasional</h3>
                    <ul class="space-y-3 text-sm text-rs-beige/80">
                        <li class="flex justify-between"><span>Rawat Jalan</span> <span>08.00 - 21.00 WIB</span></li>
                        <li class="flex justify-between border-t border-white/10 pt-3"><span>IGD & Gawat Darurat</span> <span class="text-rs-orange font-bold uppercase">24 Jam</span></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-6">Tautan Cepat</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm text-rs-beige/80">
                        <a href="#" class="hover:text-white">Portal Pasien</a>
                        <a href="#" class="hover:text-white">Cek Lab</a>
                        <a href="#" class="hover:text-white">Jadwal Dokter</a>
                        <a href="#" class="hover:text-white">Karir</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-white/10 mt-16 pt-8 text-center text-sm text-rs-beige/50">
                <p>&copy; 2024 RSU Sehat Medika Nusantara. Built by M. Leonza Norisevick.</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div x-show="openLogin" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-md"
         x-cloak>
        <div @click.away="openLogin = false" class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all">
            <div class="bg-rs-deep-green p-8 text-white relative">
                <button @click="openLogin = false" class="absolute top-4 right-4 text-white/50 hover:text-white transition-colors">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
                <h3 class="text-2xl font-bold mb-2 uppercase tracking-tight">Login Portal</h3>
                <p class="text-rs-light-green font-medium">Akses Modul: <span x-text="selectedRole" class="text-white"></span></p>
            </div>
            <div class="p-8">
                <?= Html::beginForm(['/site/login'], 'post', ['class' => 'space-y-6']) ?>
                    <?php if ($loginModel->hasErrors()): ?>
                        <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-xs text-red-700">
                            <?= Html::errorSummary($loginModel, ['class' => 'space-y-1']) ?>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">ID Pegawai / Username</label>
                        <?= Html::activeTextInput($loginModel, 'username', [
                            'class' => 'w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-rs-orange focus:ring-4 focus:ring-rs-orange/10 outline-none transition-all duration-300',
                            'placeholder' => 'Masukkan ID Pegawai',
                            'autofocus' => true,
                        ]) ?>
                        <?= Html::error($loginModel, 'username', ['class' => 'mt-2 text-xs text-red-600']) ?>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kata Sandi</label>
                        <?= Html::activePasswordInput($loginModel, 'password', [
                            'class' => 'w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-rs-orange focus:ring-4 focus:ring-rs-orange/10 outline-none transition-all duration-300',
                            'placeholder' => 'Masukkan kata sandi',
                        ]) ?>
                        <?= Html::error($loginModel, 'password', ['class' => 'mt-2 text-xs text-red-600']) ?>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2 text-sm text-gray-600 cursor-pointer">
                            <?= Html::activeCheckbox($loginModel, 'rememberMe', [
                                'label' => null,
                                'class' => 'rounded text-rs-orange focus:ring-rs-orange w-4 h-4'
                            ]) ?>
                            <span>Ingat saya</span>
                        </label>
                        <a href="/site/request-password-reset" class="text-sm font-bold text-rs-orange hover:underline">Lupa sandi?</a>
                    </div>
                    <?= Html::submitButton('Autentikasi Sekarang', [
                        'class' => 'w-full py-4 bg-rs-orange text-white font-bold rounded-xl shadow-lg shadow-rs-orange/20 hover:bg-opacity-90 transition-all duration-300 transform hover:-translate-y-1 active:scale-95'
                    ]) ?>
                <?= Html::endForm() ?>
            </div>
        </div>
    </div>

    <!-- AOS & Lucide Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi AOS dengan durasi lebih santai
        AOS.init({
            once: true,
            easing: 'ease-out-quad',
            duration: 800
        });
        
        // Inisialisasi Ikon Lucide
        lucide.createIcons();
    </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>








