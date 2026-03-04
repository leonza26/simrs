<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Pegawai */

$this->params['breadcrumbs'][] = ['label' => 'Management Staff', 'url' => ['management-staff']];
$this->params['breadcrumbs'][] = 'Update: ' . $model->nama_pegawai;
?>

<div class="staff-update min-h-screen pb-20" x-data="{ roleSelected: '<?= $model->id_peran ?>' }">
    
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <!-- Header Page -->
        <div class="flex items-center justify-between mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter uppercase text-nowrap">Edit Data Pegawai</h1>
                <p class="text-lg text-slate-400 font-medium mt-2">Memperbarui informasi profil: <span class="text-rs-orange"><?= Html::encode($model->nama_pegawai) ?></span></p>
            </div>
            <a href="<?= Url::to(['management-staff']) ?>" class="p-5 bg-white border-2 border-slate-100 rounded-3xl text-slate-400 hover:text-rs-orange hover:border-rs-orange transition-all shadow-sm">
                <i data-lucide="x" class="w-6 h-6"></i>
            </a>
        </div>

        <div class="bg-white rounded-[3.5rem] shadow-[0_40px_80px_-15px_rgba(0,0,0,0.08)] border border-slate-100 overflow-hidden">
            <!-- Indikator Update -->
            <div class="h-4 bg-rs-deep-green w-full"></div>
            
            <div class="p-12 md:p-20">
                <?php $form = ActiveForm::begin([
                    'id' => 'update-staff-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'block text-[13px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4 ml-2'],
                        'inputOptions' => ['class' => 'w-full px-8 py-5 rounded-[2rem] border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-rs-orange focus:ring-[12px] focus:ring-rs-orange/5 outline-none transition-all text-base font-bold text-slate-800'],
                        'errorOptions' => ['class' => 'text-xs text-red-500 font-bold mt-3 ml-2 uppercase tracking-wider'],
                    ],
                ]); ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="md:col-span-2">
                        <?= $form->field($model, 'nama_pegawai')->textInput() ?>
                    </div>

                    <div>
                        <?= $form->field($model, 'id_peran')->dropDownList($model->getListPeran(), [
                            'x-model' => 'roleSelected',
                            'class' => 'w-full px-8 py-5 rounded-[2rem] border-2 border-slate-100 bg-slate-50 font-bold text-slate-800 appearance-none'
                        ]) ?>
                    </div>

                    <div>
                        <?= $form->field($model, 'no_hp')->textInput() ?>
                    </div>

                    <!-- Spesialisasi Dinamis -->
                    <div class="md:col-span-2" x-show="roleSelected == '1'" x-transition>
                        <div class="p-10 bg-rs-beige/10 rounded-[2.5rem] border-2 border-slate-100 border-dashed">
                             <?= $form->field($model, 'id_spesialisasi')->dropDownList($model->getListSpesialisasi(), ['prompt' => '-- Pilih Bidang Spesialisasi --']) ?>
                        </div>
                    </div>

                    <div class="md:col-span-2 pt-4">
                        <?= $form->field($model, 'status_aktif', [
                             'template' => "<div class=\"flex items-center space-x-4 bg-slate-50 p-6 rounded-3xl border-2 border-slate-100\">{input} {label}</div>\n{error}",
                             'labelOptions' => ['class' => 'text-sm font-black text-slate-700 uppercase tracking-widest cursor-pointer'],
                             'inputOptions' => ['class' => 'w-8 h-8 text-rs-orange border-slate-200 rounded-xl focus:ring-rs-orange/20 cursor-pointer'],
                        ])->checkbox([], false) ?>
                    </div>
                </div>

                <div class="mt-16 pt-10 border-t border-slate-100 flex items-center justify-end gap-8">
                    <a href="<?= Url::to(['management-staff']) ?>" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] hover:text-red-500 transition-colors">Batalkan Perubahan</a>
                    <?= Html::submitButton('Perbarui Data', [
                        'class' => 'px-12 py-6 bg-rs-orange text-white rounded-[2rem] text-sm font-black uppercase tracking-[0.3em] shadow-xl hover:shadow-rs-orange/30 hover:-translate-y-1 transition-all active:scale-95'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>