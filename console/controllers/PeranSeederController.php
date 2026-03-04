<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Peran;

class PeranSeederController extends Controller
{
    public function actionIndex()
    {
        $dataPeran = [
            'ADMIN',
            'DOKTER',
            'PERAWAT',
            'KASIR',
            'APOTEKER',
        ];

        foreach ($dataPeran as $nama) {

            // Cek kalau sudah ada, jangan insert ulang
            if (!Peran::find()->where(['nama_peran' => $nama])->exists()) {

                $peran = new Peran();
                $peran->nama_peran = $nama;

                if ($peran->save()) {
                    echo "✔ Peran {$nama} berhasil ditambahkan.\n";
                } else {
                    echo "✘ Gagal insert {$nama}\n";
                }
            } else {
                echo "- {$nama} sudah ada.\n";
            }
        }

        echo "\nSeeder Peran selesai.\n";
    }
}