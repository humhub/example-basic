<?php

namespace acmeCorp\humhub\modules\exampleBasic\controllers;

use humhub\modules\admin\components\Controller;
use Yii;

class AdminController extends Controller
{
    /**
     * Render admin only page
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionConfig()
    {
        $model = $this->module->getConfiguration();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->view->saved();
            return $this->redirect(['config']);
        }

        return $this->render('config', [
            'model' => $model,
        ]);
    }

}
