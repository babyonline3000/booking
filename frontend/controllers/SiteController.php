<?php
namespace frontend\controllers;

use common\models\ReservedRoom;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * Lists all Rooms models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new \backend\models\search\Rooms();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all ReservedRoom models.
     *
     * @return mixed
     */
    public function actionReserved()
    {
        $searchModel = new \backend\models\search\ReservedRoom();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('reserved', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new ReservedRoom();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['site/reserved']);
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }



}
