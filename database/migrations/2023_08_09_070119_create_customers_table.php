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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->string('sender_contact');
            $table->string('sender_country');
            $table->string('sender_state');
            $table->string('sender_city');
            $table->string('sender_zip');
            $table->string('sender_address');

            $table->string('receiver_name');
            $table->string('receiver_contact');
            $table->string('receiver_country');
            $table->string('receiver_state');
            $table->string('receiver_city');
            $table->string('receiver_zip');
            $table->string('receiver_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
