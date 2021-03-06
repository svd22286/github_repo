<?php
/**
 * Created by PhpStorm.
 * @author: svd22286@gmail.com
 * @date: 15.09.2021
 * @time: 11:36
 */
namespace console\controllers;

use common\models\UserName;
use Yii;
use common\models\UserRepo;
use common\services\GithubRequestService;
use yii\console\Controller;

class FreshUserRepoController extends Controller
{
    public function actionRequest()
    {
        $service = new GithubRequestService();
        $usersList = UserName::find()->all();
        $usersList = array_map(function($user) {
            /**
             * @var UserName $user
             */
            return $user->name;
        }, $usersList);

        $repos = $service->getFreshRepos($usersList);

        $repos = array_map(function ($repo) {
            $repo[2] = date('Y-m-d H:i:s', $repo[2]);
            return $repo;
        }, $repos);

        Yii::$app->db->createCommand()->delete(UserRepo::tableName(), '1 = 1')->execute();

        Yii::$app->db->createCommand()->batchInsert(
            UserRepo::tableName(),
            [
                'hash',
                'url',
                'updated_at'
            ],
            $repos
        )->execute();
    }
}
