<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address   = $this->faker->address();           //  郵便番号␣住所␣建物名
        $array_add = explode(" ", $address);            //  スペース区切り配列

        $postcode = substr_replace($array_add[ 0 ], '-', 3, 0 );
        
        $building_name = "";                            //  建物名
        if ( count($array_add) == 4 ) {                 //  生成した住所に建物名を含む場合
            $building_name = $array_add[ 3 ];
        } 

        return [
            'fullname'      => $this->faker->name(),            //  お名前
            'gender'        => rand(1,2),                       //  性別
            'email'         => $this->faker->email(),           //  メールアドレス
            'postcode'      => $postcode,                       //  郵便番号
            'address'       => $array_add[ 2 ],                 //  住所
            'building_name' => $building_name,                  //  建物名
            'opinion'       => $this->faker->realText(200)      //  ご意見
        ];
    }
}


