<?php

namespace dixonsatit\yii2\oauth2server\models;

use Yii;

/**
 * This is the model class for table "oauth_clients".
 *
 * @property string $client_id
 * @property string $client_secret
 * @property string $redirect_uri
 * @property string $grant_types
 * @property string $scope
 * @property integer $user_id
 *
 * @property OauthAccessTokens[] $oauthAccessTokens
 * @property OauthAuthorizationCodes[] $oauthAuthorizationCodes
 * @property OauthRefreshTokens[] $oauthRefreshTokens
 */
class OauthClients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%oauth_clients}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['display_name','client_id', 'client_secret', 'redirect_uri', 'grant_types'], 'required'],
            [['user_id','created_at','updated_at'], 'integer'],
            [['client_id', 'client_secret'], 'string', 'max' => 32],
            [['redirect_uri'], 'string', 'max' => 1000],
            [['display_name','contact_email'], 'string', 'max' => 255],
            [['grant_types'], 'string', 'max' => 100],
            [['scope'], 'string', 'max' => 2000],
            [['redirect_uri'], 'url'],
            [['contact_email'], 'email']
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'client_secret' => 'Client Secret',
            'redirect_uri' => 'Redirect Uri',
            'grant_types' => 'Grant Types',
            'scope' => 'Scope',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAccessTokens()
    {
        return $this->hasMany(OauthAccessTokens::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAuthorizationCodes()
    {
        return $this->hasMany(OauthAuthorizationCodes::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthRefreshTokens()
    {
        return $this->hasMany(OauthRefreshTokens::className(), ['client_id' => 'client_id']);
    }
}
