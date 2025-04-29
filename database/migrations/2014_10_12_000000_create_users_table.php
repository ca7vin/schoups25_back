<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $now = now();

        DB::table('users')->insert([
            'name' => "Gisele",
            'email' => "mostwanted1970@gmail.com",
            'password' => password_hash('UnderGround@1970', PASSWORD_DEFAULT),
            'email_verified_at' => $now,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('users')->insert([
            'name' => "calvin",
            'email' => "ca7vin@gmail.com",
            'password' => password_hash('Mostwanted12_', PASSWORD_DEFAULT),
            'email_verified_at' => $now,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
