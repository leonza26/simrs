<?php

namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class DashboardController extends Controller
{
    public $layout = 'dashboard/main';

    // public function behaviors()
    // {
    //     return [];
    // }   

    public function actionIndex()
    {
        $this->view->title = 'Dashboard';
        return $this->render('index');
    }

    public function actionRegistrasiPasien()
    {
        $this->view->title = 'Registrasi Pasien';
        return $this->render('registrasi');
    }

    public function actionAntreanPoli()
    {
        $this->view->title = 'Antrean Poli';
        return $this->render('antrean-poli');
    }

    public function actionPemeriksaanSoap()
    {
        $this->view->title = 'Pemeriksaan SOAP';
        return $this->render('pemeriksaan-soap');
    }

     public function actionBilling()
    {
        $this->view->title = 'Billing';
        return $this->render('billing');
    }
}
