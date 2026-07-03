<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('hospital');
            $table->string('city');
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', '0+', '0-']);
            $table->integer('units_needed');
            $table->enum('urgency', ['normal', 'urgent', 'critical'])->default('normal');
            $table->enum('status', ['open', 'fulfilled', 'closed'])->default('open');
            $table->string('contact_phone');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
