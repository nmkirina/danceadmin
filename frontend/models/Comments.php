<?php

namespace frontend\models;

use Yii;
use frontend\models\Dances;
use yii\helpers\ArrayHelper;

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
    const NEW_COMMENT = 0;
    const APPROVED_COMMENT = 1;
    const BANNED_COMMENT = 2;
    
    const APPROVED_STATUS_LIST = [
        ['key' => 0, 'name' => 'question', 'label' => 'Новый', 'class' => 'info'],
        ['key' => 1, 'name' => 'ok', 'label' => 'Одобрен', 'class' => 'success'], 
        ['key' => 2, 'name' => 'remove', 'label' => 'Запрещён', 'class' => 'danger']
        ];
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
            'created',
            'approved',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['danceid', 'text', 'approved', 'created'], 'safe']
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
            'created' => Yii::t('app', 'Created'),
            'approved' => Yii::t('app', 'Approved'),
        ];
    }
    
    public static function getDance($danceId)
    {
        $dance = Dances::findOne($danceId);
        if($dance){
            return $dance->name;
        }
        return null;
    }
    
    public static function getApprovedStatus($status = null)
    {
        if ($status === null) {
            return ArrayHelper::map(self::APPROVED_STATUS_LIST, 'key', 'label');
            
        }
        if(key_exists($status, self::APPROVED_STATUS_LIST)) {
            return self::APPROVED_STATUS_LIST[$status]['name'];
        }
    }
    
    public static function getApprovedStatusColor($status)
    {
        return self::APPROVED_STATUS_LIST[$status]['color'];
    }
}
