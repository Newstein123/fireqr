<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('model_no');
            $table->string('country');
            $table->string('company_name');
            $table->date('manufactured_year');
            $table->date('start_date');
            $table->mediumText('usage');
            $table->longText('description');
            $table->string('image');
            $table->string('qr_img')->default('');
            $table->string('qr_name');
            $table->tinyInteger('scan_count')->default(0);
            $table->tinyInteger('publish')->comment('0=pubish, 1=unpublish');
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
        Schema::dropIfExists('products');
    }
};
