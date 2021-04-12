<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stacks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        Schema::create('register_stack', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("register_id");
            $table->unsignedBigInteger("stack_id");
            $table->timestamps();

            $table->unique(["register_id", "stack_id"]);

            $table->foreign("register_id")
                ->references("id")
                ->on("registers")
                ->onDelete("cascade");

            $table->foreign("stack_id")
                ->references("id")
                ->on("stacks")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stacks');
    }
}
