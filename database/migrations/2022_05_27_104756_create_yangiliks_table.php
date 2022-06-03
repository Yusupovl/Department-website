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
        Schema::create('yangiliks', function (Blueprint $table) {
            $table->id();
            $table->string('turi');
            $table->date('sana')->nullable();
            $table->string('joyi')->nullable();
            $table->LongText('matni');
            $table->string('sarlavhasi');
            $table->string('rasm');
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
        Schema::dropIfExists('yangiliks');
    }
};
