<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/11/21
 * Time: 下午4:46
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Country;
use yii\data\Pagination;

class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }
}