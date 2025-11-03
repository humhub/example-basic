<?php
/* @var $this \humhub\modules\ui\view\components\View */

/* @var $model \acmeCorp\humhub\modules\exampleBasic\models\Configuration */

use humhub\widgets\bootstrap\Button;
use humhub\widgets\form\ActiveForm;

?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Example-basic</strong> <?= Yii::t(
                    'ExampleBasicModule.base',
                    'configuration'
            ) ?></div>

        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'exampleString')->textarea(['rows' => 10]); ?>
            <?= $form->field($model, 'exampleBool')->checkbox(); ?>
            <br>
            <div class="form-group">
                <?= Button::save()->submit() ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>