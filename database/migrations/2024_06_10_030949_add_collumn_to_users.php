<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nip', 20)->after('id')->unique()->nullable();
            $table->integer('unit_id')->after('password')->nullable();
            $table->smallInteger('level')->after('unit_id')->nullable();
            $table->integer('role_id')->after('level')->nullable();
            $table->boolean('active')->after('role_id')->default(TRUE);
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
            $table->dropColumn('role_id', 'unit_id', 'active', 'level', 'nip');
        });
    }
}
