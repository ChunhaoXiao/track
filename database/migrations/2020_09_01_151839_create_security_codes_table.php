<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('batch_id');
            $table->string('security_code');
            $table->integer('product_id');
            $table->integer('company_id');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_codes');
    }
}
