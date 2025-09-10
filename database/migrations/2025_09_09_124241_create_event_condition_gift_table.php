<?php

use App\Models\EventCondition;
use App\Models\Gift;
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
        Schema::create('event_condition_gift', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EventCondition::class, 'condition_id')->constrained('event_conditions');
            $table->foreignIdFor(Gift::class, 'gift_id')->constrained('gifts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_condition_gift');
    }
};
