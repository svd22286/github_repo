<?php

use yii\db\Migration;
use common\models\User;

/**
 * Class m210915_153318_add_admin
 */
class m210915_153318_add_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->username = 'admin';
        $user->auth_key = 'Z3ajFQqqw1YjblKqixcXPyWK-P-sj7eG';
        $user->password_hash = '$2y$13$Q22HQR4H1bBDZh0VfdDwg.IofbRI3.Y.X7EojA.e1iglt7eC1.K1S';
        $user->email = 'admin@mail.ru';
        $user->status = User::STATUS_ACTIVE;
        $user->created_at = 1631715799;
        $user->updated_at = 1631715799;
        $user->verification_token = 'LHF1eDzFHpj4c1hBDVicc0MLFhbdBqx5_1631715799';
        $user->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        User::deleteAll(['email' => 'test222@mail.ru']);
    }
}
