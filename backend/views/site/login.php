<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sistem Autentikasi Admin';
?>

<div class="min-h-screen flex items-center justify-center p-4 md:p-10 bg-slate-50/50">
    
    <div class="w-full max-w-6xl bg-white rounded-[4rem] shadow-[0_50px_100px_-20px_rgba(0,0,0,0.12)] border border-slate-100 overflow-hidden flex flex-col md:flex-row min-h-[700px]" data-aos="zoom-in" data-aos-duration="1200">
        
        <!-- Sisi Kiri: Visual & Branding (Dinamis & Bold) -->
        <div class="md:w-5/12 bg-admin-dark p-12 md:p-16 text-white flex flex-col justify-between relative overflow-hidden">
            <!-- Background Decoration - Animated Glow -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-rs-orange/20 rounded-full -mr-48 -mt-48 blur-[100px] animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-rs-light-green/10 rounded-full -ml-48 -mb-48 blur-[100px]"></div>
            
            <div class="relative z-10">
                <div class="w-24 h-24 bg-white/10 backdrop-blur-2xl rounded-[2.5rem] flex items-center justify-center mb-12 border border-white/20 shadow-2xl">
                    <i data-lucide="shield-check" class="w-12 h-12 text-rs-orange"></i>
                </div>
                <h2 class="text-5xl lg:text-6xl font-black leading-[1.1] tracking-tighter mb-6">
                    Secure <br>
                    <span class="text-rs-orange">Access</span> <br>
                    <span class="text-white/90">Console</span>
                </h2>
                <div class="w-24 h-2.5 bg-rs-orange rounded-full mb-10 shadow-lg shadow-rs-orange/50"></div>
                <p class="text-lg text-slate-400 font-medium leading-relaxed max-w-sm">
                    Pusat kendali infrastruktur digital RSU Sehat Medika Nusantara. Otorisasi diperlukan untuk melanjutkan.
                </p>
            </div>

            <div class="relative z-10 space-y-6">
                <div class="flex items-center space-x-5">
                    <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center border border-white/10">
                        <i data-lucide="lock" class="w-6 h-6 text-rs-light-green"></i>
                    </div>
                    <div>
                        <p class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500">Security Standard</p>
                        <p class="text-sm font-extrabold text-white">ISO/IEC 27001 Certified</p>
                    </div>
                </div>
                <div class="pt-8 border-t border-white/10 flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">System Environment</p>
                        <p class="text-sm font-black text-rs-beige mt-2 uppercase tracking-tighter">Production Kernel v1.0</p>
                    </div>
                    <div class="flex -space-x-3">
                        <div class="w-8 h-8 rounded-full border-2 border-admin-dark bg-slate-700"></div>
                        <div class="w-8 h-8 rounded-full border-2 border-admin-dark bg-rs-orange"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sisi Kanan: Form Login (Skala Besar & Nyaman) -->
        <div class="md:w-7/12 p-12 md:p-24 flex flex-col justify-center bg-white">
            <div class="mb-14" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tighter uppercase leading-none">Login Petugas</h3>
                <p class="text-lg text-slate-400 font-medium mt-5">Identifikasi akun administrator Anda secara resmi.</p>
            </div>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'block text-[13px] font-black text-slate-400 uppercase tracking-[0.25em] mb-4 ml-2'],
                    'inputOptions' => ['class' => 'w-full px-8 py-6 rounded-[2rem] border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-rs-orange focus:ring-[12px] focus:ring-rs-orange/5 outline-none transition-all text-base font-bold text-slate-800 placeholder:text-slate-300'],
                    'errorOptions' => ['class' => 'text-xs text-red-500 font-bold mt-3 ml-2 uppercase tracking-wider'],
                ],
            ]); ?>

                <div class="space-y-10">
                    <div data-aos="fade-up" data-aos-delay="300">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Ketik Username Admin...']) ?>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="400">
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => '••••••••••••••••']) ?>
                    </div>

                    <div class="flex items-center justify-between pt-2" data-aos="fade-up" data-aos-delay="500">
                        <?= $form->field($model, 'rememberMe', [
                            'template' => "<div class=\"flex items-center space-x-4\">{input} {label}</div>\n{error}",
                            'labelOptions' => ['class' => 'text-sm font-bold text-slate-500 cursor-pointer select-none'],
                            'inputOptions' => ['class' => 'w-7 h-7 text-rs-orange border-slate-200 rounded-xl focus:ring-rs-orange/20 cursor-pointer transition-all'],
                        ])->checkbox([], false) ?>
                        
                        <a href="#" class="text-xs font-black text-rs-orange uppercase tracking-widest hover:text-rs-deep-green transition-colors decoration-2 underline-offset-8 hover:underline">Butuh Bantuan?</a>
                    </div>

                    <div class="pt-8" data-aos="fade-up" data-aos-delay="600">
                        <?= Html::submitButton('Masuk ke Dashboard', [
                            'class' => 'w-full py-7 bg-slate-900 text-white rounded-[2.5rem] text-sm font-black uppercase tracking-[0.4em] shadow-[0_20px_50px_-10px_rgba(30,41,59,0.3)] hover:bg-rs-orange hover:shadow-rs-orange/30 hover:-translate-y-1.5 transition-all duration-300 active:scale-95 flex items-center justify-center group', 
                            'name' => 'login-button'
                        ]) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>

            <div class="mt-20 flex items-center justify-center space-x-10 opacity-30 grayscale hover:grayscale-0 transition-all duration-500" data-aos="fade-up" data-aos-delay="700">
                <i data-lucide="shield-check" class="w-6 h-6"></i>
                <i data-lucide="fingerprint" class="w-6 h-6"></i>
                <i data-lucide="cpu" class="w-6 h-6"></i>
                <i data-lucide="database" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

</div>

<?php
// Re-init lucide icons for dynamic elements
$this->registerJs("
    lucide.createIcons();
");
?>