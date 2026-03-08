<?php

namespace backend\controllers;

use Yii;
use common\models\UnitLayanan;
use yii\web\NotFoundHttpException;

class UnitTarifController extends \yii\web\Controller
{

    public function actionCreateUnit()
    {
        $model = new UnitLayanan();
        $model->status_aktif = true;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Unit {$model->nama_unit} berhasil ditambahkan.");
            return $this->redirect(['admin/unit-tarif']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Memperbarui unit layanan yang sudah ada
     */
    public function actionUpdateUnit($id)
    {
        $model = $this->findUnit($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Konfigurasi {$model->nama_unit} berhasil diperbarui.");
            return $this->redirect(['admin/unit-tarif']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Menghapus unit layanan
     */
    public function actionDeleteUnit($id)
    {
        $model = $this->findUnit($id);
        $nama = $model->nama_unit;

        if ($model->delete()) {
            Yii::$app->session->setFlash('error', "Unit {$nama} telah dihapus dari sistem.");
        }

        return $this->redirect(['admin/unit-tarif']);
    }

    /**
     * Helper untuk mencari model UnitLayanan berdasarkan ID
     */
    protected function findUnit($id)
    {
        if (($model = UnitLayanan::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Data unit tidak ditemukan.');
    }
}
