<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTableAddSocialAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('social_id', 255)->default('');
            $table->enum('auth_type', ['site', 'vk', 'gitHub'])
                ->default('site');
            $table->string('avatar', 150)->default('');
            $table->index('social_id');
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            DB::statement('UPDATE `users` SET `password` = "" WHERE `password` IS NULL;');
            DB::statement('ALTER TABLE `users` MODIFY `password` VARCHAR(255) NOT NULL;');
            $table->dropColumn(['social_id', 'auth_type', 'avatar']);
        });
    }
}
