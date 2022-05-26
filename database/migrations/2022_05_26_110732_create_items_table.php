<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('presupuestos_id')->unsigned();
            $table->integer('cantidad');
            $table->text('item');
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 12, 2);
            $table->decimal('subtotal', 12, 2);
            $table->integer('band')->default(1);
            $table->timestamps();
            $table->foreign('presupuestos_id')->references('id')->on('presupuestos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
