<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-full bg-slate-50">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <!-- Assets: Tailwind, Alpine, AOS, Lucide, & Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .wrap { min-height: 100%; height: auto; margin: 0 auto -80px; padding: 0; }
        .footer { height: 80px; border-top: 1px solid #edf2f7; background-color: white; }
        
        .breadcrumb { display: flex; list-style: none; padding: 0; margin-bottom: 1.5rem; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: #94a3b8; gap: 0.75rem; }
        .breadcrumb li a { color: #E67E22; text-decoration: none; }
        .breadcrumb li + li:before { content: "/"; color: #cbd5e1; margin-right: 0.75rem; }
    </style>
    <?php $this->head() ?>
</head>
<body class="h-full bg-slate-50/50">
<?php $this->beginBody() ?>

<div class="wrap flex flex-col min-h-screen">
    <!-- Navbar Lebih Besar & Bold -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 px-10 py-6 flex items-center justify-between sticky top-0 z-50 shadow-sm">
        <div class="flex items-center space-x-5">
            <div class="p-3 bg-rs-orange rounded-2xl shadow-xl shadow-rs-orange/30">
                <i data-lucide="shield-check" class="text-white w-7 h-7"></i>
            </div>
            <div>
                <h1 class="text-lg font-black text-slate-900 leading-none uppercase tracking-tighter">Control Center</h1>
                <p class="text-[11px] text-rs-orange font-bold tracking-[0.3em] mt-1.5 uppercase leading-none">RSU Sehat Medika Nusantara</p>
            </div>
        </div>
        
        <div class="flex items-center space-x-8">
            <?php if (Yii::$app->user->isGuest): ?>
                <a href="<?= Url::to(['/site/login']) ?>" class="text-[12px] font-black uppercase tracking-widest text-slate-500 hover:text-rs-orange transition-all flex items-center">
                    <i data-lucide="log-in" class="w-4 h-4 mr-2"></i> Akses Autentikasi
                </a>
            <?php else: ?>
                <div class="flex items-center space-x-6">
                    <div class="flex flex-col items-end">
                        <span class="text-[12px] font-black text-slate-900 uppercase tracking-tight">
                            <?= Yii::$app->user->identity->username ?>
                        </span>
                        <div class="flex items-center mt-1">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse mr-2"></span>
                            <span class="text-[10px] font-bold text-rs-light-green uppercase tracking-widest">Root Administrator</span>
                        </div>
                    </div>
                    <div class="h-10 w-[1px] bg-slate-200"></div>
                    <?= Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            '<i data-lucide="power" class="w-4 h-4 mr-2"></i> Keluar Sistem',
                            ['class' => 'flex items-center px-6 py-3 bg-slate-900 text-[11px] font-black uppercase tracking-widest text-white rounded-2xl hover:bg-red-600 transition-all cursor-pointer border-none shadow-lg shadow-slate-200']
                        )
                        . Html::endForm() ?>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Main Section -->
    <div class="flex-1 flex flex-col">
        <!-- Content Container -->
        <div class="w-full flex-1 flex flex-col">
            <?php if (Yii::$app->controller->action->id === 'login'): ?>
                <!-- Halaman Login akan mengambil full-height jika perlu -->
                <div class="flex-1">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            <?php else: ?>
                <div class="max-w-7xl mx-auto w-full px-10 py-12 flex-1 flex flex-col">
                    <div class="mb-8" data-aos="fade-in">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options' => ['class' => 'breadcrumb'],
                            'tag' => 'nav',
                        ]) ?>
                        <?= Alert::widget() ?>
                    </div>
                    <div class="flex-1" data-aos="fade-up">
                        <?= $content ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<footer class="footer flex items-center shrink-0">
    <div class="max-w-7xl mx-auto w-full px-10 flex justify-between items-center text-[11px] font-bold text-slate-400 uppercase tracking-[0.3em]">
        <p>&copy; RSU Sehat Medika Nusantara <?= date('Y') ?></p>
        <div class="flex items-center space-x-6">
            <span class="text-rs-orange">Internal Server Node-01</span>
            <span>Kernel Build v1.0.42</span>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    lucide.createIcons();
    AOS.init({ duration: 800, once: true, easing: 'ease-out-quad' });
</script>
</body>
</html>
<?php $this->endPage() ?>