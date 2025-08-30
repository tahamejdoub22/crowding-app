<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'category')) {
                $table->string('category')->default('technology')->after('project_description');
            }
            if (!Schema::hasColumn('projects', 'status')) {
                $table->enum('status', ['active', 'ended', 'funded', 'cancelled'])->default('active')->after('category');
            }
            if (!Schema::hasColumn('projects', 'featured')) {
                $table->boolean('featured')->default(false)->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['category', 'status', 'featured']);
        });
    }
};