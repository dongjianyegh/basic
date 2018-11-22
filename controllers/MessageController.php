<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/11/21
 * Time: 下午8:21
 */

namespace app\controllers;

use Yii;
use app\models\Message;
use yii\web\Controller;

class MessageController extends Controller
{
    public $layout = false;

    public function actionIndex()
    {
        $msgs = Message::find()->all();
        $model = new Message();
        return $this->render('index', [
            'msgs' => $msgs,
            'model' => $model
        ]);
    }

    public function actionCreate()
    {

        //1.判断是否post提交
        if (Yii::$app->request->isPost) {
            //2.接受数据
            $title = Yii::$app->request->post('uname');
            $desc = Yii::$app->request->post('content');

            //3.实例化对象并保存数据
            $msg = new Message();

            $msg->title = $title;

            $msg->desc = $desc;

            $msg->created_at = time();

            $msg->updated_at = time();

            $rs = $msg->save();

            return $this->redirect(['/msg']);
        }
    }
}