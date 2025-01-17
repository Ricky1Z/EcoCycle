<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->bigInteger('phone');
            $table->integer('greenPoint');
            $table->string('role');
            $table->binary('profileImage')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE buyers MODIFY profileImage LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyers');
    }
};
