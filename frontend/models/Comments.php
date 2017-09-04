<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for collection "comments".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $danceid
 * @property mixed $text
 * @property mixed $approved
 */
class Comments extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['dance', 'comments'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'danceid',
            'text',
            'approved',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['danceid', 'text', 'approved'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'danceid' => Yii::t('app', 'Danceid'),
            'text' => Yii::t('app', 'Text'),
            'approved' => Yii::t('app', 'Approved'),
        ];
    }
}
