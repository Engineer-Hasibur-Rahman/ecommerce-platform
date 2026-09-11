<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('file_name', 255);
            $table->string('file_path', 500);
            $table->string('file_type', 50);
            $table->integer('file_size');
            $table->string('mime_type', 100);
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('alt_text', 255)->nullable();
            $table->foreignId('folder_id')->nullable()->constrained('media_folders')->setNullOnDelete();
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->setNullOnDelete();
            $table->timestamps();

            $table->index('file_type');
            $table->index('folder_id');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};