<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Welcome to PartyMaker';
?>
<div class="site-index">
  <?= Html::img('@web/img/gaming-together-playing-with-friends-free-vector.jpg', ['alt' => 'pic not found', 'style' => 'float: right;max-width:600px;width:100%']); ?>

  <div class="jumbotron text-center bg-transparent mt-5 mb-5">
    <h1 class="display-4">LFG - Find Gamer Friends</h1>

    <p class="lead">You are welcome to our gamer community!</p>
  </div>
</div>
<!-- Genre - Amount of Games
User - Achievmentpoints
Game - Events -->
<div class="d-flex p-2 bd-highlight">
  <table class="table table-striped table-bordered border-success caption-top w-auto table-info">
    <caption>List of Users</caption>
    <thead class="table-light">
      <tr>
        <th scope="col">Genre</th>
        <th scope="col">Amount of Games</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($genres as $genre) : ?>
        <tr>
          <td><?= Html::encode("{$genre['name']}") ?></td>
          <td><?= Html::encode("{$genre['count']}") ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <table class="table table-striped table-bordered border-warning caption-top w-auto table-warning">
    <caption>Users with most Achievments</caption>
    <thead class="table-light">
      <tr>
        <th scope="col">User</th>
        <th scope="col">Achievmentpoints</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usersWithAchievments as $usersWithAchievment) : ?>
        <tr>
          <td><?= Html::encode("{$usersWithAchievment['name']}") ?></td>
          <td><?= Html::encode("{$usersWithAchievment['points']}") ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <table class="table table-striped table-bordered border-danger caption-top w-auto table-danger">
    <caption>Popularity of Games</caption>
    <thead class="table-light">
      <tr>
        <th scope="col">Game</th>
        <th scope="col">Events</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($gamesWithEvents as $gamesWithEvent) : ?>
        <tr>
          <td><?= Html::encode("{$gamesWithEvent['name']}") ?></td>
          <td><?= Html::encode("{$gamesWithEvent['events']}") ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
<div class="text-center">
  <p><a class="btn btn-lg btn-danger position-absolute mx-auto" href="http://localhost/index.php?r=site%2Flogin">Let's play!</a></p>
</div>