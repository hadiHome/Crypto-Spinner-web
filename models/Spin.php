<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spin".
 *
 * @property int $id
 * @property int $clientId
 * @property string $date
 * @property string $prize
 *
 * @property Clients $client
 */
class Spin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clientId', 'prize'], 'required'],
            [['clientId'], 'integer'],
            [['date'], 'safe'],
            [['prize'], 'string', 'max' => 200],
            [['clientId'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'clientId' => Yii::t('app', 'Client ID'),
            'date' => Yii::t('app', 'Date'),
            'prize' => Yii::t('app', 'Prize'),
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'clientId']);
    }
}
