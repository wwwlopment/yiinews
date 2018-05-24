<?php

namespace app\controllers;

use app\models\Comments;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use yii\data\Pagination;

class SiteController extends Controller
{


  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
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
        'class' => VerbFilter::className(),
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
    $this->view->title = 'Новини';
    $news = News::find()->limit(5)->orderBy(['id' => SORT_DESC])->all();

    return $this->render('basic', compact('news'));
  }

  public function actionNews()
  {
    $this->view->title = 'Всі новини';
    $news = News::find();
    $countQuery = clone $news;

    // paginations - 5 items per page
    $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);

    $pages->pageSizeParam = false;

    $models = $news->offset($pages->offset)
      ->limit($pages->limit)
      ->all();

    return $this->render('basic', [
      'models' => $models,
      'pages' => $pages,
    ]);

  }



  /**
   * Show current news action and add comments.
   *
   * @return string
   */

  public function actionShow($id)
  {
    $shownews = News::findOne(['id' => $id]);
    $showcomments = Comments::find()->where(['news_id' => $id])->all();
    $model = new Comments();

    //adding comments
    if (Yii::$app->request->post()) {
      $model = new Comments();
      $model->news_id = Yii::$app->request->post('Comments')['news_id'];
      $model->date = date("Y-m-d");
      $model->author_name = Yii::$app->request->post('Comments')['author_name'];
      $model->comment = Yii::$app->request->post('Comments')['comment'];
        if ($model->save()) {
          Yii::$app->session->setFlash('success', 'Коментар доданий');
          return $this->refresh();
        } else {
          Yii::$app->session->setFlash('error', 'Помилка');
        }
    }

    return $this->render('current', ['model' => $model, 'shownews' => $shownews, 'showcomments' => $showcomments]);

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
}
