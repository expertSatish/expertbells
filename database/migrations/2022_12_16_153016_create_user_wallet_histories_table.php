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
        Schema::create('user_wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->float('amount');
            $table->string('type');
            $table->string('amounttype');
            $table->integer('is_publish')->default(0);
            $table->integer('sequence')->default(0);
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_wallet_histories');
    }
};
