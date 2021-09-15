<?php
/**
 * Created by PhpStorm.
 * @author: svd22286@gmail.com
 * @date: 15.09.2021
 * @time: 11:36
 */
namespace common\services;

use common\components\GithubAPI;
use common\components\OrderedList;
use common\models\UserName;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class GithubRequestService
{
    public function getFreshRepos($usersList)
    {
        $repos = [];
        $return = [];
        $gApi = new GithubAPI();
        foreach ($usersList as $user) {
            $rs = Json::decode($gApi->getUserRepos($user));
            foreach ($rs as $repo) {
                $updateAt = $repo['updated_at'];
                $time = strtotime($updateAt);
                $url = $repo['url'];
                $hash = md5($time.$url);
                $repos[] = [$hash, $url, $time];
            }
        }

        $list = ArrayHelper::getColumn($repos, 2);
        $ol = new OrderedList($list);
        $ordered = $ol->last(10)->getList();

        while (!empty($ordered)) {
            $elem = current($ordered);
            if ($elem == false) {
                break;
            }
            $indexes = array_keys($repos);

            for ($i = 0; $i < count($indexes); $i++) {
                $index = $indexes[$i];
                $currentElement = $repos[$index];
                if ($elem == $currentElement[2]) {
                    $return[$repos[$index][0]] = $repos[$index];
                    unset($ordered[0]);
                    $ordered = array_values($ordered);
                    unset($repos[$index]);
                    $repos = array_values($repos);
                    break;
                }
            }

            if (empty($ordered)) {
                break;
            }
        }
        return $return;
    }
}
