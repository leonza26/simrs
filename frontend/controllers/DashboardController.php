<?php
namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class DashboardController extends Controller
{
    public $layout = 'dashboard/main';

    public function behaviors()
    {
        return [];
    }   

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
}
