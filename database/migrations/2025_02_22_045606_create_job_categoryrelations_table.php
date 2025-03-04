<?php

use App\Models\Job;
use App\Models\JobCategory;
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
        Schema::create('job__category_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Job::class);
            $table->foreignIdFor(JobCategory::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job__category_relations');
    }
};
