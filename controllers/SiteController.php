<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Achievments;
use app\models\AchievmentType;
use app\models\Events;
use app\models\GameAchievment;
use app\models\GameMode;
use app\models\Games;
use app\models\GamesGenre;
use app\models\Genres;
use app\models\Messages;
use app\models\Modes;
use app\models\User;
use app\models\UserEvent;
use app\models\UserGame;
use app\models\Userachievment;
use kriss\calendarSchedule\events\BackgroundEvent;
use kriss\calendarSchedule\events\TitleEvent;
use kriss\calendarSchedule\events\UrlEvent;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */


    public function actionIndex()
    {
        $queryGame = Games::find();
        $genres = Genres::getGenresByGames();
        $games = $queryGame->orderBy('id')
            ->limit(5)
            ->all();

        $usersWithAchievments = User::getUserByAchievmentpoints();
        $gamesWithEvents = Games::getGameByEvents();
        $array = [
            'games' => $games,
            'genres' => $genres,
            'usersWithAchievments' => $usersWithAchievments,
            'gamesWithEvents' => $gamesWithEvents
        ];
        return $this->render('index', $array);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // => присваевание 
        // -> обращение к методу или свойству экземпляра класса
        // :: обращение к методу или свойству калсса

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {

        return $this->render('about');
    }

    public function actionProfile($id)
    {
        $user = User::findOne($id);
        $games = Games::getGamesByUser($id);
        
        return $this->render('profile', ['user'=>$user, 'games'=>$games] );
    }

    public function actionImpressum()
    {

        return $this->render('impressum');
    }

    public function actionEvents($start, $end)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $month = date('Y-m', strtotime($start));

        return [
            new TitleEvent('100', $month . '-15', $month . '-16'),
            new TitleEvent('200', $month . '-17', $month . '-19'),
            new UrlEvent('url', ['site/events'], $month . '-15', $month . '-16'),
            new BackgroundEvent($month . '-17', $month . '-29', 'red'),
        ];
    }

}
