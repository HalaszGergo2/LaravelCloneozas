<?php

use App\Models\Task;
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
            $table->foreignId('project_id')->references('id')->on('projects');
            $table->timestamps();
        });

        Task::create([ 
            'title' => 'AB módosítás', 
            'description' => 'Adatbázis átszervezése', 
            'end_date' => now(),
            'status'=>0,
            'user_id'=>1,
            'project_id'=>2]);

        Task::create([ 
            'title' => 'Frontend', 
            'description' => 'Frontend szervezése', 
            'end_date' => '2025-12-20',
            'status'=>0,
            'user_id'=>2,
            'project_id'=>2]);

        Task::create([ 
            'title' => 'Backend', 
            'description' => 'Backend szervezése', 
            'end_date' => '2025-05-20',
            'status'=>0,
            'user_id'=>3,
            'project_id'=>2]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
