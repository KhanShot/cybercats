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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("subject_id");
            $table->foreign('subject_id')->references('id')
                ->on('subjects')->cascadeOnDelete();
            $table->unsignedBigInteger("topic_id");
            $table->foreign('topic_id')->references('id')
                ->on('topics')->cascadeOnDelete();

            $table->longText('content')->nullable();
            $table->string('animation')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
