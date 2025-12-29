<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('from_id')->after('id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('to_id')->after('from_id')->constrained('users')->cascadeOnDelete();

            // si existe user_id lo eliminamos
            if (Schema::hasColumn('messages', 'user_id')) {
                $table->dropColumn('user_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['from_id']);
            $table->dropForeign(['to_id']);
            $table->dropColumn(['from_id', 'to_id']);
        });
    }
};
