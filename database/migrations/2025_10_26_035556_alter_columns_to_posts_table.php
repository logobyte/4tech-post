<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->dropIfExists('uuid');
            // $table->rename('content', 'body');
            // $table->text('title')->nullable()->change();
            // $table->foreignId('user_id')->after('body')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->uuid()->after('id');
            // $table->rename('body', 'content');
            // $table->string('title')->nullable(false)->change();
            // $table->foreignId('user_id')->after('uuid')->change();
        });
    }
};
