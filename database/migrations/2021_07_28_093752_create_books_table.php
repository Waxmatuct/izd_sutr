<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('item');
            $table->text('title');
            $table->foreignId('faculty_id')
                    ->constrained('faculties')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('author');
            $table->foreignId('type_id')
                    ->constrained('types')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->text('disciple')->nullable();
            $table->float('size', 3, 2);
            $table->unsignedSmallInteger('amount');
            $table->year('year');
            $table->string('month', 8);
            $table->string('handed_in', 8)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->index('month');
            $table->index('created_at');
            $table->index('year');
            
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}