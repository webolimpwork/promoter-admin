<?php

use App\Models\City;
use App\Models\Project;
use App\Models\Role;
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Role::class, 'role_id')
                ->nullable()
                ->after('id')
                ->constrained('roles');
            $table->foreignIdFor(Project::class, 'project_id')
                ->nullable()
                ->after('role_id')
                ->constrained('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
            $table->dropColumn('project_id');
        });
    }
};
