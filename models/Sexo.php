<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sexo".
 *
 * @property string $sexo
 */
class Sexo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sexo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sexo'], 'required'],
            [['sexo'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sexo' => Yii::t('app', 'Sexo'),
        ];
    }
}
