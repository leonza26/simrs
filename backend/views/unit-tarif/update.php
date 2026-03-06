<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\UnitLayanan */

$this->title = 'Pembaruan Unit Layanan';
$this->params['breadcrumbs'][] = ['label' => 'Unit & Tarif', 'url' => ['unit-tarif']];
$this->params['breadcrumbs'][] = 'Update: ' . $model->nama_unit;
?>

<div class="unit-update max-w-5xl mx-auto py-10" data-aos="zoom-in">
    <!-- Header Page -->
    <div class="flex items-center justify-between mb-12">
        <div>
            <h1 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tighter uppercase leading-none"><?= Html::encode($this->title) ?></h1>
            <p class="text-lg text-slate-400 font-medium mt-3 text-nowrap">Memperbarui parameter layanan untuk: <span class="text-rs-orange"><?= Html::encode($model->nama_unit) ?></span></p>
        </div>
        <a href="<?= Url::to(['admin/unit-tarif']) ?>" class="p-5 bg-white border-2 border-slate-100 rounded-3xl text-slate-400 hover:text-rs-orange transition-all shadow-sm">
            <i data-lucide="x" class="w-8 h-8"></i>
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-[4rem] shadow-2xl border border-slate-100 p-12 md:p-20">
        <!-- Indikator Update (Biru/Hijau Deep) -->
        <div class="h-4 bg-rs-deep-green w-full absolute top-0 left-0"></div>

        <?php $form = ActiveForm::begin([
            'id' => 'unit-update-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'block text-[13px] font-black text-slate-400 uppercase tracking-[0.25em] mb-4 ml-2'],
                'inputOptions' => ['class' => 'w-full px-8 py-6 rounded-[2rem] border-2 border-slate-50 bg-slate-50 focus:bg-white focus:border-rs-orange focus:ring-[12px] focus:ring-rs-orange/5 outline-none transition-all text-base font-bold text-slate-800'],
                'errorOptions' => ['class' => 'text-xs text-red-500 font-bold mt-3 ml-2 uppercase'],
            ],
        ]); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Nama Unit -->
            <div class="md:col-span-2">
                <?= $form->field($model, 'nama_unit')->textInput(['placeholder' => 'Nama Poliklinik...']) ?>
            </div>

            <!-- Kode Unit -->
            <div>
                <?= $form->field($model, 'kode_unit')->textInput(['placeholder' => 'Kode Singkatan...']) ?>
            </div>

            <!-- Kategori Spesialis -->
            <div>
                <?= $form->field($model, 'kategori_spesialis')->dropDownList($model->getListSpesialisasi(), [
                    'prompt' => '-- Pilih Spesialisasi --',
                    'class' => 'w-full px-8 py-6 rounded-[2rem] border-2 border-slate-50 bg-slate-50 font-bold text-slate-800 appearance-none'
                ]) ?>
            </div>

            <!-- Tarif Dasar -->
            <div>
                <?= $form->field($model, 'tarif_dasar')->textInput(['type' => 'number', 'placeholder' => 'Rp 0']) ?>
            </div>

            <!-- Status Operasional -->
            <div class="flex items-end">
                <?= $form->field($model, 'status_aktif')->checkbox([
                    'template' => "<div class=\"flex items-center space-x-4 bg-slate-50 p-6 rounded-[1.5rem] border-2 border-slate-100 w-full\">{input} {label}</div>\n{error}",
                    'class' => 'w-8 h-8 text-rs-orange rounded-xl border-slate-200 focus:ring-rs-orange/20 cursor-pointer',
                    'labelOptions' => ['class' => 'text-sm font-black text-slate-600 uppercase tracking-widest cursor-pointer']
                ]) ?>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-16 pt-10 border-t border-slate-100 flex items-center justify-end gap-8">
            <a href="<?= Url::to(['admin/unit-tarif']) ?>" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] hover:text-red-500 transition-colors">Batalkan Perubahan</a>
            <?= Html::submitButton('Perbarui Konfigurasi', [
                'class' => 'px-14 py-6 bg-rs-orange text-white rounded-[2.5rem] text-sm font-black uppercase tracking-[0.4em] shadow-2xl hover:bg-rs-deep-green transition-all hover:-translate-y-1.5 active:scale-95'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>