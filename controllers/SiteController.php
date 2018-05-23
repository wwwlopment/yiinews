<?php

namespace app\controllers;

use app\models\NewsComments;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;

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


  /**
   * Show current news action.
   *
   * @return string
   */

  public function actionShow($id)
  {
    $shownews = News::findOne(['id' => $id]);
    $showcomments = NewsComments::find()->where(['news_id' => $id])->all();
    $model = new NewsComments();
    return $this->render('current', ['model' => $model, 'shownews' => $shownews, 'showcomments' => $showcomments]);
  }

  /**
   * Add current news comment action.
   *
   * @return string
   */

  public function actionAdd() {

    if (Yii::$app->request->post()) {
   /*   echo '<pre>';

      print_r(Yii::$app->request->post('NewsComments'));
      echo '</pre>';
      die;*/
      $model = new NewsComments();
      $model->news_id =Yii::$app->request->post('NewsComments')['news_id'];
      $model->date = date("Y-m-d");
      $model->author_name = Yii::$app->request->post('NewsComments')['author_name'];
      $model->comment = Yii::$app->request->post('NewsComments')['comment'];
      if ($model->save()) {
      Yii::$app->session->setFlash('success', 'Коментар доданий');
       $this->refresh();
      } else {
        Yii::$app->session->setFlash('error', 'Помилка');
      }
    }
   // return $this->refresh();
//return $this->render('current');
   // return $this->redirect(['show', 'id' => Yii::$app->request->post('NewsComments')['news_id']]);

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
