<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Pegawai */

$this->params['breadcrumbs'][] = ['label' => 'Management Staff', 'url' => ['management-staff']];
$this->params['breadcrumbs'][] = 'Tambah Pegawai';
?>

<div class="staff-create min-h-screen pb-20" x-data="{ roleSelected: '<?= $model->id_peran ?>' }">
    
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <!-- Header Page -->
        <div class="flex items-center justify-between mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter uppercase">Registrasi Pegawai</h1>
                <p class="text-lg text-slate-400 font-medium mt-2">Daftarkan personel medis atau administratif baru.</p>
            </div>
            <a href="<?= Url::to(['management-staff']) ?>" class="p-5 bg-white border-2 border-slate-100 rounded-3xl text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all shadow-sm">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
        </div>

        <div class="bg-white rounded-[3.5rem] shadow-[0_40px_80px_-15px_rgba(0,0,0,0.08)] border border-slate-100 overflow-hidden">
            <!-- Decorative Banner -->
            <div class="h-4 bg-rs-orange w-full"></div>
            
            <div class="p-12 md:p-20">
                <?php $form = ActiveForm::begin([
                    'id' => 'create-staff-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'block text-[13px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4 ml-2'],
                        'inputOptions' => ['class' => 'w-full px-8 py-5 rounded-[2rem] border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-rs-orange focus:ring-[12px] focus:ring-rs-orange/5 outline-none transition-all text-base font-bold text-slate-800 placeholder:text-slate-300'],
                        'errorOptions' => ['class' => 'text-xs text-red-500 font-bold mt-3 ml-2 uppercase tracking-wider'],
                    ],
                ]); ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <!-- Nama Pegawai -->
                    <div class="md:col-span-2">
                        <?= $form->field($model, 'nama_pegawai')->textInput(['placeholder' => 'Contoh: dr. Andi Wijaya, Sp.PD']) ?>
                    </div>

                    <!-- Peran -->
                    <div>
                        <?= $form->field($model, 'id_peran')->dropDownList($model->getListPeran(), [
                            'prompt' => '-- Pilih Peran --',
                            'x-model' => 'roleSelected',
                            'class' => 'w-full px-8 py-5 rounded-[2rem] border-2 border-slate-100 bg-slate-50 focus:border-rs-orange outline-none text-base font-bold text-slate-800 appearance-none'
                        ]) ?>
                    </div>

                    <!-- No Handphone -->
                    <div>
                        <?= $form->field($model, 'no_hp')->textInput(['placeholder' => '0812xxxxxxxx']) ?>
                    </div>

                    <!-- Spesialisasi (Dinamis dengan Alpine.js) -->
                    <!-- Asumsi: ID Peran Dokter adalah 1. Ubah sesuai database anda -->
                    <div class="md:col-span-2" x-show="roleSelected == '1'" x-transition>
                        <div class="p-10 bg-rs-beige/20 rounded-[2.5rem] border-2 border-rs-beige/30 border-dashed">
                             <?= $form->field($model, 'id_spesialisasi')->dropDownList($model->getListSpesialisasi(), [
                                'prompt' => '-- Pilih Bidang Spesialisasi --',
                             ]) ?>
                             <p class="text-[10px] font-bold text-rs-deep-green uppercase tracking-widest mt-4 ml-2 italic">*Wajib diisi khusus untuk tenaga medis dokter.</p>
                        </div>
                    </div>

                    <!-- Status Aktif -->
                    <div class="md:col-span-2 pt-4">
                        <?= $form->field($model, 'status_aktif', [
                             'template' => "<div class=\"flex items-center space-x-4 bg-slate-50 p-6 rounded-3xl border-2 border-slate-100\">{input} {label}</div>\n{error}",
                             'labelOptions' => ['class' => 'text-sm font-black text-slate-700 uppercase tracking-widest cursor-pointer'],
                             'inputOptions' => ['class' => 'w-8 h-8 text-rs-orange border-slate-200 rounded-xl focus:ring-rs-orange/20 cursor-pointer'],
                        ])->checkbox([], false) ?>
                    </div>
                </div>

                <div class="mt-16 pt-10 border-t border-slate-100 flex items-center justify-between">
                    <p class="text-xs font-bold text-slate-400 italic">Pastikan seluruh data yang diinput telah valid sesuai berkas kepegawaian.</p>
                    <?= Html::submitButton('Simpan Pegawai', [
                        'class' => 'px-12 py-6 bg-slate-900 text-white rounded-[2rem] text-sm font-black uppercase tracking-[0.3em] shadow-2xl hover:bg-rs-orange hover:-translate-y-1 transition-all active:scale-95'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>