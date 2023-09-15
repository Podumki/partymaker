<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use kriss\calendarSchedule\widgets\FullCalendarWidget;
use kriss\calendarSchedule\widgets\processors\EventProcessor;
use kriss\calendarSchedule\widgets\processors\HeaderToolbarProcessor;
use kriss\calendarSchedule\widgets\processors\LocaleProcessor;

$this->title = 'Welcome';
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="http://localhost/index.php">Homepage</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <?= Html::img('@web/img/animal-avatar-bear.png', ['alt' => 'pic not found', 'style' => 'width: 150px;', "class"=>"rounded-circle img-fluid"])?>
                        <h5 class="my-3"><?= Html::encode("{$user['username']}") ?></h5>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nickname</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= Html::encode("{$user['username']}") ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= Html::encode("{$user['email']}") ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Most played Games</span>
                                </p>
                        
                                <table>
                                    <?php foreach ($games as $game) : ?>
                                        <tr>
                                            <td><p class="mb-1"><?= $game['name']; ?></p></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php echo FullCalendarWidget::widget([
    'calendarRenderBefore' => "console.log('before', calendar)",
    'calendarRenderAfter' => "console.log('after', calendar)",
    'clientOptions' => [
        // all options from fullCalendar
    ],
    'processors' => [
        // quick solve fullCalendar options
        new LocaleProcessor([
            'locale' => 'de-de',
        ]),
        new HeaderToolbarProcessor(),
        new EventProcessor([
            // use Array
            /*'events' => [
                ['title' => 'aaa', 'start' => time(), 'end' => time() + 10 * 3600],
            ],*/
            // use Ajax
            'events' => ['site/events'], // see FullCalendarEventsAction
        ]),
    ],
    ]);?>
</section>