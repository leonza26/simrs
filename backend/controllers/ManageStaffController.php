<?php

namespace backend\controllers;

use Yii;
use common\models\Pegawai;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ManageStaffController extends \yii\web\Controller
{
     public $layout = 'dashboard/main';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete-staff' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Form tambah pegawai baru
     */
    public function actionCreateStaff()
    {
        $model = new Pegawai();
        $model->status_aktif = true; // Default aktif

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Pegawai {$model->nama_pegawai} berhasil didaftarkan.");
            return $this->redirect(['admin/management-staff']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Form update data pegawai
     */
    public function actionUpdateStaff($id)
    {
        $model = $this->findPegawai($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Data {$model->nama_pegawai} berhasil diperbarui.");
            return $this->redirect(['admin/management-staff']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Aksi hapus pegawai
     */
    public function actionDeleteStaff($id)
    {
        $model = $this->findPegawai($id);
        $nama = $model->nama_pegawai;
        $model->delete();

        Yii::$app->session->setFlash('error', "Pegawai {$nama} telah dihapus dari sistem.");
        return $this->redirect(['admin/management-staff']);
    }

    // Helper cari model
    protected function findPegawai($id)
    {
        if (($model = Pegawai::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Data pegawai tidak ditemukan.');
    }
}
