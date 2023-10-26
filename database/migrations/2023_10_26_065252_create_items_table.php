<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
{
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('item_type');
        $table->string('item_condition');
        $table->text('description');
        $table->text('defects')->nullable();
        $table->integer('quantity');
        $table->json('images')->nullable();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
