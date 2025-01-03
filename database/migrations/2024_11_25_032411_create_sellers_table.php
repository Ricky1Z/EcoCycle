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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->bigInteger('phone');
            $table->string('region');
            $table->string('role');
            $table->integer('balance');
            $table->binary('profileImage')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE sellers MODIFY profileImage LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
