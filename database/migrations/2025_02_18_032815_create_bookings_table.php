<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->default(DB::raw('(gen_random_uuid())'))->unique(); // postgres compatible
            $table->dateTimeTz('start_time');
            $table->dateTimeTz('end_time');

            $table->foreignId('user_id')->constrained();
            $table->foreignId('resource_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
