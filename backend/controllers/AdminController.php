<?php

namespace backend\controllers;

class AdminController extends \yii\web\Controller
{
     public $layout = 'dashboard/main';

    public function actionIndex()
    {
        $this->view->title = 'Dashboard Analitik';  
        return $this->render('index');
    }

    public function actionManagementStaff()
    {
        $this->view->title = 'Management Staff';  
        return $this->render('management-staff');
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
