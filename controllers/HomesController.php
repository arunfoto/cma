<?php

namespace app\controllers;

use app\models\Homes;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * HomesController implements the CRUD actions for Homes model.
 */

class HomesController extends Controller {
	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'verbs'    => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Homes models.
	 * @return mixed
	 */
	public function actionIndex() {
		$dataProvider = new ActiveDataProvider([
				'query' => Homes::find(),
				'sort'  => ['defaultOrder'  => ['firstname'  => SORT_ASC, 'lastname'  => SORT_ASC, 'email'  => SORT_ASC, 'date_submit'  => SORT_ASC]]
			]);

		return $this->render('index', [
				'dataProvider' => $dataProvider,
			]);
	}

	/**
	 * Displays a single Homes model.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id) {
		return $this->render('view', [
				'model' => $this->findModel($id),
			]);
	}

	/**
	 * Creates a new Homes model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Homes();
		//print_r($_POST);
		//exit;
		if ($model->load(Yii::$app->request->post()) && empty($_POST['Homes']['idval'])) {
			//print "Enter===>1";
			//exit;
			$model              = new Homes();
			$model->date_submit = date('Y-m-d');
			$model->form_submit = 1;
			$model->save();
			return $this->redirect(['view', 'id' => $model->id]);
		} elseif ($model->load(Yii::$app->request->post())) {
			//print "Enter===>2";
			//exit;
			$model = $this->findModel($_POST['Homes']['idval']);
			$model->load(Yii::$app->request->post());
			$model->date_submit = date('Y-m-d');
			$model->form_submit = 1;
			$model->save();
			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('create', [
				'model' => $model,
			]);
	}

	public function actionSaving() {
		$info = json_decode($_POST['info']);
		if (empty($info->id)) {
			$model = new Homes();
		} else if (isset($info->id)) {
			$model = $this->findModel($info->id);
		}

		//print_r($info);
		//exit;

		$model->firstname = $info->firstname;
		if (isset($info->lastname)) {
			$model->lastname = $info->lastname;
		}

		if (isset($info->email)) {
			$model->email = $info->email;
		}

		if (isset($info->phone)) {
			$model->phone = $info->phone;
		}

		if (isset($info->address)) {
			$model->address = $info->address;
		}

		if (isset($info->homesqft)) {
			$model->home_sqft = $info->homesqft;
		}

		$model->save();

		//print_r($model->errors);

		$id = $model->id;

		print$id;

		exit;
	}

	/**
	 * Updates an existing Homes model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('update', [
				'model' => $model,
			]);
	}

	/**
	 * Deletes an existing Homes model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Homes model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Homes the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Homes::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
