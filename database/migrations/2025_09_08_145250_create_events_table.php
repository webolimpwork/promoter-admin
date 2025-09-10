<?php

use App\Models\City;
use App\Models\EventCategory;
use App\Models\Place;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->foreignIdFor(City::class, 'city_id')->constrained('cities');
            $table->foreignIdFor(Place::class, 'place_id')->constrained('places');
            $table->foreignIdFor(Project::class, 'project_id')->constrained('projects');
            $table->string('name');
            $table->foreignIdFor(EventCategory::class, 'category_id')->constrained('event_categories');
            $table->string('match_id', 20);
            $table->string('sponsor_club')->nullable();
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
