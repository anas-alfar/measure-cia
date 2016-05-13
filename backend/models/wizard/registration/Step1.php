<?php
namespace backend\models\wizard\registration;

use yii\base\Model;

class Step1 extends Model
{
    public $product_name;
    public $url_1;
    public $url_2;
    public $url_3;
    public $url_4;
    public $url_5;
    public $url_6;
    public $url_7;
    public $url_8;
    public $url_9;
    public $url_10;

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['product_name','url_1','url_2','url_3','url_4','url_5','url_6','url_7','url_8','url_9','url_10'], 'safe'],
            [['product_name'],'string'],
            [['url_1','url_2','url_3','url_4','url_5','url_6','url_7','url_8','url_9','url_10'], 'url'],
            [['product_name','url_1'], 'required']
        ];
    }
}
