<?php

use App\Enums\ModuleStatus;
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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->enum('type', ['TEMP', 'SPEED', 'PRESSURE']);
            $table->decimal('value');

            // enum can be provided by ModuleStatus enum, but it is not
            // good practice to use Models in migration
            $table->enum('status', ['OK', 'FAILED', 'STOPPED']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
