<?php
namespace backend\models\wizard\registration;

use yii\base\Model;

class Step3 extends Model
{
    public $token;

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['token'], 'safe'],
            [['token'],'string'],
            [['token'], 'required']
        ];
    }
}
