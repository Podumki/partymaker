<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Welcome to PartyMaker';
?>
<div class="site-index">
  <?= Html::img('@web/img/pic2.png', ['alt' => 'pic not found', 'style' => "width:1200px;height:450px"]); ?>

  <div class="jumbotron text-center bg-transparent mt-5 mb-5">
    <h1 class="display-4">You are welcome to our gamer community.</h1>

    <p class="lead">You are welcome to our gamer community.</p>

    <p><a class="btn btn-lg btn-info" href="http://localhost/index.php?r=site%2Flogin">Let's play!</a></p>
  </div>
</div>
<!-- Genre - Amount of Games
User - Achievmentpoints
Game - Events -->

<table class="table table-striped table-bordered border-primary caption-top">
  <caption>List of users</caption>
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Genre</th>
      <th scope="col">Amount of games</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($genres as $genre) : ?>
      <tr>
        <th scope="row"><?= Html::encode("{$genre->id}") ?></th>
        <td><?= Html::encode("{$genre->name}") ?></td>
        <td><?= Html::encode("=)") ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<table class="table table-striped table-bordered border-primary caption-top">
  <caption>List of users</caption>
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Achievmentpoints</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($genres as $genre) : ?>
      <tr>
        <th scope="row"><?= Html::encode("{$genre->id}") ?></th>
        <td><?= Html::encode("{$genre->name}") ?></td>
        <td><?= Html::encode("=)") ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<table class="table table-striped table-bordered border-primary caption-top">
  <caption>List of users</caption>
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Genre</th>
      <th scope="col">Amount of games</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($genres as $genre) : ?>
      <tr>
        <th scope="row"><?= Html::encode("{$genre->id}") ?></th>
        <td><?= Html::encode("{$genre->name}") ?></td>
        <td><?= Html::encode("=)") ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/">Check out for more ... &raquo;</a></p>