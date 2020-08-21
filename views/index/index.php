<?php

use humhubContrib\modules\exampleBasic\assets\Assets;
use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('ExampleBasicModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("example-basic", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('ExampleBasicModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Example-basic</strong> <?= Yii::t('ExampleBasicModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('ExampleBasicModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('ExampleBasicModule.base', 'Say Hello!'))->action("example-basic.hello")->loader(false); ?></div>
