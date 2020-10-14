<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class FeesForm extends Model
{
    const VAT=0.2;
    const TOURIST_FEE=0.01;
    public $amount;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['amount'], 'required'],
            // email has to be a valid email address
            ['amount', 'number'],

        ];
    }




    public function process()
    {
        if ($this->validate()) {

            $tmp=$this->amount;
            $vat=$tmp-$tmp/(1+self::VAT);
            $tmp=$tmp-$vat;
            $tourist_fee=$tmp-$tmp/(1+self::TOURIST_FEE);
            $tmp=$tmp-$tourist_fee;
            $rest=$tmp;
            return [
                'original'=>$this->amount,
                'vat'=>$vat,
                'tourist_fee'=>$tourist_fee,
                'rest'=>$rest,
            ];


        }
        return false;
    }
}
