<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->string('slug');
            $table->primary('slug')->index();

            $table->text('title')
                  ->description('Using TEXT type instead of SMALLTEXT in order to give to add more or less 
                  characters/words per title flexibility');

            $table->text('description')
                ->description('This description camp will be able to show only too specific type of user (admins).')
                ->nullable();

            $table->text('metadata')->nullable()->description('If null, then there is no extra data to be 
            added to its header.');

            $table->string('parent_id')->nullable()->description('If null, then it means that it is 
            root category');

            $table->softDeletes();
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
        Schema::dropIfExists('categories');
    }
}
