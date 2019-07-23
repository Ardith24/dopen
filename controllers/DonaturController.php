<?php

namespace app\controllers;

use Yii;
use app\models\Donatur;
use app\models\DonaturSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;

/**
 * DonaturController implements the CRUD actions for Donatur model.
 */
class DonaturController extends Controller
{
    /**
     * {@inheritdoc}
     */    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Donatur models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonaturSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donatur model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Donatur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Donatur();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     //-----proses awal upload file-------------
        //     $model->foto = UploadedFile::getInstance($model, 'foto');
        //     if($model->validate() && !empty($model->foto))
        //     {
        //         //$nama = $model->namaBarang.'.'.$model->fotoFile->extension;
        //         //$model->foto = $nama;
        //         $model->save();
        //         $model->foto = "donatur".$model->id.'.'.$model->foto->extension;
        //         $nama_foto = $model->fotos;
        //         $model->save();
        //         $model->foto->saveAs('images/donatur/'.$nama_foto);
        //     }    
        //     else{
        //         $model->save();
        //     }
        //     //--------proses akhir upload file-----------
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Donatur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
    //         //sebelum update, hapus file foto yang lama jika fotonya diupdate juga
    //        if(!empty($model->foto)){
    //        unlink('images/donatur/'.$model->fotos);
    //        }
    //        //-----proses awal upload file-------------
    //        $model->foto = UploadedFile::getInstance($model, 'foto');
    //        if($model->validate() && !empty($model->foto))
    //        {
    //            //$nama = $model->namaBarang.'.'.$model->fotoFile->extension;
    //            //$model->foto = $nama;
    //            $model->save();
    //            $model->fotos = "donatur".$model->id.'.'.$model->foto->extension;
    //            $nama_foto = $model->fotos;
    //            $model->save();
    //            $model->foto->saveAs('images/donatur/'.$nama_foto);
    //        }    
    //        else{
    //            $model->save();
    //        }
    //        //--------proses akhir upload file-----------

    //        return $this->redirect(['view', 'id' => $model->id]);
    //    }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Donatur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Donatur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donatur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Donatur::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
