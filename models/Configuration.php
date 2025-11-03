<?php

namespace acmeCorp\humhub\modules\exampleBasic\models;

use humhub\components\SettingsManager;
use Yii;
use yii\base\Model;

class Configuration extends Model
{
    public SettingsManager $settingsManager;

    public string $exampleString = '';
    public bool $exampleBool = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exampleString'], 'safe'],
            [['exampleBool'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'exampleString' => Yii::t('ExampleBasicModule.base', 'String Label'),
            'exampleBool' => Yii::t('ExampleBasicModule.base', 'Boolean Label'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'exampleString' => Yii::t('ExampleBasicModule.base', 'TBD'),
            'exampleBool' => Yii::t('ExampleBasicModule.base', 'TBD'),
        ];
    }

    public function loadBySettings(): void
    {
        $this->exampleString = (string)$this->settingsManager->get('exampleString');
        $this->exampleBool = (bool)$this->settingsManager->get('exampleBool');
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $this->settingsManager->set('exampleString', $this->exampleString);
        $this->settingsManager->set('exampleBool', $this->exampleBool);

        return true;
    }

}
