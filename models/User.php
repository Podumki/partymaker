<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    static function getUserByAchievmentpoints()
    {
        $connection = Yii::$app->db;
        $command = $connection->createCommand('select user.username as name, sum(achievments.points) as points from userachievment, user, achievments  where userachievment.userid = user.id AND userachievment.achievmentid = achievments.id group by user.username ORDER BY points DESC');
        $reader = $command->query();
        $rows = $reader->readAll();
        return $rows;        
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function getId()
    {
        return $this->id;
    }
    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        $connection = Yii::$app->db;
        $command = $connection->createCommand('select user.* from user where id='.$id);
        $reader = $command->query();
        $user = $reader->read();

        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $connection = Yii::$app->db;
        $command = $connection->createCommand('select user.* from user where accessToken='.$token);
        $reader = $command->query();
        $user = $reader->read();


        return new static($user);
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

}