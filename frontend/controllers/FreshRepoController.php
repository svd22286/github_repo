<?php
/**
 * Created by PhpStorm.
 * @author: svd22286@gmail.com
 * @date: 15.09.2021
 * @time: 20:36
 */
namespace frontend\controllers;

use common\models\UserRepo;
use yii\web\Controller;

class FreshRepoController extends Controller
{
    public function actionIndex()
    {
        $repos = UserRepo::find()->all();
        return $this->render('index', [
            'repos' => $repos
        ]);
    }
}