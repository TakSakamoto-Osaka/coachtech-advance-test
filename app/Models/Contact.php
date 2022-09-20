<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * contacsテーブル用のモデル
 */
class Contact extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'fullname',         //  お名前
        'gender',           //  性別
        'email',            //  メールアドレス
        'postcode',         //  郵便番号
        'address',          //  住所
        'building_name',    //  建物名
        'opinion'           //  ご意見
    ];
}
