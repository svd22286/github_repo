<?php
/**
 * Created by PhpStorm.
 * @author: svd22286@gmail.com
 * @date: 15.09.2021
 * @time: 16:36
 */
namespace backend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\UploadedFile;
use backend\models\UploadUserNamesForm;
use Yii;

class ImportUserNameController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get', 'post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new UploadUserNamesForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                // file is uploaded successfully
                Yii::$app->session->setFlash('upload_success', 'Файл был успешно загружен', true);
                return $this->redirect('index');
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}
