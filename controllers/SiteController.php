<?php

namespace app\controllers;

use app\models\addpatient;
use app\models\Message;
use app\models\RegisterForm;
use app\models\ReportForm;
use app\models\searchpatient;
use app\models\zapis;
use app\models\TaskTable;
use app\models\duty;
use app\models\reester;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
        return $this->render('index');
    }

    public function actionReester()
    {
        if (!Yii::$app->user->isGuest) {

            $searchModel = new searchpatient();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $patients = reester::find()->all();
            return $this->render('reester', [
                'patients' => $patients,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->redirect(['site/login']);
        }
    }

    public function actionAddpatient()
    {
        $model = new addpatient();
        if ($model->load(Yii::$app->request->post())){
            if ($model->save()){
                Yii::$app->session->setFlash('success', 'Пациент добавлен');

                return $this->refresh();
            }

        }

        return $this->render('addpatient', [
            'model'=>$model,
            ]);
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
            return $this->actionHome();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('register', [
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
    public function actionReport()
    {
        $model = new ReportForm();
        if ($model->load(Yii::$app->request->post())){
            if ($model->save()){
                Yii::$app->session->setFlash('success', 'спасибо');

                return $this->refresh();
            }

        }
        return $this->render('report', [
            'model' => $model,
        ]);
    }

    public function actionHome()
    {
        if (!Yii::$app->user->isGuest) {
            $rows = TaskTable::find()->all();
            return $this->render('home', ['rows' => $rows]);
        } else {
            return $this->redirect(['site/login']);
        }
    }

    public function actionDuty()
    {
        $duties = duty::find()->all();
        return $this->render('duty', ['duties' => $duties]);
    }

    public function actionCardpatient($name, $date_of_birth, $numbercard, $diagnez)
    {
        $zapisiDataProvider = new zapis([
            'query' => zapis::find()
                ->where([
                    'name' => $name,
                    'date_of_birth' => $date_of_birth,
                    'numbercard' => $numbercard,
                    'diagnez' => $diagnez
                ])
                ->orderBy(['date' => SORT_DESC]), // Сортировка по дате (новые сначала)
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);

        return $this->render('cardpatient', [
            'name' => $name,
            'date_of_birth' => $date_of_birth,
            'numbercard' => $numbercard,
            'diagnez' => $diagnez,
            'zapisiDataProvider' => $zapisiDataProvider
        ]);
    }

    public function actionMessage()
    {
        if (!Yii::$app->user->isGuest) {
            $model = new Message();
            $messages = Message::find()->all();

            if ($model->load(Yii::$app->request->post())) {
                $model->user_id = Yii::$app->user->id;
                if ($model->save()) {
                    /*Yii::$app->session->setFlash('success', 'Сообщение отправлено!');*/
                    return $this->refresh();
                }
            }

            return $this->render('message', [
                'model' => $model,
                'messages' => $messages,
            ]);
        } else {
            return $this->redirect(['site/login']);
        }
    }
}