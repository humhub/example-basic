<?php

namespace acmeCorp\humhub\modules\exampleBasic;

use acmeCorp\humhub\modules\exampleBasic\models\Configuration;
use yii\helpers\Url;

class Module extends \humhub\components\Module
{
    private ?Configuration $configuration = null;

    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/example-basic/admin/config']);
    }

    /**
     * @inheritdoc
     *
     * @return void
     */
    public function disable()
    {
        // Cleanup all module data, don't remove the parent::disable()!!!
        parent::disable();
    }

    public function getConfiguration(): Configuration
    {
        if ($this->configuration === null) {
            $this->configuration = new Configuration(['settingsManager' => $this->settings]);
            $this->configuration->loadBySettings();
        }
        return $this->configuration;
    }
}
