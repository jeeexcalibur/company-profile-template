<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_content')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_content')->nullable();
            $table->integer('years_experience')->nullable();
            $table->integer('projects_completed')->nullable();
            $table->integer('happy_clients')->nullable();
            $table->integer('team_members')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
