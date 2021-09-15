<?php
/**
 * Created by PhpStorm.
 * @author: svd22286@gmail.com
 * @date: 15.09.2021
 * @time: 16:36
 */
namespace backend\models;

use Yii;
use common\models\UserName;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadUserNamesForm extends Model
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['file'], 'required'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt, csv'],
        ];
    }

    public function upload()
    {
        $file = $this->file;
        /**
         * @var UploadedFile $file
         */
        $userNames = file($file->tempName, FILE_IGNORE_NEW_LINES);
        $userNames = array_map(function ($name) {
            return [trim($name)];
        }, $userNames);

        $deleteResult = Yii::$app->db->createCommand()->delete(UserName::tableName(), '1 = 1')->execute();

        $saveResult = Yii::$app->db->createCommand()->batchInsert(UserName::tableName(), ['name'], $userNames)->execute();

        if ($deleteResult && $saveResult) {
            return true;
        }

        return false;

        /*if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }*/
    }
}
