<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('features', function (Blueprint $table) {
            $table->string('group')->nullable()->after('label');
            $table->unsignedBigInteger('parent_id')->nullable()->after('href');
            $table->foreign('parent_id')->references('id')->on('features')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('features', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['group', 'parent_id']);
        });
    }
};
