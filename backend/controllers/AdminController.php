<?php

namespace backend\controllers;

use Yii;
use common\models\Pegawai;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AdminController extends \yii\web\Controller
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

    public function actionIndex()
    {
        $this->view->title = 'Dashboard Analitik';  
        return $this->render('index');
    }


    // menu management staff
    public function actionManagementStaff()
    {

        $this->view->title = 'Management Staff';  
        $dataStaff = Pegawai::find()->with(['peran', 'spesialisasi'])->orderBy(['create_at' => SORT_DESC])->all();
        return $this->render('management-staff', [
            'dataStaff' => $dataStaff, 
        ]);
    }

    public function actionUnitTarif()
    {
        $this->view->title = 'Unit & Tarif';  
        return $this->render('unit-tarif');
    }

     public function actionKatalogObat()
    {
        $this->view->title = 'Katalog Obat';  
        return $this->render('katalog-obat');
    }

     public function actionHakAkses()
    {
        $this->view->title = 'Hak Akses RBAC';  
        return $this->render('hak-akses');
    }

     public function actionAuditTrail()
    {
        $this->view->title = 'Audit Trail';  
        return $this->render('audit-trail');
    }

     public function actionLaporanKunjungan()
    {
        $this->view->title = 'Laporan Kunjungan';  
        return $this->render('laporan-kunjungan');
    }
}
