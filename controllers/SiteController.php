<?php

namespace app\controllers;

use app\models\addpatient;
use app\models\Message;
use app\models\RegisterForm;
use app\models\Report;
use app\models\ReportForm;
use app\models\searchpatient;
use app\models\TaskTable;
use app\models\duty;
use app\models\reester;
use Yii;
use yii\data\ActiveDataProvider;
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

        // Получаем номер карты из GET-параметра
        $numbercard = Yii::$app->request->get('numbercard');

        if (empty($numbercard)) {
            throw new \yii\web\BadRequestHttpException('Не указан номер карты пациента');
        }

        // Находим пациента в базе
        $patient = Reester::findOne(['numbercard' => $numbercard]);
        if (!$patient) {
            throw new \yii\web\NotFoundHttpException('Пациент не найден');
        }

        // Автозаполнение модели данными пациента
        $model->numbercard = $patient->numbercard;
        $model->name = $patient->name;
        $model->date_of_birth = $patient->date_of_birth;
        $model->diagnez = $patient->diagnez;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Запись успешно сохранена');
            }
        }

        return $this->render('report', [
            'model' => $model,
            'patient' => $patient,
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
        $zapisDataProvider = new ActiveDataProvider([
            'query' => Report::find()
                ->where([
                    'name' => $name,
                    'date_of_birth' => $date_of_birth,
                    'numbercard' => $numbercard,
                    'diagnez' => $diagnez,
                ])
                ->orderBy(['date_of_birth' => SORT_DESC]), // Сортировка по дате (новые сначала)
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);

        return $this->render('cardpatient', [
            'name' => $name,
            'date_of_birth' => $date_of_birth,
            'numbercard' => $numbercard,
            'diagnez' => $diagnez,
            'zapisDataProvider' => $zapisDataProvider,
        ]);
    }

    public function actionMessage()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $model = new Message();
        $messages = Message::find()->orderBy(['created_at' => SORT_ASC])->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id;
            if ($model->save()) {
                return $this->refresh();
            } else {
                Yii::error('Ошибка сохранения сообщения: ' . print_r($model->errors, true));
            }
        }

        return $this->render('message', [
            'model' => $model,
            'messages' => $messages,
        ]);
    }
}