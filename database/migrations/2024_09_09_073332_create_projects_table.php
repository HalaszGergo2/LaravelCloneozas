<?php

use App\Models\Project;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('costs');
            $table->integer('time');
            $table->foreignId('manager_id')->references('id')->on('users');
            $table->timestamps();
        });

        Project::create([ 
            'name' => 'Adatbázis', 
            'costs' => 20, 
            'time' => 25,
            'manager_id'=>1]);
        
        Project::create([ 
            'name' => 'Weboldal felújítás', 
            'costs' => 30, 
            'time' => 100,
            'manager_id'=>2]);

        Project::create([ 
            'name' => 'ServiceNow', 
            'costs' => 30, 
            'time' => 100,
            'manager_id'=>3]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
