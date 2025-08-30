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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('category')->nullable()->after('project_location');
            $table->enum('status', ['draft', 'active', 'funded', 'completed', 'cancelled'])->default('draft')->after('category');
            $table->boolean('featured')->default(false)->after('status');
            $table->decimal('raised_amount', 12, 2)->default(0)->after('pledged');
            $table->integer('backers_count')->default(0)->after('investors');
            $table->text('short_description')->nullable()->after('project_description');
            $table->json('gallery_images')->nullable()->after('image');
            $table->string('video_url')->nullable()->after('gallery_images');
            $table->decimal('funding_percentage', 5, 2)->default(0)->after('raised_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'category',
                'status',
                'featured',
                'raised_amount',
                'backers_count',
                'short_description',
                'gallery_images',
                'video_url',
                'funding_percentage'
            ]);
        });
    }
};