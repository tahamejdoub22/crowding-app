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
            // Campaign Details
            if (!Schema::hasColumn('projects', 'short_description')) {
                $table->string('short_description')->nullable()->after('project_description');
            }
            if (!Schema::hasColumn('projects', 'video_url')) {
                $table->string('video_url')->nullable()->after('short_description');
            }
            if (!Schema::hasColumn('projects', 'gallery')) {
                $table->json('gallery')->nullable()->after('video_url');
            }
            
            // Campaign Financial Details
            if (!Schema::hasColumn('projects', 'minimum_goal')) {
                $table->decimal('minimum_goal', 15, 2)->nullable()->after('goal');
            }
            if (!Schema::hasColumn('projects', 'stretch_goals')) {
                $table->json('stretch_goals')->nullable()->after('minimum_goal');
            }
            if (!Schema::hasColumn('projects', 'funding_type')) {
                $table->enum('funding_type', ['all_or_nothing', 'flexible'])->default('all_or_nothing')->after('stretch_goals');
            }
            if (!Schema::hasColumn('projects', 'currency')) {
                $table->string('currency', 3)->default('USD')->after('funding_type');
            }
            
            // Campaign Timeline
            if (!Schema::hasColumn('projects', 'launch_date')) {
                $table->timestamp('launch_date')->nullable()->after('start_date');
            }
            if (!Schema::hasColumn('projects', 'duration_days')) {
                $table->integer('duration_days')->default(30)->after('end_date');
            }
            
            // Campaign Analytics
            if (!Schema::hasColumn('projects', 'views')) {
                $table->bigInteger('views')->default(0)->after('investors');
            }
            if (!Schema::hasColumn('projects', 'likes')) {
                $table->bigInteger('likes')->default(0)->after('views');
            }
            if (!Schema::hasColumn('projects', 'shares')) {
                $table->bigInteger('shares')->default(0)->after('likes');
            }
            if (!Schema::hasColumn('projects', 'conversion_rate')) {
                $table->decimal('conversion_rate', 5, 2)->default(0)->after('shares');
            }
            
            // Campaign Settings
            if (!Schema::hasColumn('projects', 'tags')) {
                $table->json('tags')->nullable()->after('category');
            }
            if (!Schema::hasColumn('projects', 'risks_challenges')) {
                $table->text('risks_challenges')->nullable()->after('project_description');
            }
            if (!Schema::hasColumn('projects', 'environmental_impact')) {
                $table->text('environmental_impact')->nullable()->after('risks_challenges');
            }
            if (!Schema::hasColumn('projects', 'team_info')) {
                $table->json('team_info')->nullable()->after('environmental_impact');
            }
            
            // Campaign Status and Verification
            if (!Schema::hasColumn('projects', 'verified')) {
                $table->boolean('verified')->default(false)->after('featured');
            }
            if (!Schema::hasColumn('projects', 'staff_pick')) {
                $table->boolean('staff_pick')->default(false)->after('verified');
            }
            if (!Schema::hasColumn('projects', 'trending')) {
                $table->boolean('trending')->default(false)->after('staff_pick');
            }
            if (!Schema::hasColumn('projects', 'project_updates_count')) {
                $table->integer('project_updates_count')->default(0)->after('trending');
            }
            if (!Schema::hasColumn('projects', 'comments_count')) {
                $table->integer('comments_count')->default(0)->after('project_updates_count');
            }
            
            // SEO and Marketing
            if (!Schema::hasColumn('projects', 'seo_title')) {
                $table->string('seo_title')->nullable()->after('project_name');
            }
            if (!Schema::hasColumn('projects', 'seo_description')) {
                $table->text('seo_description')->nullable()->after('seo_title');
            }
            if (!Schema::hasColumn('projects', 'social_media_links')) {
                $table->json('social_media_links')->nullable()->after('seo_description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $columnsToRemove = [
                'short_description', 'video_url', 'gallery', 'minimum_goal', 'stretch_goals',
                'funding_type', 'currency', 'launch_date', 'duration_days', 'views', 'likes',
                'shares', 'conversion_rate', 'tags', 'risks_challenges', 'environmental_impact',
                'team_info', 'verified', 'staff_pick', 'trending', 'project_updates_count',
                'comments_count', 'seo_title', 'seo_description', 'social_media_links'
            ];
            
            foreach ($columnsToRemove as $column) {
                if (Schema::hasColumn('projects', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};