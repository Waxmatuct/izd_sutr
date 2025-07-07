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
        Schema::create('electronic_editions', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('author');
            $table->foreignId('type_id')
                ->constrained('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('registration_number')->nullable();
            $table->string('resource_type')->nullable()->default('Текстовое ЭИ');
            $table->string('edition_type')->nullable()->default('CD-R');
            $table->string('isbn')->nullable();
            $table->unsignedSmallInteger('amount')->nullable();
            $table->unsignedDecimal('size', 5, 2);
            $table->year('year');
            $table->date('registered_at')->nullable();
            $table->string('cover_url')->nullable();
            $table->text('annotation')->nullable();
            $table->text('bibliographic_description')->nullable();
            $table->text('system_requirements')->nullable();
            $table->string('download_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electronic_editions');
    }
};
