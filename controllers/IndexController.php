<?php

namespace acmeCorp\humhub\modules\controllers;

use humhub\components\Controller;

class IndexController extends Controller
{

    /**
     * @inheritdoc
     */
    public $subLayout = "@example-basic/views/layouts/default";

    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}

