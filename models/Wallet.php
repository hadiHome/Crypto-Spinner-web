<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property int $id
 * @property int $clientId
 * @property int $polc
 * @property int $dodge
 * @property int $ada
 * @property int $alu
 * @property int $xrp
 * @property int $ftm
 * @property int $usdt
 *
 * @property Clients $client
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clientId', 'polc', 'dodge', 'ada', 'alu', 'xrp', 'ftm', 'usdt'], 'integer'],
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
            'polc' => Yii::t('app', 'Polc'),
            'dodge' => Yii::t('app', 'Dodge'),
            'ada' => Yii::t('app', 'Ada'),
            'alu' => Yii::t('app', 'Alu'),
            'xrp' => Yii::t('app', 'Xrp'),
            'ftm' => Yii::t('app', 'Ftm'),
            'usdt' => Yii::t('app', 'Usdt'),
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
