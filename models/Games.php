<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Games extends ActiveRecord
{
    static function getGameByEvents()
    {
        $connection = Yii::$app->db;
        $command = $connection->createCommand('select games.name as name, count(distinct userevent.eventid) as events from userevent, events, games where userevent.gameid = games.id AND userevent.eventid = events.id group by userevent.gameid ORDER BY events DESC');
        $reader = $command->query();
        $rows = $reader->readAll();
        return $rows;        
    }

    
    static function getGamesByUser($id)
    {
        //Games of an User
        $connection = Yii::$app->db;
        $command = $connection->createCommand('select games.name as name from games, usergame, user where usergame.gameid = games.id AND usergame.userid =user.id AND user.id='.$id);
        $reader = $command->query();
        $rows = $reader->readAll();
        return $rows;      
    }

}