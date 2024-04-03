<?php

if (!Yii::$app->urlManager->enablePrettyUrl && !(defined('YII_ENV_TEST') && YII_ENV_TEST)) {
    return 'Please enable URL Rewriting: https://docs.humhub.org/docs/admin/installation/#pretty-urls';
}

return null;
