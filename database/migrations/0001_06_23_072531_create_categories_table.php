<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['name' => 'fiksi'],
            ['name' => 'fantasy'],
            ['name' => 'Realisme'],
            ['name' => 'Sejarah'],
            ['name' => 'Sains'],
            ['name' => 'Komik'],
            ['name' => 'Horor'],
            ['name' => 'Drama'],
            ['name' => 'Misteri'],
            ['name' => 'Komedi'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
