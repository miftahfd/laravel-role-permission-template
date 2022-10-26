<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuNavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_navigations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable();
            $table->string('name');
            $table->string('route_name')->nullable();
            $table->string('permission_name');
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
        Schema::dropIfExists('menu_navigations');
    }
}
