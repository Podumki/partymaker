<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Genres extends ActiveRecord
{
    static function getGenresByGames()
    {
        $connection = Yii::$app->db;
        $command = $connection->createCommand('select genres.name as name, count(games.name) as count from gamesgenre, genres, games  where gamesgenre.gameid = games.id AND gamesgenre.genreid = genres.id group by genres.name ORDER BY count DESC');
        $reader = $command->query();
        $rows = $reader->readAll();
        return $rows;

        // select genres.name as genre, count(games.name) from gamesgenre, genres, games  where gamesgenre.gameid = games.id AND gamesgenre.genreid = genres.id group by genres.name
    }
}
