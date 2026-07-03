<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blood_inventory', function (Blueprint $table) {
            $table->id();
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', '0+', '0-']);
            $table->integer('units_available')->default(0);
            $table->enum('status', ['normal', 'low', 'critical'])->default('normal');
            $table->string('hospital')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blood_inventory');
    }
};
