<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Spesialisasi;
    
class SpesialisasiSeederController extends Controller
{
    public function actionIndex()
    {
        $dataSpesialisasi = [
            'UMUM',
            'GIGI',
            'ANAK',
            'JANTUNG',
            'POLI SARAF',
            'KULIT & KELAMIN',
            'PENYAKIT DALAM',
            'THT',
            'MATA',
        ];

        foreach ($dataSpesialisasi as $spesialisasi) {

            // Cek kalau sudah ada, jangan insert ulang
            if (!Spesialisasi::find()->where(['nama_spesialisasi' => $spesialisasi])->exists()) {

                $spesialisasiModel = new Spesialisasi();
                $spesialisasiModel->nama_spesialisasi = $spesialisasi;

                if ($spesialisasiModel->save()) {
                    echo "✔ Spesialisasi {$spesialisasi} berhasil ditambahkan.\n";
                } else {
                    echo "✘ Gagal insert {$spesialisasi}\n";
                }
            } else {
                echo "- {$spesialisasi} sudah ada.\n";
            }
        }

        echo "\nSeeder Spesialisasi selesai.\n";
    }
}