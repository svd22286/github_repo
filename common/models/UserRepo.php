<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gh_user_repo".
 *
 * @property int $id
 * @property string $hash
 * @property string $url
 * @property string $updated_at
 */
class UserRepo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gh_user_repo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hash', 'url', 'updated_at'], 'required'],
            [['updated_at'], 'safe'],
            [['hash'], 'string', 'max' => 32],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hash' => Yii::t('app', 'Hash'),
            'url' => Yii::t('app', 'Url'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserRepoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserRepoQuery(get_called_class());
    }
}
