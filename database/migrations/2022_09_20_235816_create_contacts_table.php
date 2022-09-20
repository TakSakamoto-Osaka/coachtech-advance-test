<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->string('fullname', 255);                    //  お名前
            $table->tinyinteger('gender');                      //  性別
            $table->string('email', 255);                       //  メールアドレス
            $table->char('postcode',8);                         //  郵便番号
            $table->string('address', 255);                     //  住所
            $table->string('building_name', 255)->nullable();   //  建物名
            $table->text('opinion');                            //  ご意見

            $table->timestamps();

            //protected $fillable =['fullname','gender', 'email', 'postcode', 'address', 'building_name', 'opinion'];
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
