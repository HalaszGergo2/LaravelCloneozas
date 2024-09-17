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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->unique();
            $table->longText('description');
            $table->date('end_date')->default('2024-09-10');
            //nincs kész: 0, készen van: 1
            $table->boolean('status')->default(0);
            //itt így fogják hívni a mezőt, ott hogy hívják, melyik táblával...
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
