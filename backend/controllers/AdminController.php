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

}
