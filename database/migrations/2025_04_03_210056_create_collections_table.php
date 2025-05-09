<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
             $table->id();
             $table->string('nom', 100);
             $table->text('description')->nullable();
             $table->unsignedBigInteger('admin_id')->nullable()->default(1);
             $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
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
        Schema::dropIfExists('collections');
    }
};
