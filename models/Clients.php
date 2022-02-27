<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $token
 * @property string $created_at
 *
 * @property Claim[] $claims
 * @property Spin[] $spins
 * @property Wallet[] $wallets
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'token'], 'required'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 200],
            [['token'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'name' => Yii::t('app', 'Name'),
            'token' => Yii::t('app', 'Token'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Claims]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClaims()
    {
        return $this->hasMany(Claim::className(), ['clientId' => 'id']);
    }

    /**
     * Gets query for [[Spins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpins()
    {
        return $this->hasMany(Spin::className(), ['clientId' => 'id']);
    }

    /**
     * Gets query for [[Wallets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWallets()
    {
        return $this->hasMany(Wallet::className(), ['clientId' => 'id']);
    }
}
