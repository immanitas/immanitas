<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            // User personal info
            $table->date('birthday')->nullable();
            $table->string('avatar', 255)->nullable();
            $table->text('signature')->nullable(); // Forum signature
            $table->smallInteger('gender')->nullable()->default(0)->description('0 male, 1 female and 
            NULL unknown'); // 0 Male
            $table->string('steam_auth_id')->nullable();

            $table->integer('user_id')->unsigned()->index();
            // TODO: Relationship user_id
            $table->integer('country_id')->default('1');
            // TODO: Relationship country_id
            $table->integer('language_id')->default('1');
            // TODO: Relationship language_id


            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('steam_id')->nullable();
            $table->string('discord')->nullable();

            // Hardware
            $table->string('case')->nullable();
            $table->string('cpu')->nullable();
            $table->string('gpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('motherboard')->nullable();

            // Peripherals
            $table->string('keyboard')->nullable();
            $table->string('mouse')->nullable();
            $table->string('headset')->nullable();
            $table->string('microphone')->nullable();
            $table->string('mouse_pad')->nullable();
            $table->string('display')->nullable();

            $table->string('access_counter', 255)->default(0);
            $table->string('posts_count', 255)->default(0); // Forum posts counter



            $table->text('occupation')->nullable();
            $table->text('website')->nullable();
            $table->text('about')->nullable();
            $table->timestamp('last_active');
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
        Schema::dropIfExists('profiles');
    }
}
